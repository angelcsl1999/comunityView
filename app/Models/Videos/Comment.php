<?php

namespace App\Models\Videos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ["video_id","body"];
    public function comments()
    {
    return $this->hasMany(Comment::class);
    }
}
