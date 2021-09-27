<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $fillable = ['story', 'editor', 'points', 'actual_point', 'remaining_point', 'status', 'test_date', 'note'];
}
