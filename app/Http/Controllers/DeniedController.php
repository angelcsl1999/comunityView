<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeniedController extends Controller
{
    //
    public function permissionDenied(){
        return view("permissionDenied");
    }
}
