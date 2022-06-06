@extends('layouts.base')


@section('content')
    @livewireStyles
    <livewire:reports-table />
    @livewireScripts


@endsection

@section('scriptsHere')
    <script>
        $(document).ready(function(){
            $('select').formSelect();
        });

    </script>
@endsection
