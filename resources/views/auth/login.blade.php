@extends('layouts.base')

@section('content')
    <form action="{{route('login')}}" method="post">
        @csrf

    <div class="row">
        <div class="col s12">
            <input id="username" type="text" class="validate">
            <label for="username">Username</label>
        </div>
        <div class="col s12">
            <input id="password" type="password" class="validate">
            <label for="password">Password</label>
        </div>
        <div class="col s12">
            <button type="submit" class="waves-effect waves-light btn-small">Login</button>
        </div>
    </div>

    </form>

@endsection
