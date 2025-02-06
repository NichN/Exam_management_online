<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Models\StudentAnswer;
use App\Models\Question;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        return response()->json(Exam::all()); // Return all exams
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'subject_id' => 'required|exists:subjects,id',
            'teacher_id' => 'required|exists:users,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'status' => 'in:scheduled,active,completed',
            'exam_type' => 'required|in:quiz,midterm,final,practice',
        ]);

        $exam = Exam::create($validated);
        return response()->json($exam, 201);
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $exam = Exam::with(['subject', 'teacher'])->findOrFail($id);
        return response()->json($exam);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'subject_id' => 'sometimes|required|exists:subjects,id',
            'teacher_id' => 'sometimes|required|exists:users,id',
            'start_time' => 'sometimes|required|date',
            'end_time' => 'sometimes|required|date|after:start_time',
            'status' => 'sometimes|in:scheduled,active,completed',
            'exam_type' => 'required|in:quiz,midterm,final,practice',
        ]);

        $exam->update($validated);
        return response()->json($exam);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $exam = Exam::findOrFail($id);
        $exam->delete();
        return response()->json(['message' => 'Exam deleted successfully']);
    }
    public function getTotalScoreForQuestions($examId)
    {
        $questions = Question::where('exam_id', $examId)->get();

        $totalScores = [];

        foreach ($questions as $question) {
            // Calculate the total score for this question based on correct answers
            $correctAnswersCount = StudentAnswer::where('question_id', $question->id)
                ->where('is_correct', 1)
                ->count();

            // Calculate the total score for this question
            $totalScore = $correctAnswersCount * $question->points;

            $totalScores[] = [
                'question_id' => $question->id,
                'question_points' => $question->points,
                'correct_answers_count' => $correctAnswersCount,
                'total_score_for_question' => $totalScore,
            ];
        }

        return response()->json([
            'exam_id' => $examId,
            'total_scores' => $totalScores,
        ]);
    }

    public function getAllAnswersForExam($examId)
    {
        $answers = StudentAnswer::whereHas('question', function ($query) use ($examId) {
            $query->where('exam_id', $examId);
        })
            ->with(['question', 'user'])  // Include question and student details
            ->get();

        return response()->json($answers);
    }

    public function getTotalScoreSummary($examId)
    {
        // Find the exam
        $exam = Exam::with('questions')->findOrFail($examId);

        // Calculate total scores for each student
        $summary = $exam->students()
            ->with([
                'answers' => function ($query) use ($exam) {
                    $query->whereHas('question', function ($subQuery) use ($exam) {
                        $subQuery->where('exam_id', $exam->id);
                    });
                }
            ])
            ->get()
            ->map(function ($student) use ($exam) {
                $totalScore = $student->answers->sum(function ($answer) {
                    return $answer->points_awarded ?? 0;
                });

                return [
                    'student_id' => $student->id,
                    'student_name' => $student->name,
                    'total_score' => $totalScore,
                ];
            });

        return response()->json([
            'exam_id' => $exam->id,
            'exam_title' => $exam->title,
            'summary' => $summary,
        ]);
    }

}
