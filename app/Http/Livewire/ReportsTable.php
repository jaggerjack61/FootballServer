<?php

namespace App\Http\Livewire;

use App\Models\PlayerDislike;
use App\Models\PlayerLike;
use App\Models\PlayerProfile;
use Livewire\Component;

class ReportsTable extends Component
{
    public $search;
    public function render()
    {
        $players=PlayerProfile::where('name','LIKE','%'.$this->search.'%')->get();
        //$likes=PlayerLike::all();
        //$dislikes=PlayerDislike::all();
        $results=[];
        foreach($players as $player){
            $collection = collect([$player->name,PlayerLike::where('profile_id',$player->id)->count(),PlayerDislike::where('profile_id',$player->id)->count(),$player->id]);
            array_push($results,$collection);

        }
        return view('livewire.reports-table',compact('results'));
    }
}
