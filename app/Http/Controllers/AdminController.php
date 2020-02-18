<?php

namespace App\Http\Controllers;

use App\Admin;
use Carbon\Carbon;
use Exception;
use App\Billing;
use App\Reply;
use Facade\Ignition\Middleware\AddLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function adminPanel(){

        return redirect('/admin-login');

    }
    public function showRegistreForm(){

        return view('admin.log-reg.admin-reg');

    }
    public function proccessAdminRegister(Request $request){

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);

        $admin_insert = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'created_at' => Carbon::now()
        ]);

        return back()->with('success', 'Admin Created Successfully');

    }

    public function showAdminForm(){

        return view('admin.log-reg.admin-login');

    }

    public function proccessAdminLogin(Request $request){

        $validatedData = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        $email = $request->input('email');
        $password = $request->input('password');


        $user = Admin::where('email', '=', $email)->first();

        if (!$user) {
            return back()->with('mail_error', 'Email not metch');
        }

        if (!Hash::check($password, $user->password)) {
            return back()->with('Pass_error', 'Password not metch');;
        }

        $allOrder = Billing::orderBy('id', 'desc')->get();
        session(['role' => $user->role]);
        session(['admin' => $user]);

        return view('admin.deshboard', compact('allOrder'));

    }

    public function adminlogout(Request $request){

        $request->session()->flush();
        return redirect('/');
    }
}


