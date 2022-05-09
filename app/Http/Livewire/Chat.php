<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chat extends Component
{
    public $patient_id;
    public $text;

    protected $listeners = ['refreshComponent' => '$refresh'];


    public function sendText()
    {
        // dd('here');
        $chat=new \App\Models\Chat();
        //$chat->patient_id=$this->patient_id;
        $chat->user_id=Auth::id();
        $chat->name=auth()->user()->name;
        $chat->message=$this->text;
        $chat->save();
    }
    public function render()
    {
        //dd($this->patient_id);
        $messages=\App\Models\Chat::all();
        return view('livewire.chat',compact('messages'));
    }

}
