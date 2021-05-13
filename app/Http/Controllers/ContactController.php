<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contactFormSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'subject' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        if ($validator->passes()) {
            $contact = Contact::create($request->all());
            if($contact)
                return response()->json(['success'=>'Added new records.']);
        }
        return response()->json(['error'=>$validator->errors()]);
    }
}
