<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;
    protected $fillable=["user_id","total","discount_percent","delivered",'tax','discount','newTotal'];

    public function user(){
       return $this->belongsTo(User::class);
    }

    public function orderItems(){

       return $this->belongsToMany(product::class)->withPivot('qty','total');
    }
}

