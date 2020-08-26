<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
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

        if($request->param ==50){
        return $next($request);    #kaml next middleware wala exectue el view law mafish 

        }
        else {
            abort(404);
        }

      
        // return redirect('http://www.google.com');      #Testing Middleware 
        // return $next($request);
    }
}
