<?php

namespace App\Http\Controllers;

use App\Models\Consumable;
use Illuminate\Http\Request;

class ConsumablesController extends Controller
{
    public function index()
    {
        $consumables = Consumable::first();

        return view('consumables', compact('consumables'));
    }
}
