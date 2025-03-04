<?php

namespace App\Http\Controllers;

use App\Models\adminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class loginFormController extends Controller
{
    public function matchData(Request $req)
    {
        $username = $req->username;
        $password = $req->password;

        $record = adminModel::where('username', $username)
            ->where('password', $password)
            ->first();

        if (!$record) {
            return redirect('/login')->with('error', 'Invalid Credentials');
        } else {
            Session::put('username', $record->username);
            return redirect('/')->with('success', 'Login Successful!');
        }
    }

    public function logout(Request $req)
    {
        Session::flush();
        return redirect('/login')->with('message', 'You have been logged out successfully.');
    }
}
