<div wire:poll>
    {{-- Do your work, then step back. --}}
    <div style="overflow-y: scroll; height:600px;">

        @foreach($messages as $message)
            <div class="row">
                @if($message->user_id!=auth()->user()->id)
                    <div style="width:90%;" class="talk-bubble tri-right left-top p-2">

                        <div class="talktext">
                            @if($message->video)
                                <iframe width="80%" src="https://www.youtube.com/embed/{{$message->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            @endif
                            <p>{{$message->message}}</p>
                            <p style="color:green;">from {{$message->name}} {{$message->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
                @else
                    <div style="width:90%;"  class="talk-bubble tri-right right-top p-2">
                        <div class="talktext" style="float:right;">
                            @if($message->video)
                                <iframe width="80%" src="https://www.youtube.com/embed/{{$message->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            @endif
                            <p>{{$message->message}}</p>
                            <p style="color:green;">{{$message->created_at->diffForHumans()}}</p>
                        </div>
                    </div>

                @endif
            </div>



        @endforeach
<div id="here"></div>
    </div>
    <div class="row">

        <div class="col s9 m9">
            <input id="messager" placeholder="write something" wire:model="text" type="text" class="validate">

        </div>
        <div class="col s3 m3">
            <button class="waves-effect waves-light btn" wire:click="sendText">Send</button>
        </div>
    </div>


</div>
