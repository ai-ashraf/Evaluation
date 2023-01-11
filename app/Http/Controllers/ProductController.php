<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Image;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('backend.products.index', compact('products'));
    }

    public function create()
    {
        $subcategories = Subcategory::pluck('title', 'id')->toArray();
        return view('backend.products.create', compact('subcategories'));
    }

    public function store(Request $request)
    {
        
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'subcategory_id' => $request->subcategory_id,
            'price' => $request->price,   
            'thumbnail' =>  $this->uploadImage($request->file('thumbnail'))                   
        ];

        Product::create($data);

        return redirect()
            ->route('products.index')
            ->withMessage('Created Successfully!');
    }

    public function show(Product $product)
    {
        return view('backend.products.show', compact('product'));
    }
    
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()
            ->route('products.index')
            ->withMessage('Deleted Successfully!');
    }

    public function uploadImage($file){ 
        $fileName = date('y-m-d').'-'.time().'.'.$file->getClientOriginalName();
        $file->move(('storage/products'), $fileName);
        return $fileName;
    }
}
