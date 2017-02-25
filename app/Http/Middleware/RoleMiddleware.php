<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    protected $hierrarchy=[
        'admin' => 2,
        'user' => 1
    ];


    public function handle($request, Closure $next, $rol)
    {

        $user = auth()->user();

        if ($this->hierrarchy[$user->rol] < $this->hierrarchy[$rol]){

            redirect("/welcome");

        }

        return $next($request);
    }
}
