<?php

namespace App\Http\Controllers;

use Validator;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Testing\Concerns\InteractsWithSession;

class MembersController extends Controller
{
    public function members(){
        $members = Member::all();
        return view('pages.members', compact('members'));
    }

    public function saveData(Request $request){
        $validator = Validator::make($request->all(), [
            'firstname' =>'required|max:255',
            'lastname'  =>'required|max:255',
            'birthday'  =>'required|max:10',
            'report'    =>'required|max:255',
            'country'   =>'required|max:2',
            'phone'     =>'required|max:17',
            'email'     =>'required|max:255'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            echo (json_encode($errors));
            return;
        }
        $input = $request->all();
        $member = Member::create($input);
        $id = $member->id;
        session(['fuID'=>$id]);
    }

    public function saveData2(Request $request){
        $this->validate($request, [
            'company' =>'max:255',
            'position'  =>'max:255'
        ]);
        $input = $request->all();
        $id = session('fuID');
        $member = new Member;
        $member = $member::find($id);

        $member->company = $input['company'];
        $member->position = $input['position'];
        $member->about = $input['about'];
        $member->save();
        $request->session()->forget('fuID');
    }

    public function uploadPhoto(){
        $id = session('fuID');
        $file = request()->file('image');

        $ext = $file->guessClientExtension();

        $path = $file ->store('avatar');
        $member = new Member;
        $member = $member::find($id);
        $member->photo = $path;
        $member->save(); 
    }

    public function setVisibility(Request $request){
        $input = $request->all();
        $id = $input['id'];
        $member = new Member();
        $member = $member::find($id);
        if ($input['status'] == 'hide'){
            $member->visibility = 0;
        }else{
            if($input['status'] == 'show'){
                $member->visibility = 1;
            }
        }
        $member->save();
    }

    public function isValid(Request $request){
        $input = $request->all();
        $email = $input['email'];
        $count = Member::where('email','=',$email)->count();
        if ($count > 0){
            $rez = 'false';    
        }else{
            $rez = 'true';    
        }
        echo json_encode($rez);
    }
}
