<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Dealer;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        $dealers = Dealer::all();
        $contacts = Contact::first()->unit;

        return view('contacts', compact('dealers', 'contacts'));
    }
}
