<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;

class ServicesController extends Controller
{
    // public function index()
    // {

    //   return view('images');
    // }

    public function storeService(Request $request)
    {
        $request->validate([
            'title' => 'required|min:1',
            //'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|min:10',
        ]);
        $storeData = array();
        if ($request->hasFile('image_url')) {
            $imageName = time().'.'.$request->image_url->extension();
            $imageUrl = 'uploads/'.$imageName;
            $storeData['image_url'] = $imageUrl;
           
            $request->image_url->move(public_path('uploads'), $imageName);
        }    
        // print_r($storeData); die;
        $storeData['title'] =  $request->title;
        $storeData['content'] = $request->content ;
        $services = Services::where('id',3)->update($storeData);

        return back()
        ->with('success','You have successfully added service pagge data.');
    }

}
