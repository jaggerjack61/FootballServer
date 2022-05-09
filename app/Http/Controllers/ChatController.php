<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function showChats(){
        return view('pages.chat');
    }
}
