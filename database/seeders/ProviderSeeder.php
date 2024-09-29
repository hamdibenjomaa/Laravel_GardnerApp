<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Provider;
class ProviderSeeder extends Seeder
{
    public function run()
    {
        Provider::create([
            'name' => 'Provider 1',
            'email' => 'provider1@example.com',
            'phone_number' => '123-456-7890',
            'address' => '123 Main Street',
        ]);

        Provider::create([
            'name' => 'Provider 2',
            'email' => 'provider2@example.com',
            'phone_number' => '987-654-3210',
            'address' => '456 Another Street',
        ]);
    }
}