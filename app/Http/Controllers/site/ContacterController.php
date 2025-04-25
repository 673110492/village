<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContacterController extends Controller
{
    public function index()
    {
        $setting = Setting::all();
        return view('front.contact',compact('setting'));
    }
}
