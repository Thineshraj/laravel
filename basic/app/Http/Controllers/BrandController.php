<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Brand;

class BrandController extends Controller
{
    public function AllBrand() {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brands'));
    }

    public function BrandAdd(Request $request) {
        // Validation
        $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_img' => 'required|mimes:jpg,jpeg,png',
        ], [
            'brand_name.required' => 'Brand name is required',
            'brand_name.min' => 'At least 4 characters in brand name',
        ]);


        // Image import
        $brand_image = $request->file('brand_img');

        $name_generate = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_generate.'.'.$img_ext;
        $upload_location = 'img/brand/';
        $last_img = $upload_location.$img_name;
        $brand_image->move($upload_location, $img_name);

        // add brand
        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_img' => $last_img,
            'created_at' => Carbon::now(),
        ]);

        return Redirect()->back()->with('success', 'Brand added successfully 🎉');
    }

    public function BrandEdit($id) {
        $brands = Brand::find($id);
        return view('admin.brand.update', compact('brands'));
    }
}
