<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCat()
    {
        return view('admin.category.index');
    }

    public function addCat(Request $request)
    {
        $validateddata = $request->validate([
            'category_name' => 'required|unique:categories|max:255'
        ],
        [
            'category_name.required' => 'Please input Category name',
            'category_name.max' => 'Category less then 255 chars'
        ]);
    }
}
