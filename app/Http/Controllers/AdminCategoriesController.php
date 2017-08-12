<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\AdminCreateCategoryRequest;
use App\Http\Requests\AdminEditCategoryRequest;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{

    public function index()
    {
        //

        $categories = Category::all();
        //return $categories;
        return view('admin.categories.index', compact('categories'));
    }

    public function store(AdminCreateCategoryRequest $request)
    {
        //
        Category::create($request->all());

        session()->flash('category_created', 'Category has been created');

        return redirect('/admin/categories');
    }

    public function edit($id)
    {
        //
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(AdminEditCategoryRequest $request, $id)
    {
        //
        Category::findOrFail($id)->update($request->all());

        session()->flash('category_updated', 'Category has been updated');

        return redirect('/admin/categories');

    }

    public function destroy($id)
    {
        //
        Category::findOrFail($id)->delete();

        session()->flash('category_deleted', 'Category has been deleted');

        return redirect('/admin/categories');
    }
}