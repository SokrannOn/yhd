<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    public function create(){
        return view('admin.departments.create');
    }
    public function view(){
        $dept = Department::where('active',1)->get();
        return view('admin.departments.viewdepartment',compact('dept'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'       =>'required'
        ],[
            'name.required' =>'Department name required'
        ]);

        $department = new Department();
        $department->name = trim($request->input('name'));
        $department->description = trim($request->input('description'));
        $department->active = 1;
        $department->user_id = Auth::user()->id;
        $department->save();
        return redirect('/admin/department/create');

    }
    public function edit($id){
        $d = Department::find($id);
        return view('admin.departments.edit',compact('d'));

    }

    public function update(Request $request,$id){
        $department = Department::find($id);
        $department->name = trim($request->input('name'));
        $department->description = trim($request->input('description'));
        $department->user_id = Auth::user()->id;
        $department->save();
        return redirect('/admin/department/create');
    }

    public function delete($id){
        $d = Department::find($id);
        $d->active =0;
        $d->save();
        return redirect('/admin/department/create');
    }
}
