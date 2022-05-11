@extends('layouts.base')

@section('content')
    @if(App\Models\AccountType::where('user_id',auth()->user()->id)->value('type')=='admin')
    <a class="waves-effect waves-light btn modal-trigger" href="#modal33">Edit Player Profile</a>

    <!-- Modal Structure -->
    <div id="modal33" class="modal">
        <form action="{{route('update-profile')}}" method="post">
            @csrf
            <div class="modal-content">
                <div class="row">
                    <input type="hidden" name="id" value="{{$id}}" />
                    <div class="col s12 m12">
                        <input name="name" placeholder="Name" type="text" value="{{$profile->name}}"  class="validate">
                    </div>
                    <div class="col s12 m12">
                        <input name="dob" placeholder="Date of birth" value="{{$profile->dob}}" type="date" class="validate">
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
    <a class="waves-effect waves-light btn modal-trigger" href="#modal3">Player Achievement</a>

    <div id="modal3" class="modal">
        <form action="{{route('store-achievement')}}" method="post">
            @csrf
            <div class="modal-content">
                <div class="row">
                    <input type="hidden" name="profile_id" value="{{$id}}" />
                    <div class="col s12 m12">
                        <input name="achievement" placeholder="achievement" type="text" class="validate">
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

    @endif
    <!-- Modal Structure -->


    <h4>
        <div class="info">
        {{$profile->name}}
        </div></h4>
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
    @foreach($achievements as $achievement)
        <ul>
    <li>{{$achievement->achievement}}</li>
        </ul>
    @endforeach




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

