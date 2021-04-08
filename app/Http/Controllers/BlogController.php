<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $unapproved_only = request('unapproved_only', false);

        $user = Auth::user();

        $query = DB::table('blogs')->join('users', 'user_id', '=', 'users.id')->select('blogs.*', 'users.name as author');

        if(!$user->admin) $query->where('approved', true);
        else if($unapproved_only) $query->where('approved', false);

        $blogs = $query->get();

        return view('home', ['blogs'=> $blogs, 'user'=>$user]);
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        $author = User::findOrFail($blog->user_id)->name;
        $user = Auth::user();

        //$blog->text = str_replace('', '', $blog->text);

        return view('show', ['blog'=>$blog, 'author'=>$author, 'user'=>$user]);    
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $blog = new Blog();

        $image = $request->file('image');
        $destinationPath = storage_path('app/public/images');
        $fileName = time() . '.' . $image->clientExtension();
        $image->move($destinationPath, $fileName);

        $blog->title = $request->input('title');
        $blog->text = $request->input('text');
        $blog->user_id = Auth::id(); 
        $blog->image = $fileName;      

        $blog->save();

        return redirect('/home');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        return view('edit', ['blog'=>$blog]);
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $blog->title = $request->input('title');
        $blog->text = $request->input('text');

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $destinationPath = storage_path('app/public/images');
            $fileName = time() . '.' . $image->clientExtension();
            $image->move($destinationPath, $fileName);
            Storage::delete('/public/images/'.$blog->image);
            $blog->image = $fileName;
        }       

        $blog->save();

        return redirect('/blogs/'.$id);
    }

    public function approve($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->approved = true;
        $blog->save();

        return redirect('/blogs/'.$id);
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        Storage::delete('/public/images/'.$blog->image);

        return redirect('/home');
    }
}
