<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile($id){
        $data = User::find($id);
        return view('profile',\compact('data'));
    }

    public function profileupdate(Request $request, $id){

         $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.Auth::user()->id.',id'
        ]);


        $data = User::find($id);
        $data->update($request->all());
        $data->save();
        return redirect()->back();
    }

    public function changepassword(){
        return view('auth.changepassword');
    }

    public function updatepassword(Request $request){
        //Check if the Current Password matches with what is in the database.
          if(!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return back()->with('error', 'password lama tidak sama ');
          }
          // Compare the Current Password and New Password using[strcmp function]
          if(strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
            return back()->with('error', 'Password Tidak Boleh Sama Dengan password sebelumnya');
          }
          if($request->get('new_password') != $request->get('new_password_confirmation')){
            return back()->with('error', 'Password yang kamu masukkan tidak sama ');
          }
          //Validate the Password.
        //   $request->validate([
        //     'current_password' => 'required',
        //     'new_password_confirmation' => 'required|string|min:6|confirmed',
        //     'new_password'     => 'required|string|min:6|confirmed'
        //   ]);
          // Save the New Password.
          
          $user = Auth::user();
          $user->password = bcrypt($request->get('new_password'));
          $user->save();
          return back()->with('message', 'Password Berhasil Di rubah');
    }
}
