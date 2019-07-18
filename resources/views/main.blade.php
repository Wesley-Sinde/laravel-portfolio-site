@extends('layouts.public')

@section('title', 'Rick Collins Portfolio')



@section('content')
@component('layouts.pubnav') @endcomponent

<div class="container darkmode mt-5" style="margin-top:10rem">
    @auth
        <a class="btn btn-secondary d-block mb-3" href="{{ route('profile.show')}}">Edit Profile</a>
    @endauth
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
            <img class="img-fluid rounded" style="min-width:100%;" src="{{ asset('storage/' . 'thumb_'. $user->profile->photo)}}" />
            @php
                $skill_array=explode(',', $user->profile->skills)
            @endphp

            <div class="row mb-3">
                <div class="col">
                    <h2 class="mt-3">Skills</h2>
                    <ul class="mt-2 skills_list">
                    @foreach ($skill_array as $skill)
                        <li><i class="fas fa-angle-right" style="font-size:1.2em"></i>{{$skill}}</li>
                    @endforeach
                    </ul>
                </div>
            </div>



        </div>
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
            <h2>Info</h2>
            {!! $user->profile->bio !!}

            @if (!empty($user->profile->github_url))
                <h5>Github Page</h5>
                <p><a href="{{$user->profile->github_url}}">{{$user->profile->github_url}}</a></p>
            @endif

            <h5>Experience</h5>
            <p>Please see my portfolio items below</p>

            <h2 class="mt-5">Projects</h2>
            @foreach ($user->projects->take(5) as $project)
                <div class="row mt-3 d-flex">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <img style="width:400px;height:auto" class="img-fluid rounded" src="{{ asset('storage/'.$project->image)}}" />
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 align-items-center">
                        <h5 class="h2">{{$project->title}}</h5><br>
                        <a class="btn btn-secondary" href="{{ route('project.show', $project->id)}}">See Details</a>
                    </div>
                </div>

            @endforeach

            @if($user->projects->count()>5)
                <a class="mt-3 btn btn-secondary btn-block" href="{{route('project.index')}}">See All My Projects</a>
            @endif

        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <h2 class="text-center" id="contact">Contact Me</h2>
        </div>
    </div>
    <div class="row contact_area">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center mt-3">
            <i class="fas fa-envelope d-block" style="font-size:1.6em"></i>
        <a href="mailto:{{$user->email}}">{{$user->email}}</a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center mt-3">
            <i class="fas fa-mobile-alt d-block" style="font-size:1.6em"></i>
            <p>{{$user->profile->phone}}</p>
        </div>
    </div>
    <div class="row">

        @if (!empty($user->profile->facebook_url))
        <div class="mt-3 col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 text-center">
            <i class="fab fa-facebook-square d-block" style="font-size:1.6em"></i>
            <a href="{{$user->profile->facebook_url}}">{{$user->profile->facebook_url}}</a>
        </div>
        @endif

        @if (!empty($user->profile->twitter_url))
        <div class="mt-3 col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 text-center">
            <i class="fab fa-twitter-square d-block" style="font-size:1.6em"></i>
            <a href="{{$user->profile->twitter_url}}">{{$user->profile->twitter_url}}</a>
        </div>
        @endif

        @if (!empty($user->profile->skype_name))
        <div class="mt-3 col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 text-center">
            <i class="fab fa-skype d-block" style="font-size:1.6em"></i>
            <p>{{$user->profile->skype_name}}</p>
        </div>
        @endif
    </div>

@endsection
