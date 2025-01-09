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

<<<<<<< HEAD
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<int, string>
=======
    /*@var array<int, string>
>>>>>>> 3f826563b65c05afc6f0415591823c2dc2dff003
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

<<<<<<< HEAD
    public function isTeacher()
    {
        return $this->role === 'teacher';
    }

    public function isStudent()
    {
        return $this->role === 'student';
    }

=======
>>>>>>> 3f826563b65c05afc6f0415591823c2dc2dff003
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