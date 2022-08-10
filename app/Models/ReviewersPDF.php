<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewersPDF extends Model
{
    protected $table = 'reviewers_pdf';
    protected $fillable = [
        'name','path','status'
      ];
}
