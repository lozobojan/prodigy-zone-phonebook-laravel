<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\City;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

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
        $path = Storage::putFile('uploads', $request->file('avatarPhoto'));

        $newContactDetails = array_merge(
            $request->validated(),
            ['user_id' => Auth::id(), 'photo' => $path]
        );
        Contact::query()->create($newContactDetails);

        return Redirect::route('contact.index');
    }

    public function edit($id){
        $contact = Contact::query()->findOrFail($id);
        $cities = City::all();
        return view('contact.edit', ['contact' => $contact, 'cities' => $cities]);
    }

    public function update(Contact $contact, ContactRequest $request){

        $updatedContactDetails = $request->validated();
        if($request->hasFile('avatarPhoto')){
            $contact->deletePhotoFromUploads();

            $path = $request->file('avatarPhoto')->store('uploads');
            $updatedContactDetails['photo'] = $path;
        }

        $contact->update($updatedContactDetails);

        return Redirect::route('contact.index');
    }

    public function delete(Contact $contact){

        $contact->deletePhotoFromUploads();

        $contact->delete();

        return Redirect::route('contact.index');
    }
}
