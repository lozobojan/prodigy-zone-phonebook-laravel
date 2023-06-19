<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getHomePage(){
        $message = "Pocetna strana";
        $contacts = [
            [
                'id' => 1,
                'name' => 'Marko Markovic',
                'email' => 'marko@gmail.com'
            ],
            [
                'id' => 2,
                'name' => 'Janko Jankovic',
                'email' => 'janko@gmail.com'
            ],
            [
                'id' => 3,
                'name' => 'Janko Jankovic',
                'email' => 'janko@gmail.com'
            ],
            [
                'id' => 4,
                'name' => 'Janko Jankovic',
                'email' => 'janko@gmail.com'
            ],
        ];

        return view('home', compact('message', 'contacts'));
    }

    public function getContactDetails($id, Request $request){
        $message = $request->get('message');
        return view('contact', compact('id', 'message'));
    }

    public function saveContact(Request $request){
        $newContact = new Contact();

        $newContact->id = $request->get('id');
        $newContact->first_name = $request->get('first_name');
        $newContact->last_name = $request->get('last_name');
        $newContact->email = $request->get('email');

        $newContact->save();
    }
}
