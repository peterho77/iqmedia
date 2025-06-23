<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Kiểm tra đã đăng nhập và có role admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }     
        
        // Nếu chưa đăng nhập    
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Vui lòng đăng nhập!');
        }  
        
        // Nếu không phải admin
        return redirect('/user/dashboard')->with('error', 'Bạn không có quyền truy cập!');
    }
}
