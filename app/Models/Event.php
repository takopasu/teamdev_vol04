<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
    'event_name',
    'start_time',
    'end_time',
    'enter_month',
    'book_link',
    'handout_link',
    ];
}
