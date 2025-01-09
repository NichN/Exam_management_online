<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $primaryKey = 'answer_id';


    protected $fillable = [
        'question_id',
        'content',
        'is_correct'
    ];

    protected $table = 'answer';

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    function getCorrectAnswer($question_id)
    {
        return Answer::where('question_id', $question_id)->where('is_correct', 1)->first();
    }

    function getAnswers($question_id)
    {
        return Answer::where('question_id', $question_id)->get();
    }




}
