<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index() {
        $contacts = Contact::latest()->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact) {
        return view('admin.contacts.show', compact('contact'));
    }

    public function destroy(Contact $contact) {
        $contact->delete();
        return redirect()->route('contacts.index');
    }
}
