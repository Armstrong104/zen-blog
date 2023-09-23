<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | max:100',
            'icon' => 'image',
        ], [
            'name.required' => 'please give a Name'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->desc = $request->desc;
        $icon = $request->icon;
        if ($icon) {
            $iconName = 'category-icon' . time() . rand() . '.' . $icon->extension();
            $directory = 'category-icons/';
            $icon->move($directory, $iconName);
            $category->icon = $directory . $iconName;
        }
        $category->save();

        return back()->with('message', 'Category Added Successfully!');
    }

    public function edit($id)
    {
        return view('backend.category.edit', [
            'category' => Category::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required | max:100',
            'icon' => 'image',
        ], [
            'name.required' => 'please give a Name'
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->desc = $request->desc;
        $icon = $request->icon;
        if ($icon) {
            if (file_exists($category->icon)) {
                unlink($category->icon);
            }
            $iconName = 'category-icon' . time() . rand() . '.' . $icon->extension();
            $directory = 'category-icons/';
            $icon->move($directory, $iconName);
            $category->icon = $directory . $iconName;
        }
        $category->save();

        return to_route('admin.category.manage')->with('message', 'Category Updated Successfully!');
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if (file_exists($category->icon)) {
            unlink($category->icon);
        }


        $category->delete();
        return back()->with('message', 'Product Deleted Successfully!');
    }
}
