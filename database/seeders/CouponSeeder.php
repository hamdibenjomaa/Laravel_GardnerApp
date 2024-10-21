<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Coupon;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Coupon::create(['code' => 'DISCOUNT5', 'discount' => 5.00]);
        Coupon::create(['code' => 'SAVE5', 'discount' => 5.00]);
    }
}
