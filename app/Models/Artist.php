<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
    public function comics(){
        return $this->belongsToMany(Comic::class, 'comic_artist');
    }
    
    public function characters(){
        return $this->belongsToMany(Character::class, 'character_artist');
    }
}
