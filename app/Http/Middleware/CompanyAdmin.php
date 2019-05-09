<?php

namespace App\Http\Middleware;

use Closure;
use App\Company;
use Auth;

class CompanyAdmin
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
        $id=$request->route('id');
        $companyAdmin=Company::find($id)->admin_id;
        $user=Auth::user()->id;
        if($companyAdmin!=$user){
            dump("привет мир");
            return redirect()->route('error');
        }
       return $next($request);
    }
}
