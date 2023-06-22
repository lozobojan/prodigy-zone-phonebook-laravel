<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\City;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function index(Request $request){
        // FACADE
        $loggedInUserId = Auth::id();

        $contacts = Contact::query()->where('user_id', $loggedInUserId);

        if($request->has('searchTerm')){
            $term = $request->get('searchTerm');

            $contacts->where('first_name', 'like', "%$term%")
                    ->orWhere('last_name', 'like', "%$term%");
        }

        $contacts = $contacts->get();

        return view('contact.index', ['contacts' => $contacts]);
    }

    public function show(Contact $contact){
        return view('contact.show', ['contact' => $contact]);
    }

    public function create(){
        $cities = City::all();
        return view('contact.create', ['cities' => $cities]);
    }

    public function save(ContactRequest $request){
        $newContactDetails = array_merge($request->validated(), ['user_id' => Auth::id()]);
        Contact::query()->create($newContactDetails);

        return Redirect::route('contact.index');
    }

    public function edit($id){
        $contact = Contact::query()->findOrFail($id);
        $cities = City::all();
        return view('contact.edit', ['contact' => $contact, 'cities' => $cities]);
    }

    public function update($id, ContactRequest $request){

        $contact = Contact::query()->findOrFail($id);
        $contact->update($request->validated());

        return Redirect::route('contact.index');
    }

    public function delete($id){
        $contact = Contact::query()->findOrFail($id);
        $contact->delete();

        return Redirect::route('contact.index');
    }
}
