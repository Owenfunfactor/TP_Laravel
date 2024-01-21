<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::create([
            'name' => 'mazda',
            'description'=> 'Véhicule d exception',
            'brand' => 'General_motors',
            'price' => 12000,
            'num_plaq' => 'BK-1275',
            'lien_img' => 'image/00.jpg'
        ]);

        Car::create([
            'name' => 'mactosh',
            'description'=> 'Véhicule d exception',
            'brand' => 'General_motors',
            'price' => 12000,
            'num_plaq' => 'BT-1275',
            'lien_img' => 'image/00.jpg'
        ]);

        Car::create([
            'name' => 'macnos',
            'description'=> 'Véhicule d exception',
            'brand' => 'General_motors',
            'price' => 12000,
            'num_plaq' => 'BS-1275',
            'lien_img' => 'image/00.jpg'
        ]);


    }
}
