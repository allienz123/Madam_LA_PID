<?php

use Illuminate\Database\Seeder;

class DcLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         \App\DcLocation::create([
			'location_name' => 'TBS Lt.1',
		]);

         \App\DcLocation::create([
			'location_name' => 'TBS Lt.2',
		]);

         \App\DcLocation::create([
			'location_name' => 'TBS Lt.3',
		]);

         \App\DcLocation::create([
			'location_name' => 'BDG Lt.1',
		]);

         \App\DcLocation::create([
			'location_name' => 'BDG Lt.2',
		]);

    }
}
