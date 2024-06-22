<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Karyawan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->role != 'karyawan'){//jika bukan admin(maka user) hrs ke dashboard user lainnya
            // return redirect('dashboard');
            if(Auth::user()->role == 'pasien'){
                return redirect('/dashboard');
            }else if(Auth::user()->role == 'dokter'){
                return redirect('/dokter/dashboard');
            }else if(Auth::user()->role == 'admin'){
                return redirect('/admin/dashboard');
            }
        }
        return $next($request);
    }
}
