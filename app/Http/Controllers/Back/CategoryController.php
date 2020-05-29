<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      $this->middleware('auth');   
    }


    public function index()
    {
        $categories = Category::latest()->get();
        return view('back.category.category',compact('categories'));
    }

 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $category = new Category();
        $category->category = $request->category;
        $category->slug = Str::slug($request->category);
        $category->save();
        return response()->json(['success' => true]);
    }

    public function fetch(Request $request)
    {
       
        $category = Category::findOrFail($request->id);
        $category->category = $request->category;
        $category->slug = Str::slug($request->category);
        $category->save();

        return response()->json(['success' => true]);
    }
    public function fetchDelete(Request $request)
    {
       
        $category = Category::findOrFail($request->id);
        $category->delete();

        return response()->json(['success' => true]);
    }

    
}
