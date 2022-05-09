@extends('layouts.base')

@section('content')
    <a class="waves-effect waves-light btn modal-trigger" href="#modal3">New Player Profile</a>

    <!-- Modal Structure -->
    <div id="modal3" class="modal">
        <form action="{{route('store-profile')}}" method="post">
            @csrf
            <div class="modal-content">
                <div class="row">
                    <div class="col s12 m12">
                        <input name="name" placeholder="Name" type="text" class="validate">
                    </div>
                    <div class="col s12 m12">
                        <input name="dob" placeholder="Date of birth" type="date" class="validate">
                    </div>
                    <div class="col s12 m12">
                        <select name="sex">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="col s12 m12">
                        <select name="education">
                            <option value="primary">Primary</option>
                            <option value="olevel">O level</option>
                            <option value="alevel">A level</option>
                            <option value="diploma">Diploma</option>
                            <option value="degree">Degree</option>
                            <option value="masters">Masters</option>
                            <option value="phd">Phd</option>
                        </select>
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
        @foreach($profiles as $profile)
        <div class="col s12 m12">
            <div class="card">
                <div class="card-image">
                    <img src="/images/sample-1.jpg">
                    <span class="card-title">{{$profile->name}}</span>
                </div>
                <div class="card-content">
                    <p>{{$profile->dob}}</p>
                    <p>{{$profile->sex}}</p>
                    <p>{{$profile->education}}</p>
                </div>
                <div class="card-action">


                    <a class="waves-effect waves-light btn" href="{{route('view-profile',[$profile->id])}}"><i class="material-icons left">visibility</i>View More</a>
                    <a class="waves-effect waves-light btn" href=""><i class="material-icons left">edit</i>Edit</a>



                </div>

            </div>
        </div>
            @endforeach

    </div>
    {{$profiles->links()}}

@endsection
@section('scriptsHere')
    <script>
        $(document).ready(function(){
            $('.modal').modal();
        });
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
@endsection
