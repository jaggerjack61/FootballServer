@extends('layouts.base')

@section('cssHere')
    @livewireStyles
@endsection

@section('content')
    <h4>
        <div class="info">
            {{$club->name}}
        </div>
    </h4>
    <livewire:player-search : club_id="{{$club->id}}" />
@endsection

@section('scriptsHere')
    @livewireScripts
@endsection
