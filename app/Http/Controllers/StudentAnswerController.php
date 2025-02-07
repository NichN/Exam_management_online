<?php

namespace App\Http\Controllers;

use App\Models\ExamStudent;
use App\Models\StudentAnswer;
use App\Models\Question;
use Illuminate\Http\Request;

class StudentAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(StudentAnswer::with('question')->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'exam_id' => 'required|integer',
            'student_id' => 'required|integer',
            'answers' => 'required|array',
            'answers.*.question_id' => 'required|integer',
            'answers.*.answer' => 'required|string',
        ]);

        $examId = $request->exam_id;
        $studentId = $request->student_id;
        $totalQuestions = 0;
        $correctAnswers = 0;

        foreach ($request->answers as $answerData) {
            $question = Question::find($answerData['question_id']);
            if (!$question) {
                continue;
            }

            $isCorrect = $question->correct_answer === $answerData['answer'];
            if ($isCorrect) {
                $correctAnswers++;
            }
            $totalQuestions++;

            StudentAnswer::updateOrCreate(
                [
                    'question_id' => $answerData['question_id'],
                    'student_id' => $studentId,
                ],
                [
                    'answer' => $answerData['answer'],
                    'is_correct' => $isCorrect,
                ]
            );
        }

        // Calculate Score
        $score = ($totalQuestions > 0) ? ($correctAnswers / $totalQuestions) * 100 : 0;

        // Save Score to `exam_student` table
        ExamStudent::updateOrCreate(
            [
                'exam_id' => $examId,
                'student_id' => $studentId,
            ],
            [
                'result' => $score,
            ]
        );

        return response()->json(['message' => 'Answers submitted successfully', 'score' => $score]);
    }
}
