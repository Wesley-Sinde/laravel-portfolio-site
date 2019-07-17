<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;

class MainController extends Controller {

    public function index(){

        $user = User::first();



        return view('main', ['user'=>$user]);

    }

    public function about(){

        $user = User::first();



        return view('about',['user'=>$user]);


    }
}
