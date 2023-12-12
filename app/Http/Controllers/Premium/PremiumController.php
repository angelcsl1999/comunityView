<?php

namespace App\Http\Controllers\Premium;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PremiumController extends Controller
{
    //
    public function index(){
        $user = auth()->user();
        if($user->hasRole('premium')){
            return view('premium.home');
        }else{
            return redirect('/permissionDenied');
        }
    }
}
