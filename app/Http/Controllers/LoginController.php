<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

public function proseslogin(Request $request) {
    $data = $request->all();
    $admin = Admin::where('name', $data['username'])->first();
    // dd($admin);

    // Check if an admin with the provided username exists
    if ($admin) {
        // Compare the passwords directly (without hashing)
        if ($admin->password === $data['password']) {
            // Manually log in the user by setting the admin ID in the session
            session(['admin' => $admin]);
            return redirect()->route('admin');
        }
    }

    // If the admin doesn't exist or the password is incorrect, redirect back
    // return redirect()->back()->withInput()->withErrors(['password' => 'Invalid credentials']);
    dd('error');
}



    
}