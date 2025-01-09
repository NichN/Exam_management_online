<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\Question;
use App\Models\Schedule;
use App\Models\User;
use App\Models\ExamModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ExamController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        // return ExamModel::all();
        try {
            $exams = ExamModel::all()->map(function (ExamModel $exam) {
                $category = CategoryModel::find($exam->category_id);
                $user = User::find($exam->user_id);

                Log::info('Exam ID: ' . $exam->exam_id);
                Log::info('Category: ' . ($category ? $category->Name : 'null'));
                Log::info('User: ' . ($user ? $user->name : 'null'));

                return [
                    'exam_id' => $exam->exam_id,
                    'title' => $exam->title,
                    'category' => $category ? $category->Name : null,
                    'duration' => $exam->duration,
                    'created_by' => $user ? $user->name : null,
                    'created_at' => $exam->created_at ? $exam->created_at->toIso8601String() : null,
                ];
            });

            return response()->json($exams, 200);
        } catch (\Exception $e) {
            \Log::error('Error fetching exams', ['exception' => $e]);
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }

    }

    public function examDetailsById($id)
    {
        try {
            $exam = ExamModel::findOrFail($id);
            $category = CategoryModel::findOrFail($exam->category_id);
            $user = User::findOrFail($exam->user_id);
            $schedules = Schedule::where('exam_id', $exam->exam_id)->first();
            $question = Question::where('exam_id', $exam->exam_id)->get();

            $response = [
                'id' => $exam->exam_id,
                'title' => $exam->title,
                'category' => $category->Name,
                'duration' => $exam->duration,
                'created_by' => $user->name,
                'created_at' => $exam->created_at->toIso8601String(),
                'schedule' => $schedules ? [
                    'start_at' => $schedules->start_at ? $schedules->start_at->toIso8601String() : null,
                    'end_at' => $schedules->end_at ? $schedules->end_at->toIso8601String() : null,
                ] : null,
                'question' => $question->map(function ($question) {
                    return [
                        'id' => $question->question_id,
                        'content' => $question->content,
                        'marks' => $question->mark,
                    ];
                }),
            ];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            \Log::error('Error fetching exam: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }
    }

    // Create a new exam
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $input = $request->all();
        if (isset($input['question']) && is_array($input['question'])) {
            foreach ($input['question'] as $index => $question) {
                // Ensure each question has a default 'mark' field if missing
                $input['question'][$index]['mark'] = $question['mark'] ?? 1;
            }
        }
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'category' => 'required|string|max:255',
                'duration' => 'required|integer',
                'name' => 'required|string|max:255',
                'question' => 'required|array',
                'question.*.content' => 'required|string|max:255',
                'question.*.mark' => 'required|integer|min:1',
            ]);

            // Find or create the category
            $category = CategoryModel::firstOrCreate(['Name' => $validated['Name']]);

            // Find or create the user
            $user = User::firstOrCreate(['name' => $validated['name']]);

            // Create the exam
            $exam = ExamModel::create([
                'title' => $validated['title'],
                'category_id' => $category->category_id,
                'duration' => $validated['duration'],
                'user_id' => $user->id,
            ]);

            // Create the questions
            foreach ($validated['question'] as $questionData) {
                Question::create([
                    'exam_id' => $exam->exam_id,
                    'content' => $questionData['content'],
                    'mark' => $questionData['mark'],
                ]);
            }

            return response()->json($exam->load('question', 'categories', 'users'), 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validation Error',
                'messages' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error creating exam: ' . $e->getMessage());
            return response()->json([
                'error' => 'Internal Server Error',
                'message' => 'An unexpected error occurred. Please try again later.',
            ], 500);
        }
        // try {
        //     $validated = $request->validate([
        //         'title' => 'required|string|max:255',
        //         'duration' => 'required|integer',
        //         'user_id' => 'required|string|max:255',
        //         'category' => 'required|string|max:255',
        //     ]);

        //     // Create a new exam entry
        //     $exam = ExamModel::create([
        //         'title' => $validated['title'],
        //         'duration' => $validated['duration'],
        //         'user_id' => $validated['user_id'],
        //         'category_id' => $validated['category_id'],
        //         'created_at' => now(),
        //     ]);

        //     // Return the newly created exam as JSON with a 201 status code
        //     return response()->json($exam, 201);
        // } catch (\Illuminate\Validation\ValidationException $e) {
        //     return response()->json(['error' => 'Validation Error', 'messages' => $e->errors()], 422);
        // } catch (\Exception $e) {
        //     return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        // }

    }

    // Get a single exam
    public function show($id)
    {
        try {
            $exam = ExamModel::findOrFail($id);
            $category = CategoryModel::findOrFail($exam->category_id);
            $user = User::findOrFail($exam->user_id);
            $response = [
                'exam_id' => $exam->exam_id,
                'title' => $exam->title,
                'category' => $category->Name,
                'duration' => $exam->duration,
                'user_id' => $user->name,
                'created_at' => $exam->created_at->toIso8601String(),
            ];
            return response()->json(data: $response, status: 200);


        } catch (\Exception $e) {
            \Log::error('Error fetching exam: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }
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
