<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
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

    public function add(Request $request) {
        $phones = new Phone();

        $contact_name = $request->input('contact_name');
        $phone = $request->input('phone');

        $phones->contact_name = $contact_name;
        $phones->phone = $phone;

        $phones->save();

        return response()->json($phones, 200);
    }
}