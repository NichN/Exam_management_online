<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    use HasFactory;

    // Specify which attributes are mass assignable
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    // Specify the table if it's not the default (plural form of the model)
    protected $table = 'users';

    // Define the columns for timestamps if you're not using default ones
    const CREATED_AT = 'created_at';


    // Hash the password automatically when creating/updating a user
    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->password = Hash::make($user->password);
        });
    }
}
