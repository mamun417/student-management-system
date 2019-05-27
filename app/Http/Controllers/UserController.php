<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class UserController extends Controller
{

    function showProfile(){
        return view('profile.show_profile');
    }

    /**
     * Update admin profile info
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    function updateProfile(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' .Auth::user()->id,
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        $update = $user->update($request->all());

        if ($update){
            return back()->with('success', 'Profile update successfully');
        }else{
            return back()->with('error', 'Profile could not be update');
        }
    }

    /**
     * @return Factory|View
     */
    function changePassword(){
        return view('auth.passwords.change_password');
    }

    /**
     * Update admin password
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    function updatePassword(Request $request){

        $this->validate($request, [
            'password' => 'required|min:8|confirmed'
        ]);

        $data = [];
        $data['password'] = Hash::make($request->password);

        $update_password = User::where('id', Auth::user()->id)
            ->update($data);

        if ($update_password){
            return redirect(url('/'))->with('success', 'Password update successfully');
        }else{
            return redirect(url('/'))->with('error', 'Profile could not be update');
        }
    }
}
