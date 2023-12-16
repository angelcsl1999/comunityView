<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Videos\Video;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function index(){
        $user = auth()->user();
        if(!$user->hasRole('admin')){
            return redirect('/permissionDenied');
        }
        return view('admin.index');
    }

    public function adminVideos(){
        $user = auth()->user();
        if(!$user->hasRole('admin')){
            return redirect('/permissionDenied');
        }

        $videos = Video::all();

        return view('admin.show_and_delete_videos', compact('videos'));
    }
}
