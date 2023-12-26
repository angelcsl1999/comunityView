<?php

namespace App\Models\Videos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

//this is the model for premium videos
class Video extends Model
{

    use HasFactory;

    protected $fillable = ['title', 'description', 'video_path', 'image_path'];

    public function comments(){
    return $this->hasMany(Comment::class);
    }
}
