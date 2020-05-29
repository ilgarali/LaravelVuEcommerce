<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');   
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('back.post.post',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('back.post.addpost',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->category_id = $request->category;
        $post->featured = $request->featured;
        $post->price = $request->price;
        $post->content = $request->content;
        if ($request->hasFile('img')) {
            $imgName = Str::slug($request->title)."." . $request->img->getClientOriginalExtension();
            $request->img->move(public_path('images/'),$imgName);
            $post->img = "images/".$imgName;
        }

        $post->save();

        return redirect()->route('admin.post.index')->with('success','You have added post successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::get();
        return view('back.post.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->category_id = $request->category;
        $post->featured = $request->featured;
        $post->price = $request->price;
        $post->content = $request->content;
        if ($request->hasFile('img')) {
            $imgName = Str::slug($request->title)."." . $request->img->getClientOriginalExtension();
            $request->img->move(public_path('images/'),$imgName);
            $post->img = "images/".$imgName;
        }

        $post->save();

        return redirect()->route('admin.post.index')->with('success','You have updated post successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if (File::exists($post->img)) {
            File::delete(public_path('images/'.$post->img));
        }
        $post->delete();
        return redirect()->route('admin.post.index')->with('success','You have deleted post successfully');
    }
}
