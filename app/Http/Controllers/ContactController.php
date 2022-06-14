<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::get();

        return response()->json([
            'contacts' => $contacts
        ], 200);
    }

    public function getAllContacts()
    {
        $contacts = Contact::get();

        return response()->json([
            'contacts' => $contacts
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $phone = $request->phone;
        $email = $request->email;
        $address = $request->address;

        Contact::create([
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
        ]);

        return response()->json('success', 200);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, Contact $contact)
    {
        // return $request;
        $request->validate([
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $phone = $request->phone;
        $email = $request->email;
        $address = $request->address;

        $contact->update([
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
        ]);

        return response()->json('success', 200);
    }

    public function destroy(Contact $contact)
    {
        // return $category;
        $contact->delete();
    }
}
