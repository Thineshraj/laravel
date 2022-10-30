<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;

class StudentController extends Controller
{
    public function index() {
        $students = student::all();
        return view('students', [
            'students' => $students,
        ]);
    }
}
