<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Answer;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::all();
        return response()->json($questions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function questionandAnswer(Request $request)
    {
        try {
            $validate = $request->validate([
                'exam_id' => 'required|exists:exam,exam_id',
                'content' => 'required|string|max:255',
                'mark' => 'required|integer',
                'answers' => 'required|array',
                'answers.*.content' => 'required|string|max:255',
                'answers.*.is_correct' => 'required|boolean',
            ]);

            $question = Question::create([
                'exam_id' => $validate['exam_id'],
                'content' => $validate['content'],
                'mark' => $validate['mark'],
            ]);

            foreach ($validate['answers'] as $answer) {
                Answer::create(attributes: [
                    'question_id' => $question->question_id,
                    'content' => $answer['content'],
                    'is_correct' => $answer['is_correct'],
                ]);
            }

            return response()->json($question->load('answers'), 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation Error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            \Log::error('Error creating question: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'exam_id' => 'required|exists:exam,exam_id',
                'content' => 'required|string|max:255',
                'mark' => 'required',
            ]);

            $question = Question::create([
                'exam_id' => $validate['exam_id'],
                'content' => $validate['content'],
                'mark' => $validate['mark'],
            ]);

            return response()->json($question, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation Error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($question_id)
    {
        try {
            $question = Question::find($question_id);

            if (!$question) {
                return response()->json(['error' => 'Question not found'], 404);
            }

            return response()->json($question, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }
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
    public function update(Request $request, $question_id)
    {
        try {
            $question = Question::findOrFail($question_id);
            $validate = $request->validate([
                'exam_id' => 'required|exists:exam,exam_id',
                'content' => 'required|string|max:255',
                'mark' => 'required',
            ]);

            $question->update($validate);
            return response()->json($question, 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation Error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        Question::destroy($question->question_id);
        return response()->json(['message' => 'Question deleted successfully'], 200);
    }
}
