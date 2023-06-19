<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function index(Request $request){

        $contacts = Contact::query();

        if($request->has('searchTerm')){
            $term = $request->get('searchTerm');

            $contacts->where('first_name', 'like', "%$term%")
                    ->orWhere('last_name', 'like', "%$term%");
        }

        $contacts = $contacts->get();

        return view('contact.index', ['contacts' => $contacts]);
    }

    public function create(){
        return view('contact.create');
    }

    public function save(Request $request){
        $newContactDetails = $request->except('_token');
        Contact::query()->create($newContactDetails);

        return Redirect::route('contact.index');
    }

    public function edit($id){
        $contact = Contact::query()->findOrFail($id);
        return view('contact.edit', ['contact' => $contact]);
    }

    public function update($id, Request $request){
        $contact = Contact::query()->findOrFail($id);
        $newDetails = $request->only(['first_name', 'last_name', 'email']);
        $contact->update($newDetails);

        return Redirect::route('contact.index');
    }

    public function delete($id){
        $contact = Contact::query()->findOrFail($id);
        $contact->delete();

        return Redirect::route('contact.index');
    }
}
