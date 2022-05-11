<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerProfile extends Model
{
    use HasFactory;
    public $guarded=[];

    public function club(){

        $last=ClubHistory::where('profile_id',$this->id)->latest()->first()->club->name??'No club yet';
        return $last;
    }
    public function likes(){
        return $this->hasMany(PlayerLike::class,'profile_id');
    }
    public function dislikes(){
        return $this->hasMany(PlayerDislike::class,'profile_id');
    }
}
