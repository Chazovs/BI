<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class UserCompanies
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
        
    $userID  = Auth::user()->id;
    $userModel = User::find($userID);
    $id=$request->route('id');
    $postsHasMany = $userModel->companies();
    $companies = $postsHasMany->where('id','like',$id)->count();

if ($companies==0) {
            return redirect()->route('companyProfile', ['id' => $id]);
        }
    
        return $next($request);
    }
}
