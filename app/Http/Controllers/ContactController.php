<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Phone;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function showAll() {
        $contact = Contact::all()->where('deleted', "False");

        $phone = Phone::all()->where('contact_name', $contact['1']['contact_name']);

        $response = [$contact, $phone['1']['phone']];

        return response()->json($response, 200);

    }

    public function add(Request $request) {
        $contact = new Contact();

        if (!$request->input('contact_name')) {
            return response()->json(['error' => 'not contact_name'], 400);
        }

        if (!$request->input('contact_text')) {
            return response()->json(['error' => 'not contact_text'], 400);
        }

        $contact_name = $request->input('contact_name');
        $contact_text = $request->input('contact_text');
        
        $contact->deleted = "False";
        $contact->contact_name = $contact_name;
        $contact->contact_text = $contact_text;

        $contact->save();

        return response()->json($contact, 201);
    }

    public function delete($contact_id) {
        $contact = Contact::find($contact_id);

        if (!Contact::find($contact_id)) {
            return response()->json(['error' => 'not contact_id'], 200);
        }

        if ($contact->deleted === "True") {
            return response()->json(['error' => 'its contact deleted'], 200);
        }

        $contact->deleted = "True";
        $contact->save();

        return response()->json([$contact, "accept deleted"], 201);
    }

    public function find($contact_id) {
        $contact = Contact::find($contact_id);

        if (!Contact::find($contact_id)) {
            return response()->json(['error' => 'not contact_id'], 200);
        }
        
        $phone = Phone::all()->where('contact_name', $contact->contact_name);

        return response()->json($phone, 201);
    }
}