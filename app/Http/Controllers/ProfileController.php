<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Language;
use App\Library;
use App\Framework;
use App\Skill;
use App\Profile;
use App\Database;
use Storage;
use File;
use Image;

class ProfileController extends Controller
{


    public function __construct(){
        $this->middleware('auth');
    }


    /**
     * @param $request Request Request with the post/Put/Patch vars
     * @param $isNew boolean determines whether the profile is new or existing
     * @param $user logged in user. Passed in from calling method.
     */
    public function saveProfile($request, $isNew, $user){

        //Create Profile var with method scope
        $profile='';



        if ($isNew){
            $profile=new Profile;
        } else {
            $profile=$user->profile;

        }

            $profile->bio=$request->bio;
            $profile->phone=$request->phone;

            //checks the nullable fields from the form to see if there are
            //filled in. If so, it adds the information
            if (!empty($request->github_url)){
                $profile->github_url=$request->github_url;
            }
            if (!empty($request->linkedin_url)){
                $profile->linkedin_url=$request->linkedin_url;
            }
            if (!empty($request->youtube_url)){
                $profile->youtube_url=$request->youtube_url;
            }
            if (!empty($request->facebook_url)){
                $profile->facebook_url=$request->facebook_url;
            }
            if (!empty($request->twitter_url)){
                $profile->twitter_url=$request->twitter_url;
            }
            if (!empty($request->skype_name)){
                $profile->skype_name=$request->skype_name;
            }

            // The skills will be stored in the database field as a comma
            //delimited list.


            $skills_list_to_save=''; //var to store comma delimeted list

            //checks to skills array to for count greater than zero and then if so,
            //the skill and a comma will be appended. At the end, the last comma is trimmed
            if (count($request->skills) != 0){
                foreach ($request->skills as $skill){
                    $skills_list_to_save .= $skill . ',';
                }
                $skills_list_to_save = rtrim($skills_list_to_save, ',');
                $profile->skills=$skills_list_to_save;
            }


            //looks for an uploaded image
            if ($request->hasFile('photo')){


                //If this is a change and not a new profile, delete the old images
                if (!$isNew){
                    Storage::disk('public')->delete($profile->photo);
                    Storage::disk('public')->delete('thumb_' . $profile->photo);
                }


                $bio_photo = $request->file('photo');

                //Creates filename with uniqid appended by the user_id and _
                $filename = uniqid(Auth::id() . '-') . "." . $bio_photo->getClientOriginalExtension();


                Storage::disk('public')->put($filename, File::get($bio_photo));

                /*
                I used the Intervention image library to resize and make a thumbnail
                version of the image. Website: http://image.intervention.io/
                */

                $thumb=Image::make($bio_photo); //New Intervention image
                $thumb->resize(200,null,function($constraint){  //resize with aspect ratio
                    $constraint->aspectRatio();                 //and without allowing upsize
                    $constraint->upsize();
                });

                //Cast encoded file object to a string, append 'thumb_' to the original
                //filename and save it.

                $changed_pic=(string) $thumb->encode($bio_photo->getClientOriginalExtension());
                $thumbname='thumb_'. $filename;
                Storage::disk('public')->put($thumbname, $changed_pic);
                $profile->photo=$filename;
            }

            //if it is a new profile save it to User. If not, just save the profile
            if ($isNew){
                $user->profile()->save($profile);
            } else {
                $profile->save();
            }
    }

    public function index(){

        $user=Auth::user();


        $skills_array=[];

        //if there is a profile, change has_profile to true and then get the skills
        //from the skills and explode into the skills_array
        $has_profile=false;
        if ($user->profile()->exists()){
            $has_profile=true;
            $skills_array=explode(',',$user->profile->skills);
        }



        return view('profile.edit',
         ['user'=>$user,
         'languages'=>Language::all(),
         'libraries'=>Library::all(),
         'frameworks'=>Framework::all(),
         'databases'=>Database::all(),
         'skills'=>Skill::all(),
         'has_profile'=>$has_profile,
         'skills_array'=>$skills_array,
         ]);

    }

    public function save(Request $request){

        $user=Auth::user();

        $this->validate($request, [
            'bio'=>'required',
            'phone'=>'required',
            'github_url'=>'nullable | url',
            'linkedin_url'=>'nullable | url',
            'youtube_url'=>'nullable | url ',
            'facebook_url'=>'nullable | url',
            'twitter_url'=>'nullable | url',
            'skype_name'=>'nullable',
            'photo'=>'required|file',
            'skills'=>'required | array'
        ]);


        if ($user->profile()->exists()){

            $this->saveProfile($request,false,$user);

        } else {

            $this->saveProfile($request,true,$user);
        }

        return redirect()->route('root');
    }
}
