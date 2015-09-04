<?php

use Illuminate\Database\Seeder;

class CustomerSegmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         \App\CustomersSegment::create([
			'segment_name' => 'Finance',
		]);

         \App\CustomersSegment::create([
			'segment_name' => 'Government',
		]);

         \App\CustomersSegment::create([
			'segment_name' => 'Manufacture & Trading',
		]);

         \App\CustomersSegment::create([
			'segment_name' => 'Media',
		]);

         \App\CustomersSegment::create([
			'segment_name' => 'Partnership',
		]);

         \App\CustomersSegment::create([
			'segment_name' => 'Resources',
		]);

         \App\CustomersSegment::create([
			'segment_name' => 'Service',
		]);

         \App\CustomersSegment::create([
			'segment_name' => 'Telecommunication',
		]);

         \App\CustomersSegment::create([
			'segment_name' => 'Transportation',
		]);
    }
}
