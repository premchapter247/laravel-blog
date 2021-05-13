<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
class HomeController extends Controller
{
    public function index(){
        $serviceData = Services::get();
        return view('pages.home',['serviceData'=>$serviceData]);
    }

}
