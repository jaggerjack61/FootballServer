@extends('layouts.base')

@section('content')
    @livewireStyles
    <livewire:direct-message : profile_id="{{$profile_id}}"/>
    @livewireScripts
@endsection
