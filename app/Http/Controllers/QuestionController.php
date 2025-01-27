<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Question::all();
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
            'exam_id' => 'required|exists:exams,id',
            'question_text' => 'required|string',
            'question_type' => 'required|in:MCQ,subjective',
            'options' => 'nullable|json',
            'correct_answer' => 'nullable|string',
            'points' => 'required|numeric',
        ]);

        $question = Question::create($validated);
        return response()->json($question, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $question = Question::findOrFail($id);
        return response()->json($question);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);

        $validated = $request->validate([
            'question_text' => 'sometimes|required|string',
            'question_type' => 'sometimes|required|in:MCQ,subjective',
            'options' => 'nullable|json',
            'correct_answer' => 'nullable|string',
        ]);

        $question->update($validated);
        return response()->json($question);
    }

    // Delete a specific question
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        return response()->json(['message' => 'Question deleted successfully']);
    }
}
