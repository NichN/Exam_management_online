<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';

    protected $fillable = [
        'name',
        'course_id',
    ];

    // Relationships
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function exams()
    {
        return $this->hasMany(Exam::class);
    }


    public function subjectTeachers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SubjectTeacher::class);
    }

}
