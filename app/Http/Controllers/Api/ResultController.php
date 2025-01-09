<?php

namespace App\Http\Controllers;

use App\Models\ExamModel;
use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return response()->json(Result::all(), 200);
        try {
            $results = Result::all()->map(function (Result $result) {
                $exam = ExamModel::find($result->exam_id);
                return [
                    'result_id' => $result->result_id,
                    'user_id' => $result->user_id,
                    'exam_id' => $result->exam_id,
                    'total_score' => $result->total_score,
                    'result_status' => $result->result_status,
                    'exam' => $exam ? $exam->title : null,
                    'created_at' => $result->created_at ? $result->created_at->toIso8601String() : null,
                ];
            });

            return response()->json($results, 200);
        } catch (\Exception $e) {
            \Log::error('Error fetching results', ['exception' => $e]);
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }

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
            $validated = $request->validate([
                'user_id' => 'required|integer|exists:users,id',
                'exam_id' => 'required|integer|exists:exam,exam_id',
                'total_score' => 'required|integer',
                'result_status' => 'required|in:pass,fail'
            ]);

            $result = Result::create($validated);

            return response()->json($result, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation Error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            \Log::error('Error creating result: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $result = Result::findOrFail($id);
            return response()->json($result, 200);
        } catch (\Exception $e) {
            \Log::error('Error fetching result: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $result = Result::findOrFail($id);
            $validated = $request->validate([
                'user_id' => 'required|integer|exists:users,id',
                'exam_id' => 'required|integer|exists:exam,exam_id',
                'total_score' => 'required|integer',
                'result_status' => 'required|in:pass,fail'
            ]);
            $result->update($validated);
            return response()->json($result, 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation Error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            \Log::error('Error updating result: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $result = Result::findOrFail($id);
            $result->delete();
            return response()->json(['message' => 'Result deleted successfully'], 200);
        } catch (\Exception $e) {
            \Log::error('Error deleting result: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }
    }
}
