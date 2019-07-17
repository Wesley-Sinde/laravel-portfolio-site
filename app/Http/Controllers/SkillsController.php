<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use App\Library;
use App\Framework;
use App\Database;
use App\Skill;

class SkillsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function new(){

        return view('skill.new');

    }

    public function save(Request $request){

        $this->validate($request, [
            'name'=>'required',
            'skill_type'=>'required'
        ]);

        switch ($request->skill_type) {
            case 'language':
                $language=new Language;
                $language->name=$request->name;
                $language->save();
                break;

            case 'database':
                $database=new Database;
                $database->name=$request->name;
                $database->save();
                break;
            case 'framework':
                $framework=new Framework;
                $framework->name=$request->name;
                $framework->save();
                break;
            case 'library':
                $library=new Library;
                $library->name=$request->name;
                $library->save();
                break;
            case 'skill':
                $skill=new Skill;
                $skill->name=$request->name;
                $skill->save();
                break;
        }

        return redirect()->route('project.new');

    }
}
