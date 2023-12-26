<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videos\Comment;
class VideoCommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'video_id' => 'required', 
            'body' => 'required',
        ]);

        $comment = Comment::create([
            'video_id' => $request->input('video_id'),
            'body' => $request->input('body')
        ]);
       
        return redirect()->back()->with('success', '¡Comentario agregado exitosamente!');
    }
}
