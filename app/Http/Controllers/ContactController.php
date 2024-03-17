<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ContactController extends Controller
{
    public function index(){

        $contacts=Contacts::get();
        // return response()->json($contacts);
    //   .....  return response()->json(['contacts' => $contacts]);

        return view('navbar.home1',compact('contacts'));
}
public function create()
{
    $contacts = new Contacts(); // Initialize a new instance

    return view('navbar.create', compact('contacts'));
}
public function store(Request $request){

    // $contacts=new Contacts();
    // $data=$request->all();
    // return $data;
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:contacts,email',
        'phone' => 'required',
        'address' => 'required',

    ]);

    $contacts = Contacts::create($validatedData);

    // return response()->json($contacts, 201);

    // return response()->json(['message' => 'Contact added successfully', 'contact' => $contacts]);
     return redirect()->route('contact.index')->with('success', 'Contact Added Successfully');

}
public function edit(Request $request,$id){

    $contacts=Contacts::find($id);

    return view('navbar.create',compact('contacts'));

}



public function update(Request $request,$id){

    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:contacts,email,' . $id,
        'phone' => 'required',
        'address' => 'required',
    ]);

    $contact = Contacts::find($id);
    $contact->update($validatedData);
    // return response()->json($contact, 200);

    return redirect()->route('contact.index')->with('success', 'Contact Updated Successfully');
    // return response()->json(['message' => 'Contact updated successfully', 'contact' => $contact]);


}
public function delete($id){

    $contacts=Contacts::find($id);
    $contacts->delete();
    // return response()->json(['message' => 'Contact deleted successfully']);

    return redirect()->route('contact.index')->with('success', 'Contact Deleted Successfully');
}

public function show($id)
{
    $contact = Contacts::findOrFail($id);
    return response()->json($contact);
}

public function getAllContacts()
{
    $contacts = Contacts::all();
    return response()->json(['contacts' => $contacts]);
}


public function getContact($id)
{
    $contact = Contacts::find($id);
    return response()->json(['contact' => $contact]);
}


public function createContact(Request $request)
{

}


public function updateContact(Request $request, $id)
{
    $contact = Contacts::find($id);

    return response()->json($contact, 200);

}

public function deleteContact($id)
{
    $contacts=Contacts::find($id);
    $contacts->delete();
    return response()->json(['message' => 'Contact deleted successfully']);

}






}
