<?php

namespace App\Http\Middleware;

use Closure;


class IsOwner
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
        $id = (int)$request->route('id');
        if ($id == \Auth::user()->id) {
            return $next($request);
        }
        $request->session()->flash('danger','You can see and edit only your profile!');
          return redirect('/');
    }
}
