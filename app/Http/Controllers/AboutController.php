<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function homeAbout(){
        $abouts = About::latest()->paginate(5);
        return view('admin.about.index', compact('abouts'));
    }

    public function addAbout(){
        return view('admin.about.create');
    }

    public function storeAbout(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|unique:abouts|min:4',
            'short_description' => 'required|unique:abouts|min:4',
            'long_description' => 'required|unique:abouts|min:4',
        ]);

        About::insert([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'created_at' => Carbon::now(),
        ]);

        return Redirect()->route('home.about')->with('success', 'About Inserted Successfully');
    }
}
