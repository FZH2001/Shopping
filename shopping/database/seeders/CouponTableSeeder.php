<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Coupon::create([
        //     'code' => 'ABC123',
        //     'type' => 'fixed',
        //     'value' => 30
        // ]);
        // Coupon::create([
        //     'code' => 'DEF456',
        //     'type' => 'percent',
        //     'percent_of' => 50
        // ]);


        // Coupon::create([
        //     'code' => 'AMA223',
        //     'type' => 'fixed',
        //     'value' => 70
        // ]);
        // Coupon::create([
        //     'code' => 'OFW274',
        //     'type' => 'percent',
        //     'percent_of' => 60
        // ]);
        // Coupon::create([
        //     'code' => 'JHF885',
        //     'type' => 'fixed',
        //     'value' => 100
        // ]);
        // Coupon::create([
        //     'code' => 'SGW240',
        //     'type' => 'percent',
        //     'percent_of' => 40
        // ]);
        Coupon::create([
            'code' => 'UMA427',
            'type' => 'fixed',
            'value' => 1000
        ]);
        Coupon::create([
            'code' => 'NDUW29',
            'type' => 'percent',
            'percent_of' => 30
        ]);
        Coupon::create([
            'code' => 'HXBW28',
            'type' => 'fixed',
            'value' => 1500
        ]);
        Coupon::create([
            'code' => 'JDU23',
            'type' => 'percent',
            'percent_of' => 25
        ]);
    }
}
