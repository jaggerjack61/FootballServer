<div wire:poll>
    {{-- Do your work, then step back. --}}
    <div style="overflow-y: scroll; height:600px;">

        @foreach($messages as $message)
            <div class="row">
                @if($message->user_id!=auth()->user()->id)
                    <div style="width:90%;" class="talk-bubble tri-right left-top p-2">

                        <div class="talktext">
                            <p>{{$message->message}}</p>
                            <p style="color:green;">from {{$message->name}} {{$message->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
                @else
                    <div style="width:90%;"  class="talk-bubble tri-right right-top p-2">
                        <div class="talktext" style="float:right;">
                            <p>{{$message->message}}</p>
                            <p style="color:green;">{{$message->created_at->diffForHumans()}}</p>
                        </div>
                    </div>

                @endif
            </div>



        @endforeach

    </div>
    <div class="row">

        <div class="col s9 m9">
            <input id="messager" placeholder="write something" wire:model="text" type="text" class="validate">

        </div>
        <div class="col s3 m3">
            <button class="waves-effect waves-light btn" wire:click="sendText">Send</button>
        </div>
    </div>

    <script>
        while(1==1){
            delay(5000);

            Livewire.emit('refreshComponent')
        }
    </script>
</div>
