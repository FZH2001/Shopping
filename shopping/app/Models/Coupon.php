<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    public $fillable=['percent_of'];
    public static $used;

    public static function findByCode($code)
    {

        return self::where('code', $code)->first();
    }
    public function discount($total)
    {
        if ($this->type == 'fixed')
            return $this->value;
        elseif ($this->type == 'percent')
            return ($this->percent_off/100) * $total;
        else
            return 0;
    }
    public static function SetUsed($var){
        self::$used=$var;
    }
    public static function GetUsed(){
       return self::$used;
   }
}
//Coupon::SetUsed(1);