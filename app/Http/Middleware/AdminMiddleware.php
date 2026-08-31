<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    if (auth()->check() && auth()->user()->is_admin) {
        return $next($request);
    }

    // Jika bukan admin, tendang keluar atau kembalikan error 403
    abort(403, 'Anda tidak memiliki akses ke halaman ini.');
}
}
