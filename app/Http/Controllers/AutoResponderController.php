<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutoResponderController extends Controller
{
    public function index()
    {
        return view('autoresponder.index');
    }

    public function create()
    {
        return view('autoresponder.create');
    }
}
