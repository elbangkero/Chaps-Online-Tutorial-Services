<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewersVideo extends Model
{
    protected $table = 'reviewers_video';
    protected $fillable = [
        'name', 'link', 'thumbnail','status','created_by'
    ];
}
