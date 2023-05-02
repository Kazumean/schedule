<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(3);

        $auth_user = Auth::user()->name;

        return view('blog_index', compact('blogs', 'auth_user'))
                ->with('i', (request()->input('page', 1) - 1) * 3);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
        ]);

        // ディレクトリ名
        $dir = 'images';

        // imagesディレクトリに画像を保存
        $path = $request->file('image')->store('/public/' . $dir);

        $blog = new Blog;
        $blog->title = $request->input(['title']);
        $blog->content = $request->input(['content']);
        $blog->user_id = Auth::user()->id;
        $blog->image = $path;
        $blog->save();

        return redirect()->route('blogs.index')->with('success', '登録しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        // $blogs = Blog::all();

        if ($blog->user_id != Auth::user()->id) {
            exit();
        }

        return view('edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        if ($request->file('image')) {
            $dir = 'images';
            $path = request()->file('image')->store('/public/'. $dir);
        }

        $blog->title = $request->input(['title']);
        $blog->content = $request->input(['content']);
        $blog->user_id = Auth::user()->id;
        if ($request->file('image')) {
            $blog->image = $path;
        }
        $blog->save();
        $page = request()->input('page');

        return redirect()->route('blogs.index', ['page' => $page])->with('success', '更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        $page = request()->input('page');
        
        return redirect()->route('blogs.index', ['page' => $page])->with('success', $blog->title . 'を削除しました');
    }
}
