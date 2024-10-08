<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories',
        ]);

        $category = Category::create($request->all());
        return response()->json($category, 201);
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'category_name' => 'required|unique:categories,category_name,'.$id,
        ]);

        $category->update($request->all());
        return response()->json($category);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);
    
        $category = Category::where('category_name', $request->category_name)->firstOrFail();
        $category->delete();
    
        return response()->json(null, 204);
    }
}