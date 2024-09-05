<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['products'] = Product::all();
        return view('home', $data);
    }
    public function viewProduct($category,$slug) {
        $data['product'] = Product::where('slug',$slug)->first();
        return view("viewProduct",$data);
    }
    public function filter($slug)
    {
        $data['category'] =Category::where('cat_slug',$slug)->first();
        return view('filter',$data);
    }
}
