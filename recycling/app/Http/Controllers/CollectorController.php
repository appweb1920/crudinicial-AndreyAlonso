<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectorController extends Controller
{
    public function show(){
        return view('collector/collector');
    }
}
