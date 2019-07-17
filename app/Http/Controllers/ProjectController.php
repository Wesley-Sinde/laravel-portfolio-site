<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Language;
use App\Library;
use App\Framework;
use App\Skill;
use App\Database;
use App\User;
use Auth;
use Storage;
use File;
use Image;
class ProjectController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['show', 'index']);
    }
    public function index(){

        $user = User::where('email', 'rcol4jc@hotmail.com')->firstOrFail();



        return view('project.index', ['user'=>$user]);

    }

    public function new(){

        $user=Auth::user();

        $libraries=Library::all();
        $languages=Language::all();
        $frameworks=Framework::all();
        $databases=Database::all();
        $skills=Skill::all();

        return view('project.new',[
            'libraries'=>$libraries,
            'languages'=>$languages,
            'frameworks'=>$frameworks,
            'databases'=>$databases,
            'skills'=>$skills,
            'user'=>$user
        ]);
    }

    public function save(Request $request){

        $user=Auth::user();

        $this->validate($request, [
            'title'=>'required',
            'info'=>'required',
            'url'=>'required | url',
            'github_url'=>'required | url',
            'image'=>'required | file',
            'languages'=>'required | array',
            'frameworks'=>'nullable | array',
            'libraries'=>'nullable | array',
            'databases'=>'nullable | array'
        ]);

        $project=new Project;
        $project->user_id=$user->id;

        $project->title=$request->title;
        $project->info=$request->info;
        $project->url=$request->url;
        $project->github_url=$request->github_url;


        $languages_string='';

        foreach ($request->languages as $language){
            $languages_string .= $language . ',';
        }

        $languages_string = rtrim($languages_string, ',');

        $project->languages=$languages_string;

        if (count($request->frameworks) != 0){
            $frameworks_string='';

            foreach ($request->frameworks as $framework){
                $frameworks_string .= $framework . ',';
            }

            $frameworks_string = rtrim($frameworks_string, ',');

            $project->frameworks=$frameworks_string;
        }

        if (count($request->libraries) != 0){
            $libraries_string='';

            foreach ($request->libraries as $library){
                $libraries_string .= $library . ',';
            }

            $libraries_string = rtrim($libraries_string, ',');

            $project->libraries=$libraries_string;
        }

        if (count($request->databases) != 0){
            $databases_string='';

            foreach ($request->databases as $database){
                $databases_string .= $database . ',';
            }

            $databases_string = rtrim($databases_string, ',');

            $project->databases=$databases_string;
        }

        if ($request->hasFile('image')){

            $site_image = $request->file('image');
            $filename = uniqid(Auth::id() . '-') . "." . $site_image->getClientOriginalExtension();
            Storage::disk('public')->put($filename, File::get($site_image));
            $thumb=Image::make($site_image);
            $thumb->resize(200,null,function($constraint){
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $changed_pic=(string) $thumb->encode($site_image->getClientOriginalExtension());
            $thumbname='thumb_'. $filename;
            Storage::disk('public')->put($thumbname, $changed_pic);

            $project->image=$filename;

        }

        $user->projects()->save($project);

        return redirect()->route('project.show', $project->id);

    }

    public function show($id){

        $user=Auth::user();

        $project=Project::find($id);

        return view('project.show', ['user'=>$user, 'project'=>$project]);

    }


    public function edit($id){

        $user=Auth::user();
        $project=Project::findOrFail($id);

        $libraries=Library::all();
        $languages=Language::all();
        $frameworks=Framework::all();
        $databases=Database::all();

        return view('project.edit', [
            'libraries'=>$libraries,
            'languages'=>$languages,
            'frameworks'=>$frameworks,
            'databases'=>$databases,
            'project'=>$project,
            'user'=>$user
        ]);

    }

    public function update(Request $request, $id){
        $project=Project::findOrFail($id);

        $this->validate($request, [
            'title'=>'required',
            'info'=>'required',
            'url'=>'required | url',
            'github_url'=>'required | url',
            'image'=>'nullable | file',
            'languages'=>'required | array',
            'frameworks'=>'nullable | array',
            'libraries'=>'nullable | array',
            'databases'=>'nullable | array'
        ]);

        $project->title=$request->title;
        $project->info=$request->info;
        $project->url=$request->url;
        $project->github_url=$request->github_url;


        $languages_string='';

        foreach ($request->languages as $language){
            $languages_string .= $language . ',';
        }

        $languages_string = rtrim($languages_string, ',');

        $project->languages=$languages_string;

        if (count($request->frameworks) != 0){
            $frameworks_string='';

            foreach ($request->frameworks as $framework){
                $frameworks_string .= $framework . ',';
            }

            $frameworks_string = rtrim($frameworks_string, ',');

            $project->frameworks=$frameworks_string;
        }

        if (count($request->libraries) != 0){
            $libraries_string='';

            foreach ($request->libraries as $library){
                $libraries_string .= $library . ',';
            }

            $libraries_string = rtrim($libraries_string, ',');

            $project->libraries=$libraries_string;
        }

        if (count($request->databases) != 0){
            $databases_string='';

            foreach ($request->databases as $database){
                $databases_string .= $database . ',';
            }

            $databases_string = rtrim($databases_string, ',');

            $project->databases=$databases_string;
        }

        if ($request->hasFile('image')){

            Storage::disk('public')->delete($project->image);
            Storage::disk('public')->delete('thumb_' . $project->image);
            $site_image = $request->file('image');
            $filename = uniqid(Auth::id() . '-') . "." . $site_image->getClientOriginalExtension();
            Storage::disk('public')->put($filename, File::get($site_image));
            $thumb=Image::make($site_image);
            $thumb->resize(200,null,function($constraint){
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $changed_pic=(string) $thumb->encode($site_image->getClientOriginalExtension());
            $thumbname='thumb_'. $filename;
            Storage::disk('public')->put($thumbname, $changed_pic);

            $project->image=$filename;

        }

        $project->save();

        return redirect()->route('project.show', $project->id);

    }

    public function confirm_delete($id){

        $project=Project::findOrFail($id);

        return view('project.confirm',['project'=>$project]);

    }

    public function delete($id){

        $project=Project::findOrFail($id);

        Storage::disk('public')->delete($project->image);
        Storage::disk('public')->delete('thumb_' . $project->image);

        $project->delete();

        return redirect()->route('project.index');
    }
}
