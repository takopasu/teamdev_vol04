<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function mentor_calendar()
    {
        return view('events/mentor_calendar');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['userid', 'password']);

        if (Auth::guard('mentors')->attempt($credentials)) {
            // ログインしたら管理画面トップにリダイレクト
            return redirect()->route('admin.index')->with([
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
        return redirect()->route('admin.login.index')->with([
            'logout_msg' => 'ログアウトしました',
        ]);
    }
}
?>
