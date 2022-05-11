<div>
    @include('layouts.flash-message')

    @if(App\Models\AccountType::where('user_id',auth()->user()->id)->value('type')=='admin')

    <a class="waves-effect waves-light btn modal-trigger" href="#modal3">New Player Profile</a>

    <!-- Modal Structure -->
    <div id="modal3" class="modal">
        <form action="{{route('store-profile')}}" method="post"  enctype="multipart/form-data">
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
                        <input name="height" placeholder="Height in meters" type="text" class="validate">
                    </div>
                    <div class="col s12 m12">
                        <select name="position">
                            <option value="goalkeeper">goalkeeper</option>
                            <option value="striker">striker</option>
                            <option value="midfielder">midfielder</option>
                            <option value="defender">defender</option>

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
                    <div class="col s12 m12">
                        <input name="province" placeholder="province" type="text" class="validate">
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
    @else

    @endif


    <div class="row">
        <div class="col s12 m12">
            <input type="text" wire:model="search" placeholder="Search player name"/>
        </div>
    </div>

    <div class="row">
        @foreach($profiles as $profile)
            <div class="col s12 m12">
                <div class="card">
                    <div class="card-image">
                        <img src="/img/profile/{{$profile->id}}/{{$profile->image}}">

                    </div>
                    <div class="card-content">
                        <span class="card-title info">
                            <p>{{$profile->position}}</p>
                            {{$profile->name}} Club: {{$profile->club()}}</span>
                        <p>Hieght:{{$profile->height}}</p>
                        <p>DOB:{{$profile->dob}}</p>
                        <p>Sex{{$profile->sex}}</p>
                        <p>Education:{{$profile->education}}</p>
                    </div>
                    <div class="card-action">
                    <div class="row">
                        <div class="col s4 m4">
                        <a class="waves-effect waves-light btn btn-block" href="{{route('view-profile',[$profile->id])}}"><i class="material-icons left">visibility</i>View More</a>
                        </div>
                        @if($isPlayer)
                            <div class="col s4 m4">
                            <a class="waves-effect waves-light btn btn-block" href="{{route('claim-profile',[$profile->id])}}"><i class="material-icons left">link</i>Claim Profile</a>
                            </div>
                        @else
                            <div class="col s4 m4">

                            </div>

                        @endif
                        <div class="col s4 m4">
                            <a href="#" class="btn btn-small" wire:click="like({{$profile->id}})">
                                <span class="material-icons left">
                                thumb_up_off_alt
                                </span>{{$profile->likes->count()}} LIKE</a>
                            <a href="#" class="btn btn-small" wire:click="dislike({{$profile->id}})">
                                <span class="material-icons left">
                                thumb_down_alt
                                </span>{{$profile->dislikes->count()}} HATE
                            </a>
                        </div>

                    </div>




                    </div>

                </div>
            </div>
        @endforeach

    </div>
    {{$profiles->links()}}

</div>
