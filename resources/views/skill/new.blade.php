@extends('layouts.public')

@section('title') Add Skill @endsection

@section ('content')
@component('layouts.pubnav') @endcomponent

<div class="container">
    <div class="row">
        <div class="col-6 mx-auto">
            <div class="card mt-5">
                <div class="card-header">
                    <h2>Add New Skill</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('skill.save')}}" class="form" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">New Name:</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="skill_type">Choose the type of skill</label>
                            <select name="skill_type" id="skill_type" class="form-control @error('skill_type') is-invalid @enderror">
                                <option value="">--Please Choose a skill type--</option>
                                <option value="language">Language</option>
                                <option value="database">Database</option>
                                <option value="framework">Framework</option>
                                <option value="library">Library</option>
                                <option value="skill">Other Skill</option>
                            </select>
                            @error('skill_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-secondary btn-block" value="Save Skill"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
