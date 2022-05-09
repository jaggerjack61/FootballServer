@extends('layouts.base')

@section('content')

    @if(!($stats))
        <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Save Player Stats</a>

        <div id="modal1" class="modal">
            <form action="{{route('store-stats')}}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="row">
                        <input type="hidden" name="id" value="{{$id}}" />
                        <div class="col s12 m12">
                            <input name="matches" placeholder="matches" type="number" class="validate">
                        </div>
                        <div class="col s12 m12">
                            <input name="goals" placeholder="goals" type="number" class="validate">
                        </div>
                        <div class="col s12 m12">
                            <input name="assists" placeholder="assists" type="number" class="validate">
                        </div>
                        <div class="col s12 m12">
                            <input name="saves" placeholder="saves" type="number" class="validate">
                        </div>
                        <div class="col s12 m12">
                            <input name="saves" placeholder="saves" type="number" class="validate">
                        </div>
                        <div class="col s12 m12">
                            <input name="red_cards" placeholder="red cards" type="number" class="validate">
                        </div>
                        <div class="col s12 m12">
                            <input name="yellow_cards" placeholder="yellow cards" type="number" class="validate">
                        </div>


                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="waves-effect waves-light btn">Submit</button>
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                </div>
            </form>
        </div>

    @else
        <a class="waves-effect waves-light btn modal-trigger" href="#modal2">Edit Player Stats</a>
        <div id="modal2" class="modal">
            <form action="{{route('update-stats')}}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="row">
                        <input type="hidden" name="id" value="{{$stats->id}}" />
                        <div class="col s12 m12">
                            <input name="matches" placeholder="matches" value="{{$stats->matches}}" type="number" class="validate">
                        </div>
                        <div class="col s12 m12">
                            <input name="goals" placeholder="goals" value={{$stats->goals}} type="number" class="validate">
                        </div>
                        <div class="col s12 m12">
                            <input name="assists" placeholder="assists" value={{$stats->assists}} type="number" class="validate">
                        </div>
                        <div class="col s12 m12">
                            <input name="saves" placeholder="saves" value={{$stats->saves}} type="number" class="validate">
                        </div>

                        <div class="col s12 m12">
                            <input name="red_cards" placeholder="red cards" value={{$stats->red_cards}} type="number" class="validate">
                        </div>
                        <div class="col s12 m12">
                            <input name="yellow_cards" placeholder="yellow cards"  value={{$stats->yellow_cards}} type="number" class="validate">
                        </div>


                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="waves-effect waves-light btn">Submit</button>
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                </div>
            </form>
        </div>

    @endif

    <!-- Modal Structure -->



    <h4>Stats</h4>
    <table>
        <tbody>
            <tr>
                <td>Matches</td>
                <td>{{$stats->matches??'not set'}}</td>
            </tr>
            <tr>
                <td>Goals</td>
                <td>{{$stats->goals??'not set'}}</td>
            </tr>
            <tr>
                <td>Assists</td>
                <td>{{$stats->assists??'not set'}}</td>
            </tr>
            <tr>
                <td>saves</td>
                <td>{{$stats->saves??'not set'}}</td>
            </tr>
            <tr>
                <td>yellow cards</td>
                <td>{{$stats->red_cards??'not set'}}</td>
            </tr><tr>
                <td>red cards</td>
                <td>{{$stats->yellow_cards??'not set'}}</td>
            </tr>
        </tbody>
    </table>

    <h4>Achievements</h4>
    <p>Achievements in detail</p>




@endsection
@section('scriptsHere')
    <script>
        $(document).ready(function(){
            $('.modal').modal();
        });


    </script>

@endsection

