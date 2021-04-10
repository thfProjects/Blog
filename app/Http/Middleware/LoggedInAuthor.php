<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Blog;

use Illuminate\Support\Facades\Auth;

class LoggedInAuthor
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
        $user_id = Auth::id();
        $author_id = Blog::findOrFail($request->route('id'))->user_id;
        
        if($user_id != $author_id)
        {
            return redirect('home');
        }

        return $next($request);
    }
}
