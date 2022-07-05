<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('welcome', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|min:3',
            'price' => "required"
        ]);
        $input = $request->all();

        Product::create($input);
        session()->flash('message', $input['title'] . ' Succesfully Saved');
        return redirect('/');
    }

    public function edit($product)
    {
        $categories = Category::all();
        $product = Product::find($product);
        return view('product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $product)
    {
        $input = $request->all();

        $product = Product::find($product);
        $product->title = $input['title'];
        $product->price = $input['price'];
        $product->category_id = $input['category_id'];

        $product->save();
        session()->flash('message', $input['title'] . ' Succesfully Updated');

        return redirect('/');
    }

    public function delete($product)
    {

        Product::find($product)->delete();
        session()->flash('message', ' Product Succesfully Deleted');
        return redirect()->back();
    }

    public function search()
    {

        $search_text = $_GET['query'];
        $products = Product::where('title', 'LIKE', '%' . $search_text . '%')->with('category')->get();

        return view('product.search', compact('products'));
    }
}
