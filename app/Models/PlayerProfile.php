<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerProfile extends Model
{
    use HasFactory;
    public $guarded=[];

    public function club(){

        $last=ClubHistory::where('profile_id',$this->id)->latest()->first()??'No club yet';
        return $last->club->name;
    }
}
