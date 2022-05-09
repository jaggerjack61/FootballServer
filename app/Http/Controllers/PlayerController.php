<?php

namespace App\Http\Controllers;

use App\Models\PlayerProfile;
use App\Models\PlayerStat;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function showProfiles(){
        $profiles=PlayerProfile::paginate(2);
        return view('pages.player-profile',compact('profiles'));
    }
    public function storeProfile(Request $request){
        try{
            $profile=new PlayerProfile();
            $profile->name=$request->name;
            $profile->dob=$request->dob;
            $profile->sex=$request->sex;
            $profile->education=$request->education;
            $profile->image='null';
            $profile->save();
            return back()->with('success','stored player profile');
        }
        catch(\Exception $e){
            return back()->with('error',$e->getMessage());
        }


    }
    public function updateProfile(Request $request){
        try{
            $profile=PlayerProfile::find($request->id);
            $profile->update([
               "name"=>$request->name,
               "dob"=>$request->dob,
               "education"=>$request->education
            ]);
            return back()->with('success','stored player profile');
        }catch(\Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
    public function viewProfile($id){

        $stats=PlayerStat::where('profile_id',$id)->get()->first();
//        if($stats){
//            dd('here',$id,$stats);
//
//        }else{
//            dd('there');
//        }
        return view('pages.view-player-profile',compact('stats','id'));
    }
    public function storeStats(Request $request){
        try{
            $stats=new PlayerStat();
            $stats->profile_id=$request->id;
            $stats->matches=$request->matches;
            $stats->goals=$request->goals;
            $stats->assists=$request->assists;
            $stats->saves=$request->saves;
            $stats->red_cards=$request->red_cards;
            $stats->yellow_cards=$request->yellow_cards;
            $stats->save();
            return back()->with('success','stored player statistics');
        }catch(\Exception $e){
            return back()->with('error',$e->getMessage());
        }

    }
    public function updateStats(Request $request){
        try{
            $stats=PlayerStat::find($request->id);
            $stats->profile_id=$request->id;
            $stats->matches=$request->matches;
            $stats->goals=$request->goals;
            $stats->assists=$request->assists;
            $stats->saves=$request->saves;
            $stats->red_cards=$request->red_cards;
            $stats->yellow_cards=$request->yellow_cards;
            $stats->save();
            return back()->with('success','updated player statistics');
        }catch(\Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
}
