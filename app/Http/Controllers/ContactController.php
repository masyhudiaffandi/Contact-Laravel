<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Contacts = Contact::paginate(10);

        return view('ContactList', compact('Contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('AddContact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'category' => 'required',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'category' => $request->category,
        ]);

        return to_route('contact.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'category' => 'required',
        ]);

        $Contact = Contact::find($id);

        $Contact->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'category' => $request->category,
        ]);

        return to_route('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Contact::find($id)->delete();

        return to_route('contact.index');
    }

    public function search(Request $request) {
        $Contacts = Contact::query();
    
        if ($request->filled('search')) {
            $Contacts->where('name', 'like', '%' . $request->search . '%');
        }
    
        $Contacts = $Contacts->latest()->paginate();
    
        return view('ContactList', compact('Contacts'));
    }
    
}
