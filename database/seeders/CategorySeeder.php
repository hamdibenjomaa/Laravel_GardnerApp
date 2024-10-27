<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            ['name' => 'facturation'],
            ['name' => 'Support technique'],
            ['name' => 'Demande de produit'],
            ['name' => 'probléme liée au compte'],
        ];
    
        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}