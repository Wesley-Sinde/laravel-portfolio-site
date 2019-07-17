<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;

class MainController extends Controller {

    public function index(){

        $user = User::where('email', 'rcol4jc@hotmail.com')->firstOrFail();



        return view('main', ['user'=>$user]);

    }

    public function about(){


    }
}
