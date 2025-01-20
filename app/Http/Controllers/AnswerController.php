<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Answer::all());
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
        try {
            $answer = request()->validate([
                'question_id' => 'required',
                'content' => 'required',
                'is_correct' => 'required'
            ]);

            $validate = Answer::create([
                'question_id' => $answer['question_id'],
                'content' => $answer['content'],
                'is_correct' => $answer['is_correct']
            ]);

            return response()->json($validate);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation Error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }



    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $answer = Answer::findOrFail($id);
            return response()->json($answer, 200);
        } catch (\Exception $e) {
            \Log::error('Error fetching answer: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Answer $answer)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $answer = Answer::findOrFail($id);
            $validated = $request->validate([
                'question_id' => 'required|exists:question,question_id',
                'content' => 'required|string|max:1025',
                'is_correct' => 'required|boolean'
            ]);
            $answer->update($validated);
            return response()->json($answer, 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation Error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            \Log::error('Error updating answer: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $answer = Answer::findOrFail($id);
            $answer->delete();
            return response()->json(['message' => 'Answer deleted successfully'], 200);
        } catch (\Exception $e) {
            \Log::error('Error deleting answer: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }
    }
}
