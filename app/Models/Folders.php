<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folders extends Model
{
    protected $table = 'folders';
    protected $fillable = [
        'name', 'parent_id', 'folder_type','created_by'
    ];
}
