<?php namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\RedirectResponse;
class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->vrsta == "admin"){
            return $next($request);
        }

        return redirect('ispiti/rokovi');
    }
}