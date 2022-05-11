@extends('layouts.base')

@section('cssHere')
    @livewireStyles
@endsection


@section('content')

    <livewire:player-profile-list />
@endsection
@section('scriptsHere')
    @livewireScripts
    <script>
        $(document).ready(function(){
            $('.modal').modal();
        });
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
@endsection
