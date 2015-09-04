<?php

use Illuminate\Database\Seeder;

class ServiceTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         \App\ServiceType::create([
			'service_name' => 'Colocation',
		]);

         \App\ServiceType::create([
			'service_name' => 'Facility Management',
		]);

         \App\ServiceType::create([
			'service_name' => 'DRC',
		]);

         \App\ServiceType::create([
			'service_name' => 'Hosting',
		]);

        
    }
}
