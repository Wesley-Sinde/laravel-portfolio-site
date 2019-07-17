@extends('layouts.public')

@section('title','Edit Profile')

@section('content')
@component('layouts.pubnav') @endcomponent
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Change Profile</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('profile.save')}}" class="form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="bio">Bio Info:</label>
                                <textarea class="form-control  @error('bio') is-ivalid @enderror" name="bio" id="bio" rows="5">@if ($has_profile) {{$user->profile->bio}} @endif</textarea>
                                @error('bio')
                                    <div class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">Contact Phone:</label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                value="@if ($has_profile) {{$user->profile->phone}} @endif" />
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="github_url">Github URL:</label>
                                <input type="text" name="github_url" class="form-control @error('github_url') is-invalid @enderror"
                                value="@if ($has_profile && !empty($user->profile->github_url)) {{$user->profile->github_url}} @endif" />
                                @error('github_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="linkedin_url">LinkedIn URL:</label>
                                <input type="text" name="linkedin_url" class="form-control @error('linkedin_url') is-invalid @enderror"
                                value="@if ($has_profile && !empty($user->profile->linkedin_url)) {{$user->profile->linkedin_url}} @endif" />
                                @error('linkedin_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="youtube_url">Youtube URL:</label>
                                <input type="text" name="youtube_url" class="form-control @error('youtube_url') is-invalid @enderror"
                                value="@if ($has_profile && !empty($user->profile->youtube_url)) {{$user->profile->youtube_url}} @endif" />
                                @error('youtube_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="facebook_url">Facebook URL:</label>
                                <input type="text" name="facebook_url" class="form-control @error('facebook_url') is-invalid @enderror"
                                value="@if ($has_profile && !empty($user->profile->facebook_url)) {{$user->profile->facebook_url}} @endif" />
                                @error('facebook_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="twitter_url">Twitter URL:</label>
                                <input type="text" name="twitter_url" class="form-control @error('twitter_url') is-invalid @enderror"
                                value="@if ($has_profile && !empty($user->profile->twitter_url)) {{$user->profile->twitter_url}} @endif" />
                                @error('twitter_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="skype_name">Skype Name:</label>
                                <input type="text" name="skype_name" class="form-control @error('skype_name') is-invalid @enderror"
                                value="@if ($has_profile && !empty($user->profile->skype_name)) {{$user->profile->skype_name}} @endif" />
                                @error('skype_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                             <div class="form-group">


                                <label for="photo">Upload Photo:</label>
                                @if ($has_profile && !empty($user->profile->photo)) <img style="height:200px;width:auto" src="{{asset('storage/'. 'thumb_'. $user->profile->photo)}}" /> @endif

                                <input type="file" name="photo" id="photo" value="Portrait" class="form-control @error('photo') is-invalid @enderror" />
                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                             </div>
                             <div class="form-check">
                                    @error('skills')
                                        <div class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                <label for="skills">Skills: </label>
                                <h5>Languages</h5>
                                @foreach ($languages as $language)
                                    @if (in_array($language->name, $skills_array))
                                        <input type="checkbox" name="skills[]" value="{{$language->name}}" class="form-check-input" checked >{{$language->name}}<br/>
                                    @else
                                        <input type="checkbox" name="skills[]" value="{{$language->name}}" class="form-check-input"/>{{$language->name}}<br />
                                    @endif

                                @endforeach
                                <h5>Databases</h5>
                                @foreach ($databases as $database)
                                    @if (in_array($database->name, $skills_array))
                                        <input type="checkbox" name="skills[]" value="{{$database->name}}" class="form-check-input" checked >{{$database->name}}<br/>
                                    @else
                                        <input type="checkbox" name="skills[]" value="{{$database->name}}" class="form-check-input"/>{{$database->name}}<br />
                                    @endif

                                @endforeach

                                <h5 class="mt-2">Libraries</h5>
                                @foreach ($libraries as $library)
                                    @if (in_array($library->name, $skills_array))
                                        <input type="checkbox" name="skills[]" value="{{$library->name}}" class="form-check-input" checked >{{$library->name}}<br/>
                                    @else
                                        <input type="checkbox" name="skills[]" value="{{$library->name}}" class="form-check-input"/>{{$library->name}}<br />
                                    @endif

                                @endforeach

                                <h5 class="mt-2">Frameworks</h5>
                                @foreach ($frameworks as $framework)
                                    @if (in_array($framework->name, $skills_array))
                                        <input type="checkbox" name="skills[]" value="{{$framework->name}}" class="form-check-input" checked >{{$framework->name}}<br/>
                                    @else
                                        <input type="checkbox" name="skills[]" value="{{$framework->name}}" class="form-check-input"/>{{$framework->name}}<br />
                                    @endif

                                @endforeach

                                <h5 class="mt-2">Other Skills</h5>
                                @foreach ($skills as $skill)
                                    @if (in_array($skill->name, $skills_array))
                                        <input type="checkbox" name="skills[]" value="{{$skill->name}}" class="form-check-input" checked >{{$skill->name}}<br/>
                                    @else
                                        <input type="checkbox" name="skills[]" value="{{$skill->name}}" class="form-check-input"/>{{$skill->name}}<br />
                                    @endif

                                @endforeach
                             </div>
                             <div class="form-group">
                                 <input type="submit" class="btn btn-primary btn-block mt-2" value="Save Profile" />
                             </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        tinymce.init({
            selector:'#bio',
            plugins: 'link, image, lists, code',
            toolbar: 'undo redo | styleselect | bold italic underline | outdent indent | numlist bullist | link unlink | image',
            body_class: 'mce_body',
            content_css: '{{asset('css/app.css')}}',
        });
    </script>
@endsection
