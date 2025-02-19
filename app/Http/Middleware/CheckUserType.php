<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string $type
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $type)
    {
        $userTypes = explode('|', $type); // Corrected delimiter
        if (!in_array(auth()->user()->user_type, $userTypes)) {
            return redirect('/home'); // Redirect if user type does not match
        }
        return $next($request);
    }
}