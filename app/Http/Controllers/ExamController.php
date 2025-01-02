<?php

namespace App\Http\Controllers;

use App\Models\ExamModel;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return ExamModel::all();
    }

    // Create a new exam
//    public function store(Request $request)
//    {
//        $validated = $request->validate([
//            'title' => 'required|string|max:255',
//            'category_id' => 'required|exists:categories,category_id',
//            'duration' => 'required|int',
//            'created_by' => 'required|exists:users,user_id',
//        ]);
//
//        $exam = ExamModel::created($validated);
//
//        return response()->json($exam, 201);
//    }
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'duration' => 'required|integer',
                'user_id' => 'required|exists:users,id',
                'category_id' => 'required|exists:categories,category_id',
            ]);

            // Create a new exam entry
            $exam = ExamModel::create([
                'title' => $validated['title'],
                'duration' => $validated['duration'],
                'user_id' => $validated['user_id'],
                'category_id' => $validated['category_id'],
            ]);

            // Return the newly created exam as JSON with a 201 status code
            return response()->json($exam, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation Error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }

    }

    // Get a single exam
    public function show($id)
    {
        $exam = ExamModel::with('categories', 'schedules', 'question')->findOrFail($id);

        return response()->json($exam);
    }

    // Update an exam
    public function update(Request $request, $id)
    {
        $exam = ExamModel::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|integer',
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,category_id',
        ]);

        $exam->update($validated);

        return response()->json($exam);
    }

    // Delete an exam
    public function destroy($id): \Illuminate\Http\Response
    {
        ExamModel::destroy($id);

        return response()->noContent(200, ['message' => 'Exam deleted successfully']);
    }
}
