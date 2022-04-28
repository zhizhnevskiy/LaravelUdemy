<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\MultiPicture;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use Auth;

class BrandController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function allBrand()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brands'));
    }

    public function addBrand(Request $request)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:jpg,jpeg,png',
        ],
            [
                'brand_name.required' => 'Please input Brand name',
                'brand_name.min' => 'Brand should be longer then 4 char',
            ]);

        $brandImage = $request->file('brand_image');

        // Add image without package
//        $nameGenerate = hexdec(uniqid());
//        $imageExtansion = strtolower($brandImage->getClientOriginalExtension());
//        $imageName = $nameGenerate . "." . $imageExtansion;
//        $upLocation = 'img/brand/';
//        $lastImage = $upLocation . $imageName;
//        $brandImage->move($upLocation, $lastImage);

        // Add image with package Intervention
        $nameGenerate = hexdec(uniqid()) . '.' . strtolower($brandImage->getClientOriginalExtension());
        Image::make($brandImage)->save('img/brand/' . $nameGenerate);
        $lastImage = 'img/brand/' . $nameGenerate;

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $lastImage,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Brand Inserted Successfully',
            'alert-type' => 'success'
        ];

        return Redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $brands = Brand::find($id);
        return view('admin.brand.edit', compact('brands'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|min:4',
        ],
            [
                'brand_name.required' => 'Please input Brand name',
                'brand_name.min' => 'Brand should be longer then 4 char',
            ]);


        if ($request->file('brand_image')) {
            $old_image = $request->old_image;
            unlink($old_image);

            $brandImage = $request->file('brand_image');
            $nameGenerate = hexdec(uniqid());
            $imageExtansion = strtolower($brandImage->getClientOriginalExtension());
            $imageName = $nameGenerate . "." . $imageExtansion;
            $upLocation = 'img/brand/';
            $lastImage = $upLocation . $imageName;
            $brandImage->move($upLocation, $lastImage);

            Brand::find($id)
                ->update([
                    'brand_name' => $request->brand_name,
                    'brand_image' => $lastImage,
                    'created_at' => Carbon::now(),
                ]);
            $notification = [
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'info'
            ];
        } else {
            Brand::find($id)
                ->update([
                    'brand_name' => $request->brand_name,
                    'created_at' => Carbon::now(),
                ]);
            $notification = [
                'message' => 'Only Brand name Updated Successfully',
                'alert-type' => 'warning'
            ];
        }

        return Redirect()->back()->with($notification);
    }

    public function delete($id)
    {
        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);

        Brand::find($id)->delete();

        $notification = [
            'message' => 'Brand deleted Successfully',
            'alert-type' => 'error'
        ];

        return Redirect()->back()->with($notification);
    }

    public function multiImage()
    {
        $images = MultiPicture::all();

        return view('admin.multi.index', compact('images'));
    }

    public function storeImages(Request $request)
    {
        $images = $request->file('image');

        foreach ($images as $image) {
            // Add image with package Intervention
            $nameGenerate = hexdec(uniqid()) . '.' . strtolower($image->getClientOriginalExtension());
            Image::make($image)->resize(200, 200)->save('img/multi/' . $nameGenerate);
            $lastImage = 'img/multi/' . $nameGenerate;

            MultiPicture::insert([
                'image' => $lastImage,
                'created_at' => Carbon::now(),
            ]);
        }

        return Redirect()->back()->with('success', 'Brand Inserted Successfully');

    }

    public function logout(){
        Auth::logout();
        return Redirect()->route('login')->with('success', 'User Logout');
    }
}
