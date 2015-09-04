<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Add calls to Seeders here
        $this->call('UsersTableSeeder');
		$this->call('LanguagesTableSeeder');
		$this->call('ArticleCategoriesTableSeeder');
		$this->call('ArticlesTableSeeder');
        $this->call('CustomerSegmentTableSeeder');
        $this->call('CustomerTableSeeder');
        $this->call('DcLocationSeeder');
        $this->call('ServiceTypeTableSeeder');


        
        Model::reguard();
    }
}
