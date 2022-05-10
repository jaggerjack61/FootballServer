@extends('layouts.base')
@section('content')



    <a class="waves-effect waves-light btn modal-trigger" href="#modal1">New Club</a>

    <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <form action="{{route('store-club')}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="modal-content">
            <div class="row">
                <div class="col s12 m12">
                    <input name="name" placeholder="Club Name"  type="text" class="validate">
                </div>
                <div class="col s12 m12">
                    <input name="description" placeholder="Club Description" type="text" class="validate">
                </div>
                <div class="col s12 m12">
                    <input type="file" accept="image/*" class="form-control" required name="image">
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="submit" class="waves-effect waves-light btn">Submit</button>
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
        </form>
    </div>


    <div class="row">
        @foreach($clubs as $club)
        <div class="col s12 m12">
            <div class="card">
                <div class="card-image">
                    <img src="/img/club/{{$club->id}}/{{$club->image}}" >
                    <span class="card-title">{{$club->name}}</span>
                </div>
                <div class="card-content">
                    <p>{{$club->details}}</p>
                </div>
                <div class="card-action">


                    <a class="waves-effect waves-light btn" href="{{route('view-club',$club->id)}}"><i class="material-icons left">visibility</i>View Club</a>




                </div>

            </div>
        </div>
        @endforeach

    </div>

@endsection
@section('scriptsHere')
<script>
    $(document).ready(function(){
        $('.modal').modal();
    });
</script>
@endsection
