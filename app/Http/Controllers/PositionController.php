<?php

namespace App\Http\Controllers;

use App\Department;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PositionController extends Controller
{

    public function create(){
        $department = Department::where('active',1)->pluck('name','id');
        return view('admin.position.create',compact('department'));
    }
    public function view(){
        $position = Position::where('active',1)->get();
        return view('admin.position.viewposition',compact('position'));
    }

    public function store(Request $request){
        $this->validate($request,[
           'name'       =>'required',
           'department_id'   =>'required'
        ],[
            'name.required' =>'Position name required',
            'department_id.required' =>'Department name required'
        ]);

        $position = new Position();
        $position->name = $request->input('name');
        $position->description = $request->input('description');
        $position->department_id = $request->input('department_id');
        $position->user_id = Auth::user()->id;
        $position->active = 1;
        $position->save();
        return redirect('/admin/position/create');

    }
    public function edit($id){
        $p =Position::find($id);
        $department = Department::where('active',1)->pluck('name','id');
        return view('admin.position.edit',compact('p','department'));

    }

    public function update(Request $request,$id){
        $position = Position::find($id);
        $position->name=$request->input('name');
        $position->description=$request->input('description');
        $position->department_id = $request->input('department_id');
        $position->save();
        return redirect('/admin/position/create');
    }

    public function delete($id){

        $p= Position::find($id);
        $p->active = 0;
        $p->save();
        return redirect('/admin/position/create');
    }


}
