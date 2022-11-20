<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    public function ContactPage() {
        $contacts = Contact::latest()->paginate(5);
        return view('admin.contact.index', compact('contacts'));
    }

    public function ContactAdd () {
        return view('admin.contact.addContact');
    }

    public function ContactStore (Request $request) {
        Contact::insert([
            "address" => $request->address,
            "email" => $request->email,
            "phone" => $request->phone,
            "created_at" => Carbon::now(),
        ]);
        return Redirect()->route('admin.contact')->with('success', 'Contact added successfully');
    }

    public function ContactEdit ($id) {
        $contact = Contact::find($id);

        return view('admin.contact.editContact', compact('contact'));
    }

    public function ContactUpdate (Request $request, $id) {
        Contact::find($id)->update([
            "address" => $request->address,
            "email" => $request->email,
            "phone" => $request->phone,
        ]);

        return Redirect()->route('admin.contact')->with('success', 'Contact updated successfullt');
    }

    public function ContactDelete ($id) {
        Contact::find($id)->delete();

        return Redirect()->back();
    }
    
    public function ContactMessage () {
        $messages = ContactForm::latest()->paginate(5);
        return view('admin.contact.contactMessage', compact('messages'));
    }

    public function MessageDelete ($id) {
        $message = ContactForm::find($id);
        $message->delete();

        return Redirect()->back()->with('success', 'Message deleted successfully');
    }
}
