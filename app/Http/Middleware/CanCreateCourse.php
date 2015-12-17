<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class CanCreateCourse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    protected $auth;

    public function __construct(Guard $auth )
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {

        if ($this->auth->check()) {

            $type_id = $this->auth->user()->type_id;

            if( $type_id != 1 && $type_id != 2 ){
                return 'can not access';
            }
            
        }

        return $next($request);
    }

}
