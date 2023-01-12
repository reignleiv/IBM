<?php

namespace App\Http\Controllers;

use App\Models\Ibm;
use Illuminate\Http\Request;

class IbmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', [
            "title" => "Home",
            "active" => "home"      
        ]); 
    }
}
