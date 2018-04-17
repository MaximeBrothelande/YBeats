<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $fillable = [
    'id',
    'name',
    'author',
    'descrip',
    'price',
    'dispo'
    ];

    protected $dates = [
      'created_at',
      'updated_at',
    ];
}
