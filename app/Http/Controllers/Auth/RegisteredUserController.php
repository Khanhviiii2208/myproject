<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'min:2'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ],[
            'name.required' => 'Chưa nhập tên',
            'name.min'=> "Độ dài lớn hơn 1 kí tự",
            'email.required'=>"Chưa nhập email",
            'email.lowercase'=>"Email không được viết hoa",
            'email.email'=>"Email không đúng định dạng",
            'email.max'=>"Email quá dài",
            'email.unique'=>"Email đã tồn tại",
            'password.required'=>"Chưa nhập mật khẩu",
            'password.confirmed'=>"Mật khẩu không trùng khớp",
            'password.confirmed.required'=>"Mật khẩu không trùng khớp",
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // Auth::login($user);

        return redirect(RouteServiceProvider::DANGNHAP);
    }
}