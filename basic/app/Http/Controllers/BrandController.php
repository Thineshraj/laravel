<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;

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
        $brand_image = $request->file('brand_img'); // Column name of the Brand image

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
        // $brands = Brand::find($id);
        // return view('admin/brand/update', compact('brands'));

        // >> Edit, Query builder
        $brands = DB::table('brands')->where('id', $id)->first();
        return view('admin.brand.update', compact('brands'));
    }

    public function BrandUpdate(Request $request, $id) {
        // Validation
        $request->validate([
            'brand_name' => 'min:4',
        ], [
            'brand_name.min' => 'At least 4 characters in brand name',
        ]);

        // Get the existing image
        $old_img = $request->old_img;

        // Image imported
        $brand_image = $request->file('brand_img'); // Column name of the Brand image

        // If no image has updates, then use the existing image
        if($brand_image) {
            $name_generate = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_generate.'.'.$img_ext;
            $upload_location = 'img/brand/';
            $last_img = $upload_location.$img_name;
            $brand_image->move($upload_location, $img_name);

            // Unlink the existing image
            unlink($old_img);

            // add brand
            Brand::find($id)->update([
            'brand_name' => $request->brand_name,
            'brand_img' => $last_img,
            'created_at' => Carbon::now(),
            ]);
        }else {
            // use the existing image
            Brand::find($id)->update([
            'brand_name' => $request->brand_name,
            'brand_img' => $old_img,
            'created_at' => Carbon::now(),
            ]);
        }

        return redirect()->route('all.brand')->with('success', 'Brand updated successfully 🎉');
    }

    public function BrandDelete($id) {
        $brand = Brand::find($id);

        // Delete the DB row
        $brand->delete();
        // Delete the image from the DB
        $old_img = $brand->brand_img;
        unlink($old_img);

        return redirect()->back()->with('success', 'Brand deleted Successfully 💥');
    }
}
