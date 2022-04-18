<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function allCat()
    {
////////////////////////////// Eloquent ORM
        $categories = Category::latest()->paginate(5);

////////////////////////////// Query Builder
//        $categories = DB::table('categories')->latest()->paginate(5);
//
//        $categories = DB::table('categories')
//            ->join('users', 'users.id', '=', 'categories.user_id')
//            ->select(
//                'categories.*',
//                'users.name'
//            )->latest()->paginate(5);

        return view('admin.category.index', compact('categories'));
    }

    public function addCat(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:255'
        ],
            [
                'category_name.required' => 'Please input Category name',
                'category_name.max' => 'Category name more then 255 chars',
            ]);

////////////////////////////// Eloquent ORM
        // Variant №1
        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        // Variant №2
//        $category = new Category();
//        $category->category_name = $request->category_name;
//        $category->user_id = Auth::user()->id;
//        $category->save();

////////////////////////////// Query Builder
//        DB::table('categories')->insert([
//            'category_name' => $request->category_name,
//            'user_id' => Auth::user()->id,
//        ]);

        return Redirect()->back()->with('success', 'Category Inserted Successful');
    }

    public function edit($id)
    {
////////////////////////////// Eloquent ORM
//        $category = Category::find($id);

////////////////////////////// Query Builder
        $category = DB::table('categories')
            ->where('id', '=', $id)
            ->first();

        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
////////////////////////////// Eloquent ORM
//        $update = Category::find($id)
//            ->update([
//                'category_name' => $request->category_name,
//                'user_id' => Auth::user()->id
//            ]);

////////////////////////////// Query Builder
        $update = DB::table('categories')
            ->where('id', '=', $id)
            ->update([
                'category_name' => $request->category_name,
                'user_id' => Auth::user()->id
            ]);

        return Redirect()->route('all.category')->with('success', 'Category Updated Successful');
    }
}
