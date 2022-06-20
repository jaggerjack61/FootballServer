@extends('layouts.base')

@section('content')
    <h1>Admin Login</h1>
    <form action="{{route('admin-login')}}" method="post">
        @csrf

        <div class="row">
            <div class="col s12">
                <input name="email" type="text" class="validate">
                <label for="username">Username</label>
            </div>
            <div class="col s12">
                <input name="password" type="password" class="validate">
                <label for="password">Password</label>
            </div>
            <div class="col s3 m3">
                <button type="submit" class="waves-effect waves-light btn-small">Login</button>
            </div>
            <div class="col s9 m9">
                <a href="{{route('admin-register')}}">Or create an account right now.</a>
            </div>
        </div>

    </form>

@endsection
