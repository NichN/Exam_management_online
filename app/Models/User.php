<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $table = 'users';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'department_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
    /*@var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function isTeacher()
    {
        return $this->role === 'teacher';
    }

    public function isStudent()
    {
        return $this->role === 'student';
    }



    const CREATED_AT = 'created_at';

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class, 'teacher_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'assigned_to');
    }
    
}
