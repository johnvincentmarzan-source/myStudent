<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'studentNumber',
        'lname',
        'fname',
        'mi',
        'email',
        'contactNumber',
        'section_id',
        'course',
        'year_level',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
