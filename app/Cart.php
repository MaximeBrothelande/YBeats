<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Music;

class Cart extends Model
{
    protected $fillable = [
        'member_id',
        'music_id',
        'author_id',
        'amount',
        'total'
    ];

    public function musics(){
        return $this->belongsTo('App\Music','music_id');
    }
}
