<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    // $timestamp = false
    protected $fillable = [
        'comment',
        'user_id',
        'blog_id',
    ];


}
