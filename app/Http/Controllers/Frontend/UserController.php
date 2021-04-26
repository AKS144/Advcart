<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function profile()
    {
        return view('frontend.user.profile');
    }

    public function profile_update(Request $request)
    {
       $user_id = Auth::user()->id;
       $user = User::findOrFail($user_id);

       $user->lname = $request->input('lname');
       $user->address1 = $request->input('address1');
       $user->address2 = $request->input('address2');
       $user->city = $request->input('city');
       $user->state = $request->input('state');
       $user->pincode = $request->input('pincode');
       $user->phone = $request->input('phone');
       $user->alternate_phone = $request->input('alternate_phone');
       //$request->hasfile('image');//file has to move to storage place so called in different manner

       if($request->hasfile('image'))
       {
           $destination = 'uploads/profile/'.$user->image;
           if(File::exists($destination))
           {
               File::delete($destination);
           }
           $file = $request->file('image');
           $extension = $file->getClientOriginalExtension();//sometimes same name,no will store so time extension will stores with time
           $filename = time().'.'.$extension;
           $file->move('uploads/profile/',$filename);//folder uploads
           $user->image = $filename;
       }
        $user->update();
        return redirect()->back();//-with('status','Profile Updated');
    }
}
