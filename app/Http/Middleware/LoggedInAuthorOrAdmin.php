<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Blog;

class LoggedInAuthorOrAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::User();
        $author_id = Blog::findOrFail($request->route('id'))->user_id;
        
        if($user->id == $author_id || $user->admin)
        {
            return $next($request);
        }

        return redirect('home');
    }
}
