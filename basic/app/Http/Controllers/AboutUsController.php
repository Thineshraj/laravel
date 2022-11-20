<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    public function AllAbout () {
        $aboutUs = AboutUs::latest()->paginate(5);
        return view('admin.aboutUs.index', compact('aboutUs'));
    }

    public function AddAbout() {
        return view('admin.aboutUs.addAbout');
    }

    public function StoreAbout (Request $request) {
        $request->validate([
            'title' => 'required',
            'short_desc' => 'required',
            'long_desc' => 'required',
        ]);

        AboutUs::insert([
            'title' => $request->title,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'created_at' => Carbon::now(),
        ]);

        return Redirect()->route('all.aboutUs')->with('success', 'About added successfully');
    }

    public function EditAbout ($id) {
        $about = AboutUs::find($id);

        return view('admin.aboutUs.update', compact('about'));
    }

    public function UpdateAbout (Request $request, $id) {
        $update = AboutUs::find($id)->update([
            'title' => $request->title,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
        ]);

        return Redirect()->route('all.aboutUs')->with('success', 'About updated successfully');
    }

    public function DeleteAbout ($id) {
        $about = AboutUs::find($id);
        $about->delete();

        return Redirect()->back()->with('success', 'About deleted successfully');
    }
}
