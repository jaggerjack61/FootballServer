<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function showClubs(){
        $clubs=Club::all();
        return view('clubs.all-clubs',compact('clubs'));
    }
    public function storeClub(Request $request){
        try{
            $club=new Club();
            $club->name=$request->name;
            $club->details=$request->description;
            $club->image='null';
            $club->save();
            return redirect()->route('show-clubs');
        }
        catch(\Exception $e){
            dd($e);
        }
    }
}
