<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function  index() {
    return view('contact');
    }

    public function store (ContactRequest $request) {
    
        return redirect()->route('contact')->with('success', 'Message sent successfully!');
    }
}
