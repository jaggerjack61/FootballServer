@extends('layouts.base')

@section('content')
<form action="{{route('register')}}" method="post">
    @csrf

    <div class="row">
        <div class="col s12">
            <input id="name" name="name" type="text" placeholder="name" class="validate">

        </div>
        <div class="col s12">
            <input id="email" name="email" type="email" placeholder="E-mail" class="validate">

        </div>
        <div class="input-field col s12">
            <select name="type">
                <option value="" disabled selected>Choose your account type</option>
                <option value="player">Player</option>
                <option value="fan">Fan</option>
            </select>
        </div>
        <div class="col s12">
            <input id="password"  name="password" type="password" placeholder="Password" class="validate">

        </div>
        <div class="col s12">
            <input id="confirm_password" name="confirm_password" placeholder="Confirm password" type="password" class="validate">

        </div>
        <div class="col s12">
            <button type="submit" class="waves-effect waves-light btn">Register</button>
        </div>
    </div>

</form>




@endsection

@section('scriptsHere')
    <script>
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
@endsection


