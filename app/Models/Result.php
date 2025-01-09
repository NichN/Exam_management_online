<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $table = 'result';
    protected $primaryKey = 'result_id';
    protected $fillable = [
        'user_id',
        'exam_id',
        'total_score',
        'result_status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function exam()
    {
        return $this->belongsTo(ExamModel::class, 'exam_id', 'exam_id');
    }

}
