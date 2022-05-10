<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubHistory extends Model
{
    use HasFactory;
    public $guarded=[];
    public function club(){
        return $this->belongsTo(Club::class,'club_id');
    }
}
