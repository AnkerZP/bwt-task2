<?php 

namespace database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Member;

class MembersTableSeeder extends Seeder
{
    public function run()
    {
    	DB::table('members')->delete();
    	Member::create(array(
    		'firstname'	=>'Dmitry',
    		'lastname'	=>'Draevskiy',
    		'birthday'	=>'1996-06-05',
    		'report'	=>'Report #1',
    		'country'	=>'us',
    		'phone'		=>'+1 (555) 555-5555',
    		'email'		=>'test1@gmail.com',
    		'visibility'=>'1',
    		'company'	=>'BWT',
    		'position'	=>'Tester #1',
    		'photo'		=>'',
    		'about'		=>'bla-bla-bla'
    	));
    	Member::create(array(
    		'firstname'	=>'Hide',
    		'lastname'	=>'Hideovich',
    		'birthday'	=>'1996-06-05',
    		'report'	=>'Report #2',
    		'country'	=>'us',
    		'phone'		=>'+1 (666) 999-2281',
    		'email'		=>'hide1@gmail.com',
    		'visibility'=>'0',
    		'company'	=>'BWT',
    		'position'	=>'Tester #2',
    		'photo'		=>'',
    		'about'		=>'blind-blind-blind'
    	));
    }
}
