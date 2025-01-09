<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Question extends Model
{
    protected $table = 'question';
    public $timestamps = false;
    public $primaryKey = 'question_id';
    protected $fillable = ['exam_id', 'content', 'mark'];

    public function exam()
    {
        return $this->belongsTo(ExamModel::class, 'exam_id', 'exam_id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id', 'question_id');
    }
}
