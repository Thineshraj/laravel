<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use Carbon\Carbon;

class StudentController extends Controller
{
    public function StoreStudent (Request $request) {
        $request->validate([
            "name" => "required",
            "email" => "required",
        ]);

        Student::insert([
            "class_id" => $request->class_id,
            "section_id" => $request->section_id,
            "name" => $request->name,
            "address" => $request->address,
            "phone" => $request->phone,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "photo" => $request->photo,
            "gender" => $request->gender,
            "created_at" => Carbon::now(),
        ]);

        return response('Student added successfully.');
    }

    public function AllStudents () {
        $students = Student::latest()->get();

        return response()->json($students);
    }


}
