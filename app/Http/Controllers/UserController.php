<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Blog;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::where('admin', false)->get();

        $user = Auth::user();

        return view('users', ['users'=>$users, 'user'=>$user]);
    }

    public function show($id)
    {
        $user = Auth::user();

        $query = DB::table('blogs')->join('users', 'user_id', '=', 'users.id')->select('blogs.*', 'users.name as author')->where('user_id', $id);
        if($user->id != $id) $query->where('approved', true);

        $blogs = $query->get();

        return view('home', ['blogs'=>$blogs, 'user'=>$user]);
    }
}