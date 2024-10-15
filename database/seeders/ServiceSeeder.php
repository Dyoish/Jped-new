<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        Service::create(['name' => 'Wedding Photography']);
        Service::create(['name' => 'Portrait Photography']);
        Service::create(['name' => 'Event Photography']);
    }
}