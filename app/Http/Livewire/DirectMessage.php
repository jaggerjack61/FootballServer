<?php

namespace App\Http\Livewire;

use App\Models\AccountType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DirectMessage extends Component
{
    public $patient_id;
    public $text;
    public $profile_id;

    protected $listeners = ['refreshComponent' => '$refresh'];


    public function sendText()
    {
        // dd('here');
        $chat=new \App\Models\DirectMessage();
        //$chat->patient_id=$this->patient_id;
        $text=$this->text;
        if(strpos($text,'youtube.com')){
            if(strpos($text,'?v=')){
                $pos=strpos($text,'?v=');
                $video=substr($this->text,$pos+3,11);
                $chat->video=$video;

            }

        }

        if(strpos($text,'youtu.be')){
            $pos=strpos($text,'youtu.be');
            $video=substr($this->text,$pos+9,11);
            $chat->video=$video;
        }
        if(AccountType::where('user_id',auth()->user()->id)->value('type')=='admin'){

        }
        if(AccountType::where('user_id',auth()->user()->id)->value('type')=='player'){

        }

        $chat->user_id=Auth::id();
        $chat->profile_id=$this->profile_id;
        $chat->message=$this->text;
        $chat->save();
    }
    public function render()
    {
       // dd($this->profile_id);
        $messages=\App\Models\DirectMessage::where('profile_id',$this->profile_id)->get();
        return view('livewire.direct-message',compact('messages'));
    }


}
