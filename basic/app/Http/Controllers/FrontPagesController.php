<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\multipic;

class FrontPagesController extends Controller
{
    public function Portfolio () {
        $images = multipic::all();
        return view('layouts.pages.portfolio', compact('images'));
    }
}
