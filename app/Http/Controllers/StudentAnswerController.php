<?php

namespace App\Http\Controllers;

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
        $validated = $request->validate([
            'answers' => 'required|array',
            'answers.*.question_id' => 'required|exists:questions,id',
            'answers.*.student_id' => 'required|exists:users,id',
            'answers.*.answer' => 'nullable|string',
        ]);

        $responses = [];
        foreach ($validated['answers'] as $answerData) {
            $question = Question::find($answerData['question_id']);
            $isCorrect = ($answerData['answer'] === $question->correct_answer);
            $points = $isCorrect ? $question->points : 0;

            $responses[] = StudentAnswer::create([
                'question_id' => $answerData['question_id'],
                'student_id' => $answerData['student_id'],
                'answer' => $answerData['answer'],
                'is_correct' => $isCorrect,
                'points' => $points,
            ]);
        }

        return response()->json($responses, 201);
    }





    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $studentAnswer = StudentAnswer::with('question')->findOrFail($id);
        return response()->json($studentAnswer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentAnswer $studentAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $studentAnswer = StudentAnswer::findOrFail($id);

        $validated = $request->validate([
            'answer' => 'sometimes|nullable|string',
            'is_correct' => 'sometimes|nullable|boolean',
        ]);

        $studentAnswer->update($validated);
        return response()->json($studentAnswer);
    }

    // Delete a specific student answer
    public function destroy($id)
    {
        $studentAnswer = StudentAnswer::findOrFail($id);
        $studentAnswer->delete();
        return response()->json(['message' => 'Student answer deleted successfully']);
    }
}
