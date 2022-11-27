<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function admin_index()
    {
        return view('/admin/login/admin_index');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        $guard = $request->guard;

        if (Auth::guard('students')->attempt($credentials)) {
            // ログインしたらトップページにリダイレクト
            return redirect()->route('index')->with([
                'login_msg' => 'ログインしました。',
            ]);
        }

        return back()->withErrors([
            'login' => ['ログインに失敗しました'],
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // ログアウトしたらログインフォームにリダイレクト
        return redirect('login.index')->with([
            'auth' => ['ログアウトしました'],
        ]);
    }
}