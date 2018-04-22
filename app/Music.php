<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $fillable = [
    'id',
    'title',
    'author_id',
    'descrip',
    'price',
    'dispo'
    ];

    protected $dates = [
      'created_at',
      'updated_at',
    ];

}
