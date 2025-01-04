<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;


class User extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    // Specify which attributes are mass assignable
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /*@var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $table = 'users';

    // Define the columns for timestamps if you're not using default ones
    const CREATED_AT = 'created_at';
    public function exam()
    {
        return $this->hasMany(ExamModel::class, 'user_id', 'id');
    }

}
