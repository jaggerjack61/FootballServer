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
            $club->save();

            $club=Club::latest()->first();

            $file= $request->file('image');
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('/img/club/'.$club->id), $filename);

            $club->update(['image'=> $filename]);



            //$club->image='null';
            return redirect()->route('show-clubs');
        }
        catch(\Exception $e){
            dd($e);
        }
    }

    public function viewClub($id){
        $club=Club::find($id);
        return view('clubs.view-club',compact('club'));
    }
}
