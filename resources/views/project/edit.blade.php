@extends('layouts.public')

@section('title') Edit Project @endsection

@section ('content')
@component('layouts.pubnav') @endcomponent

<div class="container">
        <div class="row">
            <div class="col-md-10 mt-5 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Project</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('project.update', $project->id)}}" method="POST" enctype="multipart/form-data" class="form">
                            @csrf
                            <input type="hidden" name="_method" value="patch" />
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text"  name="title" id="title"  value="{{$project->title}}" class="form-control @error('title') is-invalid @enderror"/>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="info">Info</label>
                                <textarea name="info" id="info" class="form-control @error('info') is-invalid @enderror">{{$project->info}}</textarea>
                                @error('info')
                                    <div class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="url">Demo or Real URL:</label>
                                <input type="text"  name="url" id="url"  value="{{$project->url}}" class="form-control @error('url') is-invalid @enderror"/>
                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="github_url">Github URL:</label>
                                <input type="text"  name="github_url" id="github_url"  value="{{$project->github_url}}"class="form-control @error('github_url') is-invalid @enderror"/>
                                @error('github_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <p>Current Image</p>
                                        <img  src="{{asset('storage/' . $project->image) }}" class="img-fluid d-block"/>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <label for="image">Choose a new diplay image:</label>
                                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" />
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-check mt-5">
                                        @php
                                            $languages_array=explode(',',$project->languages);
                                        @endphp
                                        @error('languages')
                                        <div class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                        <label class="d-block" for="languages">Languages Used: </label>
                                        @foreach ($languages as $language)
                                            @if(in_array($language->name, $languages_array))
                                                <input type="checkbox" name="languages[]" value="{{$language->name}}" class="form-check-input" checked />{{$language->name}}<br />
                                            @else
                                                <input type="checkbox" name="languages[]" value="{{$language->name}}" class="form-check-input"/>{{$language->name}}<br />
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check mt-5">
                                        @php
                                            $frameworks_array=explode(',',$project->frameworks);
                                        @endphp
                                        @error('frameworks')
                                        <div class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                        <label class="d-block" for="frameworks">Frameworks Used: </label>
                                        @foreach ($frameworks as $framework)
                                            @if(in_array($framework->name, $frameworks_array))
                                                <input type="checkbox" name="frameworks[]" value="{{$framework->name}}" class="form-check-input" checked />{{$framework->name}}<br />
                                            @else
                                                <input type="checkbox" name="frameworks[]" value="{{$framework->name}}" class="form-check-input"/>{{$framework->name}}<br />
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check mt-5">
                                        @php
                                            $databases_array=explode(',',$project->databases);
                                        @endphp
                                        @error('databases')
                                        <div class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                        <label class="d-block" for="databases">Databases Used: </label>
                                        @foreach ($databases as $database)
                                            @if(in_array($database->name, $databases_array))
                                            <input type="checkbox" name="databases[]" value="{{$database->name}}" class="form-check-input" checked/>{{$database->name}}<br />
                                            @else
                                                <input type="checkbox" name="databases[]" value="{{$database->name}}" class="form-check-input"/>{{$database->name}}<br />
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check mt-5">
                                        @php
                                            $libraries_array=explode(',',$project->libraries);
                                        @endphp
                                        @error('libraries')
                                            <div class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                        <label class="d-block" for="libraries">Libraries Used: </label>
                                        @foreach ($libraries as $library)
                                            @if(in_array($library->name, $libraries_array))
                                                <input type="checkbox" name="libraries[]" value="{{$library->name}}" class="form-check-input" checked/>{{$library->name}}<br />
                                            @else
                                                <input type="checkbox" name="libraries[]" value="{{$library->name}}" class="form-check-input"/>{{$library->name}}<br />
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="save_new_project" id="save_new_project" value="Save Project" class="btn btn-primary btn-block"/>
                            </div>

                        </form>
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-danger btn-block" href="{{route('project.confirmdelete', $project->id)}}">Delete Project</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script>
        tinymce.init({
            selector:'#info',
            plugins: 'link, image, lists, code',
            toolbar: 'undo redo | styleselect | bold italic underline | outdent indent | numlist bullist | link unlink | image',
            body_class: 'mce_body',
            content_css: '{{asset('css/app.css')}}',
        });
    </script>

@endsection
