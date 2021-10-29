<?php

namespace App\Http\Middleware;
use Closure;
use Session;

class customAuth
{
/**
* Handle an incoming request.
*
* @param \Illuminate\Http\Request $request
* @param \Closure $next
* @return mixed
*/
public function handle($request, Closure $next)
{
//$path = $request->path();
//if($path=="signin" && Session::get('students')){
//return redirect('/');
//}
//else if(($path!="signin" && !Session::get('students')) && ($path!="register" && !Session::get('students'))){
//return redirect('signin');
//}
//return $next($request);
}
}