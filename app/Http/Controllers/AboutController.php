<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\MultiPicture;

class AboutController extends Controller
{
    public function homeAbout()
    {
        $abouts = About::latest()->paginate(5);
        return view('admin.about.index', compact('abouts'));
    }

    public function addAbout()
    {
        return view('admin.about.create');
    }

    public function storeAbout(Request $request)
    {
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

    public function editAbout($id)
    {
        $about = About::find($id);
        return view('admin.about.edit', compact('about'));
    }

    public function updateAbout(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:abouts|min:4',
            'short_description' => 'required|unique:abouts|min:4',
            'long_description' => 'required|unique:abouts|min:4',
        ]);
        About::find($id)->update([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'updated_at' => Carbon::now(),
            ]);

        return Redirect()->route('home.about')->with('success', 'About Updated Successfully');
    }

    public function deleteAbout($id){
        About::find($id)->delete();
        return Redirect()->back()->with('success', 'About deleted Successfully');
    }

    public function portfolio(){
        $portfolio = MultiPicture::all();
        return view('pages.portfolio', compact('portfolio'));
    }
}
