<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'duration',
        'user_id',
        'category_id'
    ];

    protected $table = 'exam';

}
