<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meetings extends Model
{
    use HasFactory;
    protected $table = 'meetings';
    protected $fillable = [
        'meeting_id',
        'agenda',
        'pre_schedule',
        'duration',
        'password',
        'topic',
        'timezone',
        'start_time'
    ];
}
