<?php

namespace App\Http\Controllers;

use App\Models\AccountType;
use App\Models\PlayerAchievement;
use App\Models\PlayerProfile;
use App\Models\PlayerStat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    public function showProfiles(){
        //dd(Auth::account_type());
        $profile=PlayerProfile::where('user_id',Auth::id())->first();
        $isPlayer=false;
        //dd($profiles);
        if($profile){
            return view('pages.claimed-profile',compact('profile','isPlayer'));
        }
        $userType=AccountType::where('user_id',Auth::id())->first();
        //dd($userType);


        if($userType->type=='player'){
            $profiles=PlayerProfile::where('user_id',null)->paginate(15);
            $isPlayer=true;
            //dd('here');
            return view('pages.player-profile',compact('profiles','isPlayer'));
        }
        else {
            $profiles = PlayerProfile::paginate(15);
            return view('pages.player-profile', compact('profiles','isPlayer'));
        }
    }
    public function storeProfile(Request $request){
        try{
            $profile=new PlayerProfile();
            $profile->name=$request->name;
            $profile->dob=$request->dob;
            $profile->sex=$request->sex;
            $profile->education=$request->education;
            $profile->height=$request->height;
            $profile->position=$request->position;
            $profile->province=$request->province;

            $profile->save();

            $profile=PlayerProfile::latest()->first();

            $file= $request->file('image');
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('/img/profile/'.$profile->id), $filename);

            $profile->update(['image'=> $filename]);
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
            return back()->with('success','updated player profile');
        }catch(\Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
    public function viewProfile($id){

        $stats=PlayerStat::where('profile_id',$id)->get()->first();
        $achievements=PlayerAchievement::where('profile_id',$id)->get();
        $profile=PlayerProfile::find($id);
//        if($stats){
//            dd('here',$id,$stats);
//
//        }else{
//            dd('there');
//        }
        return view('pages.view-player-profile',compact('stats','id','achievements','profile'));
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
    public function storeAchievement(Request $request){
        try{
            $achievement=new PlayerAchievement();
            $achievement->achievement = $request->achievement;
            $achievement->profile_id = $request->profile_id;
            $achievement->save();
            return back()->with('success','stored player ahievements');
        }catch(\Exception $e){
            return back()->with('error',$e->getMessage());
        }

    }
    public function claimProfile($profile_id){
        //dd(auth()->user()->name);
        try{
            $profile=PlayerProfile::find($profile_id);
            if($profile->name==auth()->user()->name){
            $profile->update([
                'user_id'=>Auth::id()
            ]);
            return back()->with('success','profile has been linked with account');
            }
            else{
                return back()->with('error','profile name did not match player name');
            }
        }catch(\Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }

    public function releaseProfile($profile_id){
        try{
            $profile=PlayerProfile::find($profile_id);
            $profile->update([
                'user_id'=>null
            ]);
            return back()->with('success','profile has been released from this account');
        }catch(\Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
}
