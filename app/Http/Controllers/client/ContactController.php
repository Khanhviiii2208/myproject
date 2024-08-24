<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    function contact(){
        $title="Liên hệ";
        return view('client.pages.contact.contact', compact(
            'title'
        ));
    }
}