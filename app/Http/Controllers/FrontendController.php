<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
{
    
    $products = Product::latest()->get();
    $categories = Category::latest()->get();
    $subcategories = Subcategory::latest()->get();
    if (request()->has('productfilter')) {

    if ($request->productfilter == 1) {
        $products = Product::orderBy('category_id', 'DESC');
        return view('welcome', compact('products','categories','subcategories'));
    }

    if ($request->productfilter == 2) {
        
        $products = Product::orderBy('subcategory_id', 'DESC');
        return view('welcome', compact('products','categories','subcategories'));
    }

    if ($request->productfilter == 3) {
        
        $products = Product::orderBy('price', 'asc');
        return view('welcome', compact('products','categories','subcategories'));
    }

    if ($request->productfilter == 4) {
        
        $products = Product::orderBy('price', 'DESC');
        return view('welcome', compact('products','categories','subcategories'));
    }

}
    return view('welcome', compact('products','categories','subcategories'));
}
}
