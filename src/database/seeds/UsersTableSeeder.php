<?php 

namespace database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
    	DB::table('users')->delete();
    	User::create(array(
    		'name'	=>'Dmitry',
    		'email'	=>'draevskiy_ds@groupbwt.com',
    		'password'	=>Hash::make('admin123')
    	));
    }
}
