<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function main(){
    	$count = Member::where('visibility','=','1')->count();
        return view('pages.main', compact('count'));
    }
}
