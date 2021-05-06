<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfollioController extends Controller
{
    public function portfollio_detail(){
        return view('pages.portfollio_detail');
    }
}
