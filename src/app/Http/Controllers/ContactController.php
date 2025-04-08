<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use APP\Http\Controllers\ContactController;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->all();
        return view('confirm', ['contact' => $contact]);
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->all();
        Contact::create($contact);
        return view('thanks');
    }


}
