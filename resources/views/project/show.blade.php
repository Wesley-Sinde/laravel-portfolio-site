@extends('layouts.public')

@section('title') {{$project->title}} Project @endsection

@section ('content')

@component('layouts.pubnav') @endcomponent
<div class="container darkmode mt-5">
    @auth
    <a class="btn btn-secondary btn-block" href="{{ route('project.edit', $project->id)}}">Edit Project</a>
    @endauth
    <div class="row mt-3">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 col-xl-4">
            <img class="img-fluid rounded d-block" src="{{ asset('storage/'.$project->image)}}"/>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-7 col-xl-8">
            <h3>{{$project->title}}</h3>
            {!! $project->info !!}

            <h3 class="mt-3">URL</h3>
            <a href="{{ $project->url }}">{{$project->url}}</a>

            <h3 class="mt-3">Github URL</h3>
            <a href="{{ $project->github_url }}">{{ $project->github_url}}</a>
            @php
               $languages_array=explode(',',$project->languages);
            @endphp
            <h3 class="mt-3">Languages Used</h3>
            <ul class="mt-2 skills_list">
                @foreach ($languages_array as $language)
                <li><i class="fas fa-angle-right" style="font-size:1.2em"></i>{{$language}}</li>
                @endforeach
            </ul>

            @if (!empty($project->databases))
                @php
                    $databases_array=explode(',',$project->databases);
                @endphp
                <h3 class="mt-3">Databases Used</h3>
                <ul class="mt-2 skills_list">
                    @foreach ($databases_array as $database)
                    <li><i class="fas fa-angle-right" style="font-size:1.2em"></i>{{$database}}</li>
                    @endforeach
                </ul>
            @endif

            @if (!empty($project->frameworks))
                @php
                    $frameworks_array=explode(',',$project->frameworks);
                @endphp
                <h3 class="mt-3">Frameworks Used</h3>
                <ul class="mt-2 skills_list">
                    @foreach ($frameworks_array as $framework)
                    <li><i class="fas fa-angle-right" style="font-size:1.2em"></i>{{$framework}}</li>
                    @endforeach
                </ul>
            @endif

            @if (!empty($project->libraries))
                @php
                    $libraries_array=explode(',',$project->libraries);
                @endphp
                <h3 class="mt-3">Libraries Used</h3>
                <ul class="mt-2 skills_list">
                    @foreach ($libraries_array as $library)
                    <li><i class="fas fa-angle-right" style="font-size:1.2em"></i>{{$library}}</li>
                    @endforeach
                </ul>
            @endif


        </div>
    </div>
</div>


@endsection
