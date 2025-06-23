<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('account.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'email'      => ['required', 'email', 'unique:users,email'],
            'phone'      => ['required', 'string', 'max:20'],
            'password'   => ['required', 'string', 'confirmed', 'min:8'],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'password'   => bcrypt($request->password),
            'role'       => 'user', // khi user đăng ký , mặc định role là user
        ]);

        Auth::login($user);

        return redirect($user->role === 'admin' ? '/admin/dashboard' : '/user/dashboard');
    }
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('account.login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->boolean('remember'))) {
            $user = Auth::user();
            if($user->role == 'admin')
            {
                return redirect('/admin/dashboard');
            }
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập khô4ng chính xác.',
        ])->withInput();
    }

    // Đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
