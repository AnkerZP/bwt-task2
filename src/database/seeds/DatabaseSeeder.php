<?php

use database\seeds\MembersTableSeeder;
use database\seeds\UsersTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call('database\seeds\MembersTableSeeder');
    	$this->call('database\seeds\UsersTableSeeder');
    }
}
