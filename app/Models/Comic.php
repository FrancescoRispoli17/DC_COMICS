<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function artists(){
        return $this->belongsToMany(Artist::class, 'comic_artist');
    }
}
