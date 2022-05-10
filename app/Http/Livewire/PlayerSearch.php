<?php

namespace App\Http\Livewire;

use App\Models\ClubHistory;
use App\Models\PlayerProfile;
use Livewire\Component;

class PlayerSearch extends Component
{
    public $club_id;
    public $search;

    public function joinClub($profile_id){
        $last=ClubHistory::where('profile_id',$profile_id)->latest()->first();
        //dd($last);
        if($last){
            if($last->club_id==$this->club_id){
                return back()->with('success','player already belongs to this club');
            }
        }
        try{
            $club=new ClubHistory();
            $club->club_id=$this->club_id;
            $club->profile_id=$profile_id;
            $club->save();
            return back()->with('success','Player has been added to club');
        }catch(\Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }

    public function render()
    {
        $profiles=PlayerProfile::where('name','like','%'.$this->search.'%')->paginate(5);
        return view('livewire.player-search',compact('profiles'));
    }
}
