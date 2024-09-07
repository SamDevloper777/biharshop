<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $coupons=[
            ['code'=>'SUMMER2022','amount'=> 100],
            ['code'=>'WINTER2022','amount'=>150],
            ['code'=>'EARLYBIRD2023','amount'=>200],
         ];
         foreach($coupons as $coupon)
         {
            Coupon::create($coupon);
         }
    }
}
