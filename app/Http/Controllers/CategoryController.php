<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
        ]);
        $input = $request->all();

        Category::create($input);
        session()->flash('message', $input['name'] . ' Succesfully Saved');
        return redirect('/category');
    }
}
