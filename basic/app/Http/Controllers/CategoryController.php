<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function AllCat() {
        // >> Eloquent Read Data
        $categories = Category::latest()->paginate(5);
        $delCategories = Category::onlyTrashed()->latest()->paginate(3);

        // >> Query Builder Read Data
        // $categories = DB::table('categories')->latest()->paginate(5);

        // >> Query builder join tables
        // $categories = DB::table('categories')
        //         ->join('users', 'categories.user_id',  'users.id')
        //         ->select('categories.*', 'users.name')
        //         ->latest()->paginate(5);


        return view('admin/category/index', compact('categories', 'delCategories'));
    }

    public function AddCat(Request $request) {
        $request->validate([
        'category_name' => 'required|unique:categories,category_name|max:255',
        ]);

        // >> Eloquent ORM (insert)
        // ** Way - 1
        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        // ** Way - 2
        // Category::create([
        //     'category_name' => $request->input('category_name'),
        //     'user_id' => user_id = Auth::user()->id,
        // ]);
        
        // ** Way - 3
        // $category = new Category;
        // $category->category_name = $request->input('category_name');
        // $category->user_id = Auth::user()->id;
        // $category->save();

        // >> Query Builder (insert data)
        // DB::table('categories')->insert([
        //     'category_name' => $request->category_name,
        //     'user_id' => Auth::user()->id,
        //     'created_at' => Carbon::now(),
        // ]);

        return redirect()->back()->with('success', 'New catergory added successfully 🎉');
    }

    // Edit
    public function EditCat($id) {
        // >> Edit, Eloquent ORM
        // $categories = Category::find($id);

        // >> Edit, Query builder
        $categories = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.update', compact('categories'));
    }
    public function UpdateCat(Request $request, $id) {
        // >> Update, Eloquent ORM
        // $update = Category::find($id)->update([
        //     'category_name' => $request->category_name,
        // ]);

        // >> Update, Query builder
        $date = array();
        $data['category_name'] = $request->category_name;
        $data['updated_at'] = Carbon::now();
        DB::table('categories')->where('id', $id)->update($data);


        return redirect()->route('all.category')->with('success', 'Category updated successfully 💥');
    }

    // Soft Delete
    public function SoftDelete($id) {
        Category::find($id)->delete();
        return Redirect()->back()->with('success', 'Category moved to trash successfully 🚮');
    }

    // Restore Category
    public function Restore($id) {
        $data = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success', 'Category restored successfully 💡');
    }

    // Force Delete
    public function ForceDel($id) {
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success', 'Category deleted permanently 💣');
    }
}