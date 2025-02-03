<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Exam;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::with(['subject', 'createdBy', 'subjectTeacher.subject', 'teacher', 'questions'])->get();

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
        // Fetch the exam
        $exam = Exam::findOrFail($examId);

        // Fetch all questions for the exam
        $questions = Question::where('exam_id', $examId)->get();

        $totalScore = 0;

        // Loop through each question and check the user's answer
        foreach ($questions as $question) {
            $userAnswer = $request->input('q' . $question->id); // Get the user's answer for this question

            // Fetch the correct answer for the question
            $correctAnswer = Answer::where('question_id', $question->id)
                ->where('is_correct', true)
                ->first();

            // Compare the user's answer with the correct answer
            if ($correctAnswer && $userAnswer == $correctAnswer->id) {
                $totalScore += $question->marks; // Add marks if the answer is correct
            }
        }

        // Save the result in the database
        $result = new Result();
        $result->user_id = Auth::id();
        $result->exam_id = $examId;
        $result->total_score = $totalScore;
        $result->result_status = ($totalScore >= $exam->passing_marks) ? 'pass' : 'fail'; // Assuming you have a passing_marks column in the exams table
        $result->save();

        // Return the result to the view
        return view('exam.result', [
            'totalScore' => $totalScore,
            'totalMarks' => $questions->sum('marks'), // Total possible marks
            'resultStatus' => $result->result_status,
        ]);
    }




}
