<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sclass;

class SclassController extends Controller
{
    public function AllClasses () {
        $sclasses = Sclass::latest()->get();

        return response()->json($sclasses);
    }

    public function StoreClass (Request $request) {
        $request->validate([
            "class_name" => "required|unique:sclasses"
        ]);

        Sclass::insert([
            "class_name" => $request->class_name,
        ]);

        return response('Class added successfully.');
    }

    public function EditClass($id) {
        $class = Sclass::findorFail($id);

        return response()->json($class);
    }

    public function UpdateClass (Request $request, $id) {
        Sclass::findorFail($id)->update([
            "class_name" => $request->class_name
        ]);

        return response("Class name updated successfully");
    }

    public function DeleteClass ($id) {
        Sclass::findorFail($id)->delete();

        return response("Class name deleted successfully.");
    }
}
