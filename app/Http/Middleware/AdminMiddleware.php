<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ambil admin dari session
        $admin = Session::get('admin');

        if ($admin) {
            // Jika admin ada, lakukan sesuai kebutuhan
            // Contoh: set objek admin di request untuk digunakan di controller
            // $request->admin = $admin;
            return $next($request);
        }

        // Jika tidak ada admin dalam session, lakukan sesuai kebutuhan
        // Contoh: redirect ke halaman login
        return redirect()->route('login');
    }
}
