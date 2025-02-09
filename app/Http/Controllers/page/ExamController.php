<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;

use App\Models\Exam;
use App\Models\StudentAnswer;
use App\Models\ExamResult;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::with(['subject', 'teacher', 'questions'])->get();

        return view('Student.exams', compact('exams'));
    }

    public function exampage($examId)
    {
        // Try to fetch the exam data
        $exam = Exam::with(['questions', 'teacher', 'subject'])->find($examId);

        if (!$exam) {
            // Redirect back with an error message or show a custom view
            return redirect()->route('some.fallback.route')->with('error', 'Exam not found');
        }

        // Return the view with the exam data
        return view('Student.exam_page', compact('exam'));
    }


    public function submitExam(Request $request, $examId)
    {
        try {
            \Log::info('Submit Exam Request:', ['examId' => $examId, 'answers' => $request->all()]);

            // Ensure student is logged in
            $studentId = auth()->id();
            if (!$studentId) {
                return response()->json(['error' => 'User not authenticated'], 401);
            }

            $exam = Exam::findOrFail($examId);
            $questions = $exam->questions;
            $totalScore = 0;
            $totalPossible = 0;

            foreach ($questions as $question) {
                $submittedAnswer = $request->answers[$question->id] ?? null;
                $correctAnswer = $question->correct_answer;
                $points = $question->points;

                // Log received answer for debugging
                \Log::info("QID: {$question->id}, Answer: {$submittedAnswer}");

                // Store answer in database
                StudentAnswer::create([
                    'student_id' => $studentId,
                    'exam_id' => $examId,
                    'question_id' => $question->id,
                    'answer' => $submittedAnswer,
                    'is_correct' => $submittedAnswer === $correctAnswer,
                ]);

                // Calculate score
                if ($submittedAnswer === $correctAnswer) {
                    $totalScore += $points;
                }
                $totalPossible += $points;
            }

            // Store total score in exam_results table
            ExamResult::updateOrCreate(
                ['student_id' => $studentId, 'exam_id' => $examId],
                ['total_score' => $totalScore, 'total_possible' => $totalPossible]
            );

            return response()->json([
                'score' => $totalScore,
                'total' => $totalPossible,
                'message' => 'Exam submitted successfully'
            ]);

        } catch (\Exception $e) {
            \Log::error('Submit Exam Error: ' . $e->getMessage());
            return response()->json(['error' => 'Something went wrong! ' . $e->getMessage()], 500);
        }
    }

}






