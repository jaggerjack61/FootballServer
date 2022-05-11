<?php

namespace App\Http\Livewire;

use App\Models\AccountType;
use App\Models\PlayerDislike;
use App\Models\PlayerLike;
use App\Models\PlayerProfile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PlayerProfileList extends Component
{
    public $search;

    public function render()
    {
        $profile=PlayerProfile::where('user_id',Auth::id())->first();
        $isPlayer=false;
        //dd($profiles);
        if($profile){
            return view('pages.claimed-profile',compact('profile','isPlayer'));
        }
        $userType=AccountType::where('user_id',Auth::id())->first();
        //dd($userType);


        if($userType->type=='player'){
            $profiles=PlayerProfile::where('user_id',null)->where('name','like','%'.$this->search.'%')->paginate(15);
            $isPlayer=true;
            //dd('here');
            return view('livewire.player-profile-list',compact('profiles','isPlayer'));
        }
        else {
            $profiles = PlayerProfile::where('name','like','%'.$this->search.'%')->paginate(15);
            return view('livewire.player-profile-list', compact('profiles','isPlayer'));
        }

    }

    public function like(PlayerProfile $profile){
        if(PlayerLike::where('user_id',Auth::id())->where('profile_id',$profile->id)->first()){
            return back()->with('error','Already liked this player');
        }
        else{
            if(PlayerDislike::where('user_id',Auth::id())->where('profile_id',$profile->id)->first()){
                PlayerDislike::where('user_id',Auth::id())->where('profile_id',$profile->id)->first()->delete();
                $like=new PlayerLike();
                $like->profile_id=$profile->id;
                $like->user_id=Auth::id();
                $like->save();
                return back()->with('success','liked profile');
            }
            else{
                $like=new PlayerLike();
                $like->profile_id=$profile->id;
                $like->user_id=Auth::id();
                $like->save();
                return back()->with('success','liked profile');
            }
        }

    }
    public function dislike(PlayerProfile $profile){
        if(PlayerDislike::where('user_id',Auth::id())->where('profile_id',$profile)->first()){
            return back()->with('error','Already disliked this player');
        }
        else{
            if(PlayerLike::where('user_id',Auth::id())->where('profile_id',$profile->id)->first()){
                PlayerLike::where('user_id',Auth::id())->where('profile_id',$profile->id)->first()->delete();
                $dislike=new PlayerDislike();
                $dislike->profile_id=$profile->id;
                $dislike->user_id=Auth::id();
                $dislike->save();
                return back()->with('success','disliked player');
            }else{
                $dislike=new PlayerDislike();
                $dislike->profile_id=$profile->id;
                $dislike->user_id=Auth::id();
                $dislike->save();
                return back()->with('success','disliked player');
            }


        }

    }

}
