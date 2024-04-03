<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::Paginate(10);
        return view('admin.category.index' , compact('categories'));
    }

    public function create()
    {
        $parentCategories = Category::all();
        return view('admin.category.create' , compact('parentCategories' ));
    }

    public function store(CategoryRequest $request)
    {
        Category::create([
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('admin.category.index');
    }

    public function show(Category $category)
    {
        return view('admin.category.show' , compact('category'));
    }

    public function edit(Category $category)
    {
        $parentCategories = Category::all();
        return view('admin.category.edit' , compact('parentCategories' ,'category'));
    }

    public function update(CategoryRequest $request , Category $category)
    {
        $category->update([
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('admin.category.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}
