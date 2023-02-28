<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        $dealers = Dealer::all();

        return view('contacts', compact('dealers'));
    }
}
