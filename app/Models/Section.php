<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['year_level', 'section_name'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}


