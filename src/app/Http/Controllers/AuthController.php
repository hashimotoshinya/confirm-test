<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Collection;

class AuthController extends Controller
{
    
    public function admin()
    {
        return view('admin');
    }
}