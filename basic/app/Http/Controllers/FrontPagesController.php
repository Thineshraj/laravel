<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\multipic;
use App\Models\Contact;
use App\Models\ContactForm;

class FrontPagesController extends Controller
{
    public function Portfolio () {
        $images = multipic::all();
        return view('layouts.pages.portfolio', compact('images'));
    }

    public function Contact () {
        $contact = Contact::latest()->first();
        return view('layouts.pages.contact', compact('contact'));
    }

    public function ContactForm (Request $request) {
        ContactForm::insert([
            "name" => $request->name,
            "email" => $request->email,
            "subject" => $request->subject,
            "message" => $request->message,
            "created_at" => Carbon::now(),
        ]);

        return Redirect()->route('contact')->with('success', 'Form sent successfully');
    }
}
