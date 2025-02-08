<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    protected $fillable = ['name', 'course_id'];

    // Relationship with Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
