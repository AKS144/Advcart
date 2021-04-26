<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;


class RegisteredController extends Controller
{
    public function index()
    {
        //$users = User::paginate(2);
        //$users = User::all();
        $users = User::where('role_as',Input::get('roles'))->get();
        return view('admin.users.index')->with('users', $users);
    }

    public function edit($id)
    {
        $user_roles= User::find($id);
        return view('admin.users.edit')->with('user_roles',$user_roles);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
       // $user->name = $request->input('name');

        $user->fname = $request->input('fname');
        $user->role_as = $request->input('role_as');
        $user->isban = $request->input('isban');
        $user->update();

        return redirect()->back()->with('status','Role is updated');
    }

    public function userOnlineStatus()
    {
        $users = DB::table('users')->get();

        foreach ($users as $user) {
            if(Cache::has('user-is-online'.$user->id)){
                echo "User".$user->name."is online.";
            }
            else{
                echo "User".$user->name."is offline.";
            }
        }
    }
}
