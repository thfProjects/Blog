<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index()
    {
        $unapproved_only = request('unapproved_only', false);

        $user = $this->getUserOrGuest();

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
        $user = $this->getUserOrGuest();

        return view('show', ['blog'=>$blog, 'author'=>$author, 'user'=>$user]);    
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        Validator::make(
            $request->all(),
            [
            'title' => ['required', 'max:255'],
            'image' => ['required', 'file', 'image', 'mimetypes:image/jpeg,image/png,image/gif', 'max:8192'],
            'text' => ['max:15000']           
            ],
            [
            'image.max' => 'Image size must be less than 8mb'
            ]
        )->validate();

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

        if(old('text') != null) $blog->text = old('text');

        return view('edit', ['blog'=>$blog]);
    }

    public function update(Request $request, $id)
    {
        Validator::make(
            $request->all(),
            [
            'image' => ['file', 'image', 'mimetypes:image/jpeg,image/png,image/gif', 'max:8192'],
            'text' => ['max:15000']           
            ],
            [
            'image.max' => 'Image size must be less than 8mb'
            ]
        )->validate();

        $blog = Blog::findOrFail($id);
        
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

    private function getUserOrGuest()
    {
        if(Auth::check()) $user = Auth::user();
        else 
        {
            $user = new User();
            $user->id = 0;
            $user->name = 'guest';
            $user->admin = false;
        }

        return $user;
    }
}
