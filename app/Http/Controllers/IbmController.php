<?php

namespace App\Http\Controllers;

use App\Models\ibm;
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
        return view('ibm');
    }
}
