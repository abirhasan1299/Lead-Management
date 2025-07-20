<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'enroll_number',
        'name',
        'father_name',
        'dob',
        'programme',
        'session',
        'status',
    ];
}
