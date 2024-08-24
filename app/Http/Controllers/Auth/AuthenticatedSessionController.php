<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }


    public function store(Request $request)
{
    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
        $request->session()->regenerate();

        // Lấy người dùng hiện tại
        $user = Auth::user();
        
        // Chuyển hướng dựa trên vai trò của người dùng
        if ($user->role === 'Admin' || $user->role === 'Ban biên tập' || $user->role === 'Tác giả') {
            return redirect()->intended(RouteServiceProvider::DASHBOARD);
        } else {
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }

    return back()->withErrors([
        'email' => 'Thông tin đăng nhập được cung cấp không khớp với hồ sơ của chúng tôi.',
    ]);
}

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
