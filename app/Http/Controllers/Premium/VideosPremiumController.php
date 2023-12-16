<?php

namespace App\Http\Controllers\Premium;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Videos\Video;
use App\Models\Videos\Comment;

class VideosPremiumController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        if(!$user->hasRole('premium')){
            return redirect('/permissionDenied');
        }

        $videos = Video::all(); // get all videos

        return view('videosPremium.index', compact('videos'));
    }


    public function create() //admin
    {
        $user = auth()->user();
        if(!$user->hasRole('admin')){
            return redirect('/permissionDenied');
        }
        return view('videosPremium.create');
    }

    public function store(Request $request)
    {

        $user = auth()->user();
        if(!$user->hasRole('admin')){
            return redirect('/permissionDenied');
        }


        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'video' => 'required|mimes:mp4,mov,avi|max:604800',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
        ]);

        // load video to the server
        if ($request->hasFile('video') && $request->hasFile('image')) {
            $videoPath = $request->file('video')->store('premium/videos', 'public'); // save video in 'public/videos'
            $imagePath = $request->file('image')->store('premium/images', 'public'); //  save video in 'public/images'
            
            //save video information in the database
            $video = Video::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'video_path' => $videoPath,
                'image_path' => $imagePath,
            ]);
            return redirect()->back()->with('success', '¡El video se ha subido exitosamente!');
        }

        return redirect()->back()->with('error', 'Error al subir el video o la imagen.');
    }
 
    public function show($id)
    {
        $user = auth()->user();
        if(!$user->hasRole('premium')){
            return redirect('/permissionDenied');
        }
        $video = Video::findOrFail($id); 
        $comments = Comment::where('video_id', $id)->get(); 

        return view('videosPremium.show', compact('video', 'comments'));
    }

    public function deleteVideo($id)
    {

    $user = auth()->user();
    if(!$user->hasRole('admin')){
            return redirect('/permissionDenied');
    }

    $video = Video::findOrFail($id); // Encuentra el video por su ID
    $video->delete(); // Borra el video de la base de datos

    return redirect()->back()->with('success', '¡Video eliminado exitosamente!');
    }
}
