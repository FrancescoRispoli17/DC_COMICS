<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'data_nascita',
        'indirizzo',
        'codice_fiscale'
    ];
    public function user(){
        return $this->hasOne(User::class);
    }
}
