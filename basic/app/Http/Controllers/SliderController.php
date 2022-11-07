<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Slider;
use Image;

class SliderController extends Controller
{
    public function AllSlider(){
        $sliders = Slider::latest()->paginate(5);
        return view('admin.slider.index', compact('sliders'));
    }

    public function AddSlider(Request $request) {
        $request->validate([
            'title' => 'required|unique:sliders|min:4',
            'description' => 'required|min:10',
            'img' => 'required|mimes:jpg,jpeg,png'
        ], [
            'description.min' => 'Atleast 10 characters required'
        ]);

        // Image import
        $slider_image = $request->file('img'); 

        $name_generate = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        
        Image::make($slider_image)->resize(1920, 1080)->save('img/slider/'.$name_generate);
        // Image::make($slider_image)->save('img/slider/'.$name_generate);

        $last_img = 'img/slider/'.$name_generate;

        // add brand
        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'img' => $last_img,
            'created_at' => Carbon::now(),
        ]);

        return Redirect()->back()->with('success', 'Slider added successfully 🎉');
    }
}
