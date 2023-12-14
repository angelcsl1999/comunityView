<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [

        'post_content', 'post_topic', 'post_by'

    ];

}
