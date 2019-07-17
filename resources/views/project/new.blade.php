@extends('layouts.public')

@section('title') Create New Project @endsection

@section ('content')

@component('layouts.pubnav') @endcomponent

<div class="container">
    <div class="row">
        <div class="col-md-8 mt-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Add New Project</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('project.save')}}" method="POST" enctype="multipart/form-data" class="form">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text"  name="title" id="title"  class="form-control @error('title') is-invalid @enderror"/>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="info">Info</label>
                            <textarea name="info" id="info" class="form-control @error('info') is-invalid @enderror"></textarea>
                            @error('info')
                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="url">Demo or Real URL:</label>
                            <input type="text"  name="url" id="url"  class="form-control @error('url') is-invalid @enderror"/>
                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="github_url">Github URL:</label>
                            <input type="text"  name="github_url" id="github_url"  class="form-control @error('github_url') is-invalid @enderror"/>
                            @error('github_url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Please choose a diplay image:</label>
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" />
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-check mt-5">
                                    @error('languages')
                                    <div class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                    <label class="d-block" for="languages">Languages Used: </label>
                                    @foreach ($languages as $language)
                                        <input type="checkbox" name="languages[]" value="{{$language->name}}" class="form-check-input"/>{{$language->name}}<br />
                                    @endforeach
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check mt-5">
                                    @error('frameworks')
                                    <div class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                    <label class="d-block" for="frameworks">Frameworks Used: </label>
                                    @foreach ($frameworks as $framework)
                                        <input type="checkbox" name="frameworks[]" value="{{$framework->name}}" class="form-check-input"/>{{$framework->name}}<br />
                                    @endforeach
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check mt-5">
                                    @error('databases')
                                    <div class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                    <label class="d-block" for="databases">Databases Used: </label>
                                    @foreach ($databases as $database)
                                        <input type="checkbox" name="databases[]" value="{{$database->name}}" class="form-check-input"/>{{$database->name}}<br />
                                    @endforeach
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check mt-5">
                                    @error('libraries')
                                        <div class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                    <label class="d-block" for="libraries">Libraries Used: </label>
                                    @foreach ($libraries as $library)
                                        <input type="checkbox" name="libraries[]" value="{{$library->name}}" class="form-check-input"/>{{$library->name}}<br />
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="save_new_project" id="save_new_project" value="Save Project" class="btn btn-primary btn-block"/>
                        </div>

                    </form>
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
