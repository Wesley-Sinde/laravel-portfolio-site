@extends('layouts.public')

@section('title') More About Me @endsection

@section ('content')
@component('layouts.pubnav') @endcomponent

    <div class="container darkmode">
        <div class="row">
            <div class="col-md-12 mx-auto mt-5">
                {!! $user->profile->aboutme !!}
            </div>
        </div>
    </div>

@endsection
