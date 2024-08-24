<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class loginController extends Controller
{
    public function index(){
        return view("admin.auth.login");
    }

    public function login(LoginRequest $request) { 
        // validate dữ liệu
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($validated)) { 
        
            if (Auth::user()->role == ('Ban biên tập' || 'Tác giả' || 'Admin')) {
                toastr()->success('Đăng nhập thành công!'); 
                return redirect()->route('admin.dashboard'); 
            } else {
                Auth::logout(); 
                toastr()->error('Không có quyền truy cập.'); 
                return redirect()->back(); 
            }
        }
    
        toastr()->error('Sai tên đăng nhập hoặc mật khẩu'); 
        return redirect()->back(); 
    }
    
    public function doLogout(){ // get[/admin/doLogout]
        Auth::logout(); // đăng xuất
        toastr()->success('Đăng xuất thành công'); // thông báo
        return redirect()-> route('admin.login.index'); //chuyển hướng ra trang login
    }
    
}