<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use Illuminate\support\facades\Hash;
class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.user', compact('users'));
    }

    public function setting()
    {
        // die('user');
        $users = User::all();
        return view('admin.usersettings', compact('users'));
    }

    public function newEmail(Request $request)
    {
        $user = Auth::user();
        $newEmail = $request->email;
        $currentPassword = $request->currentPassword;

        if(Hash::check($currentPassword, $user->password))
        {
            $objUser = User::find($user->id);
            $objUser->email = $newEmail;
            $objUser->save();
            return redirect()->route('usersettings')->with('message', 'Change email success');
        } else {
            return redirect()->route('usersettings')->with('error', 'Change email unsuccess');
        }
    }

    public function newPassword(Request $request)
    {
        $user = Auth::user();
        $newPass = $request->newPassword;
        $currentPassword = $request->currentPassword;
        $passwordConfirmation = $request->passwordConfirmation;

        if(Hash::check($currentPassword, $user->password))
        {
            $objUser = User::find($user->id);
            $objUser->password = Hash::make($newPass);
            $objUser->save();
            return redirect()->route('usersettings')->with('message', 'Change password success');
        } else {
            return redirect()->route('usersettings')->with('error', 'Change password unsuccess');
        }
    }
}
