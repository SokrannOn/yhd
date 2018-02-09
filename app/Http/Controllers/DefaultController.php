<?php

namespace App\Http\Controllers;

use App\Department;
use App\Position;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    public function index(){

        $dept = Department::all();
        if(!count($dept)){
            $dept = new Department();
            $dept->name = "គណៈស្ថាបនិក";
            $dept->description="គណៈស្ថាបនិក";
            $dept->user_id=1;
            $dept->active=1;
            $dept->save();
        }

        $position = Position::all();
        if(!count($position)){
           $pos = new Position();
           $pos->name = "ប្រធានស្ថាបនិក";
           $pos->description="ប្រធានស្ថាបនិក";
           $pos->department_id=1;
           $pos->user_id=1;
            $pos->active=1;
           $pos->save();
        }

        $user = User::all();
        if(!count($user)){
           $users = new User();
           $users->position_id=1;
           $users->name="Supper User";
           $users->username="Supper User";
           $users->email="admin@gmail.com";
           $users->password=bcrypt('admin');
            $users->photo="default_user.png";
           $users->active=1;
           $users->logged =1;
           $users->save();

        }

        if(Auth::check()){
            return view(' admin.dashboard');
        }
        return view('welcome');
    }

    public function AdminPanel(){
        return view(' admin.dashboard');
    }

    public function changePassword(){
        return view('admin.users.changePassword');
    }

    public function changedPass(Request $request){
        $this->validate($request,[
            'password'      =>'required',
            'confirm_pass'  =>'required',
        ],[

            'password.required'     =>'field password required',
            'confirm_pass.required' =>'field confirm password required',
        ]);
        $user= User::find(Auth::user()->id);
        $user->logged =1;
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return redirect('/admin');
    }


}
