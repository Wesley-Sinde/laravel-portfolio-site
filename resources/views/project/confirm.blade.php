@extends('layouts.public')

@section('title') Confirm Delete Project @endsection

@section ('content')
@component('layouts.pubnav') @endcomponent

<div class="container">
    <div class="row">
        <div class="mx-auto mt-5 col-4">
            <div class="card text-center p-3">
                <h2>Are you sure you want to delete this project?</h2>
                <div class="row">
                    <div class="col">
                        <form action="{{ route('project.delete', $project->id)}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="delete" />
                            <input type="submit" class="btn btn-danger btn-block" value="Yes" />
                        </form>
                    </div>
                    <div class="col">
                        <a href="{{ route('project.edit', $project->id)}}" class="btn btn-secondary btn-block">No</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
