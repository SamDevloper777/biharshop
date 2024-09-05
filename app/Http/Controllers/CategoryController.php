<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $mainCategories = Category::where('parent_id',null)->get(); 
        return view('admin.manageCategories')
        ->with('categories', $categories)
        ->with('mainCategories',$mainCategories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //no need
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cat_title' =>'required|string|max:255',
            'cat_description'=> 'required|max:255',
            'parent_id' => 'nullable|integer',
        ]);
        $cat=new Category();
        $cat->cat_title= $request->cat_title;
        $cat->cat_slug = Str::slug($request->cat_title);
        $cat->cat_description =$request->cat_description;
        $cat->parent_id= $request->parent_id;
        $cat->save();
        return redirect()->route('category.index')->with('success','category created sucessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        //
        $request->validate([
            'cat_title'=>'required | max:255',
            'cat_description'=>'required | max:255',
        ]);

        $cat = $category;
        $cat->cat_title=$request->cat_title;
        $cat->cat_slug = Str::slug($request->cat_title);
        $cat->cat_description=$request->cat_description;
        $cat->parent_id = $request->parent_id;
        $cat->save();

        return redirect()->route('category.index')->with('success','category Updated sucessfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        if($category->children()->exists())
        {
            return redirect()->route('category.index')->with('error','This category has subcategories.Please delete them first.');
        }

        $category->delete();
        return redirect()->route('category.index')->with('success','Category deleted successfully');
    }
}
