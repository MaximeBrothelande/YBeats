<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'member_id',
        'total'
    ];

    public function orderItems()
    {
        return $this->belongsToMany('App\Music')->withPivot('amount','total');
    }

}
