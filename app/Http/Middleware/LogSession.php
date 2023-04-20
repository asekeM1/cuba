<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Session;
class LogSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user) {
            $session = new Session;
            $session->user_id = $user->id;
            $session->ip_address = $request->ip();
            $session->user_agent = $request->header('User-Agent');
            $session->payload = base64_encode(serialize($request->session()->all()));
            $session->save();
        }

        return $next($request);
    }
}
