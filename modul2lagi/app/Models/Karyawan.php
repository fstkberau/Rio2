<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    //protected $fillable = ['name', 'email', 'phone', 'password'];
    
    protected $fillable = ['name', 'email', 'phone', 'adresse', 'editor'];
}
