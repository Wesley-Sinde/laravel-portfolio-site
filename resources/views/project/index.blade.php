@extends('layouts.public')

@section('title') All Projects @endsection

@section ('content')
@component('layouts.pubnav') @endcomponent

<div class="container darkmode">
    @foreach ($user->projects as $project)
        <div class="row mt-3">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                <img style="width:350px;height:auto"class="img-fluid" src="{{asset('storage/' . $project->image)}}" />
            </div>
            <div  style="block-overflow:ellipsis;max-lines:4;" class="col-xs-12 col-sm-12 col-md-6 col-lg-8 col-xl-8">
                <h2>{{$project->title}}</h2>
                <div style="block-overflow:ellipsis;max-lines:4;">
                    {!!$project->info!!}
                </div>
                <div class="row">
                    <div class="col text-right">
                    <a class="btn btn-secondary" href="{{route('project.show',$project->id)}}">See Details<i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
