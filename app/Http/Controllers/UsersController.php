<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('users/manageprofiles',compact("users"));
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect('users/manageprofiles');
    }

    public function show($id)
    {
        $user=User::findOrFail($id);

        return view('users/editprofile',compact('user'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'name'=> 'min:3',
            'password' => 'required'
        ]);
        $user = User::findOrFail($id);
        $input = $request->all();
        $input['password'] = bcrypt($request['password']);
        $user->fill($input)->save();

        return redirect("/home");
    }

    public function accountDown($id){

        User::destroy($id);

        return redirect("/home");

    }
}
