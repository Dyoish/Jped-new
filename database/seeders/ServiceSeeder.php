<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

//Makikita rin mga values sa database

class ServiceSeeder extends Seeder
{
    public function run()
    {
        Service::create(['name' => 'Portrait Photography']);
        Service::create(['name' => 'Concert Photography']);
        Service::create(['name' => 'Cosplay Photography']);
        Service::create(['name' => 'Products Photography']);
        Service::create(['name' => 'Companion Photography']);
        Service::create(['name' => 'Model Photography']);
    }
}