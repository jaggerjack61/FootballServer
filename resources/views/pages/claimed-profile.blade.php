@extends('layouts.base')

@section('content')


    <div class="row">

            <div class="col s12 m12">
                <div class="card">
                    <div class="card-image">
                        <img src="/img/profile/{{$profile->id}}/{{$profile->image}}">

                    </div>
                    <div class="card-content">
                        <span class="card-title info">{{$profile->name}} Club: {{$profile->club()}}</span>
                        <p>{{$profile->dob}}</p>
                        <p>{{$profile->sex}}</p>
                        <p>{{$profile->education}}</p>
                    </div>
                    <div class="card-action">

                        <div class="row">

                            <div class="col s6 m6">
                                <a class="waves-effect waves-light btn btn-block" href="{{route('release-profile',[$profile->id])}}"><i class="material-icons left">link_off</i>Unlink</a>
                            </div>
                            <div class="col s6 m6">
                                <a class="waves-effect waves-light btn btn-block" href="{{route('dm-profile',[$profile->id])}}"><i class="material-icons left">send</i>Inbox</a>
                            </div>
                        </div>





                    </div>

                </div>
            </div>


    </div>
    {{--    {{$profiles->links()}}--}}

@endsection
@section('scriptsHere')

@endsection
