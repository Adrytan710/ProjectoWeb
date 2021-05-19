<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function registered() 
    {
        $users = User::all();
        return view('admin.register')->with('users',$users);
    }

    public function registeredit(Request $request, $id) 
    {
        $users = User::findOrFail($id);
        return view('admin.register-edit')->with('users',$users);
    }
    public function registerupdate(Request $request,$id){
        $users = User::find($id);
        $users->name = $request->input('username');
        $users->usertype = $request->input('usertype');
        $users->update();

        return redirect('/role-register')->with('status','Se ha actualizado correctamente');
    }
    public function registerdelete($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect('/role-register')->with('status','Se ha eliminado correctamente');
    }
    public function store(Request $request)
    {
        $usersus =new User;

        $usersus->name =$request->input('name');
        $usersus->phone =$request->input('phone');
        $usersus->email =$request->input('email');
        $usersus->password =$request->input('password');
        $usersus-> save();
        return redirect('/role-register')->with('success','Usuario añadido con exito');
    }
}
