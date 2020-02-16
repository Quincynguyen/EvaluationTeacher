<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
class StudentLoginController extends Controller
{
    /**
     * Show the application’s login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('student.login');
    }
    public function login(Request $request)
    {
        if (Auth::attempt($request->only('username','password'))) {
            return redirect()->route('home');
        }
        else{
            return redirect()->back()->with('error','Username hoặc mật khẩu không đúng');
        }
    }
    public function getLogout() {
        Auth::logout();
        return redirect('/login');
    }
}
