<?php

namespace App\Http\Controllers;

use App\Models\ExamModel;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        return ExamModel::with('category', 'schedule', 'questions')->get();
    }

    // Create a new exam
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,category_id',
            'duration' => 'required|regex:/^\d+\s(min|h)$/', // Validate format like '30 min' or '2 h',
            'created_by' => 'required|exists:users,user_id',
        ]);

        $exam = ExamModel::create($validated);

        return response()->json($exam, 201);
    }

    // Get a single exam
    public function show($id)
    {
        $exam = ExamModel::with('category', 'schedule', 'questions')->findOrFail($id);

        return response()->json($exam);
    }

    // Update an exam
    public function update(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'category_id' => 'sometimes|required|exists:categories,category_id',
            'duration_minutes' => 'sometimes|required|integer|min:1',
            'created_by' => 'sometimes|required|exists:users,user_id',
        ]);

        $exam->update($validated);

        return response()->json($exam);
    }

    // Delete an exam
    public function destroy($id)
    {
        ExamModel::destroy($id);

        return response()->noContent();
    }
}
