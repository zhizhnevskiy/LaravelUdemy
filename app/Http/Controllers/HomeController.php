<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    public function homeSlider(){
        $sliders = Slider::latest()->paginate(5);
        return view('admin.slider.index', compact('sliders'));
    }

    public function addSlider(){
        return view('admin.slider.create');
    }

    public function storeSlider(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|unique:sliders|min:4',
            'description' => 'required|unique:sliders|min:4',
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);

        $sliderImage = $request->file('image');

        // Add image with package Intervention
        $nameGenerate = hexdec(uniqid()) . '.' . strtolower($sliderImage->getClientOriginalExtension());
        Image::make($sliderImage)->resize(1920, 1088)->save('img/slider/' . $nameGenerate);
        $lastImage = 'img/slider/' . $nameGenerate;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $lastImage,
            'created_at' => Carbon::now(),
        ]);

        return Redirect()->route('home.slider')->with('success', 'Slider Inserted Successfully');
    }

    public function delete($id)
    {
        $image = Slider::find($id);
        $old_image = $image->image;
        unlink($old_image);

        Slider::find($id)->delete();
        return Redirect()->route('home.slider')->with('success', 'Slider Deleted Successfully');
    }
}
