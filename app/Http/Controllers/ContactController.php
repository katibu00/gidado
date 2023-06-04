<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $contacts = $user->contacts;
    
        return view('contacts.index', ['contacts' => $contacts]);
    }
    
    public function store(Request $request)
    {

        $validatedData = Validator::make($request->all(), [
            'name' => 'required',
            'number' => 'required',
            'network' => 'required',
        ]);
       
        if($validatedData->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validatedData->messages(),
            ]);
        }
       

        $user = Auth::user();

        $contact = $user->contacts()->create($validatedData->validated());

        return response()->json([
            'status' => 200,
            'message'=>'Contact Saved Successfully'
        ]);
    }

   

    public function update(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required',
            'number' => 'required',
            'network' => 'required',
        ]);
       
        if($validatedData->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validatedData->messages(),
            ]);
        }

        $user = Auth::user();

        $contact = $user->contacts()->findOrFail($request->id);

        // Update the contact
        $contact->update($validatedData->validated());

        return response()->json([
            'status' => 200,
            'message'=>'Contact Updated Successfully'
        ]);
    }

    public function delete(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Find the contact by ID for the authenticated user
        $contact = $user->contacts()->findOrFail($request->id);

        // Delete the contact
        $contact->delete();

        return response()->json([
            'status' => 200,
            'message'=>'Contact Deleted Successfully'
        ]);
    }
}
