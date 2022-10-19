<?php

namespace App\Http\Middleware;
use Session;
use Closure;
use Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $roleIds = ['SUPERADMIN' => 1, 'SALES ADMIN' => 2, 'SALES' => 3, 'CUSTOMER' => 4];
        $allowedRoleIds = [];
        foreach ($roles as $role)
        {
           if(isset($roleIds[$role]))
           {
               $allowedRoleIds[] = $roleIds[$role];
           }  
        }
        $allowedRoleIds = array_unique($allowedRoleIds); 

        if(Auth::check()) {
          if(in_array(Auth::user()->user_level, $allowedRoleIds)) {
            return $next($request);
          }
        }

        return redirect()->route('auth-login');
    }
}
