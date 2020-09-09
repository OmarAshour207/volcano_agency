<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ar_name'   => 'required|string',
            'en_name'   => 'required|string',
            'icon'      => 'sometimes|nullable|string'
        ]);

        Category::create($data);
        session()->flash('success', trans('admin.added_successfully'));
        return redirect()->route('categories.index');

    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'ar_name'   => 'required|string',
            'en_name'   => 'required|string',
            'icon'      => 'sometimes|nullable|string'
        ]);

        $category->update($data);
        session()->flash('success', trans('admin.updated_successfully'));
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success', trans('admin.deleted_successfully'));
        return redirect()->route('categories.index');
    }

}
