<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Closure;
use Illuminate\Http\Request;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() && Auth::user()->role == ('Ban biên tập' || 'Tác giả' || 'Admin') && Auth::user()->status == "1"){
            return $next($request);
        }else { // không có admin đăng nhập
            Auth::logout();
            toastr()->error('Lỗi đăng nhập(chưa đăng nhập | Bị cấm | Không phải admin)');
            return redirect()->route('admin.login.index');
        }

        
        
    }
}