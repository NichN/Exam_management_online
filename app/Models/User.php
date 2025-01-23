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

    // Specify which attributes are mass assignable
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
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

    protected $table = 'users';

    const CREATED_AT = 'created_at';
    public function exam()
    {
        return $this->hasMany(ExamModel::class, 'user_id', 'id');
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
