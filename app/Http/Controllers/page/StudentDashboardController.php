<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Exam;
use App\Models\ExamStudent;
use App\Models\Question;
use App\Models\StudentAnswer;

class StudentDashboardController extends Controller
{

    public function index()
    {
        // Fetch all users and their related data (you keep this part)
        $users = User::with(['department', 'exams.subject'])->get();
        foreach ($users as $user) {
            $user->exams = $user->exams ?: collect(); // Ensure that we don't pass null exams
        }
        // Fetch the latest exam with subject and teacher data
        $exam = Exam::with(['subject', 'teacher'])->latest()->first(); // Fetch latest exam

        // Check if the exam exists
        if (!$exam) {
            return redirect()->back()->with('error', 'No exams available');
        }
        $questionCount = Question::where('exam_id', $exam->id)->count();

        // Count correctly answered questions by the student
        $correctAnswers = StudentAnswer::whereIn('question_id', function ($query) use ($exam) {
            $query->select('id')
                ->from('questions')
                ->where('exam_id', $exam->id);
        })
            ->where('is_correct', true)
            ->count();

        // Fetch the result (score) for the logged-in student
        $user = auth()->user(); // Get the currently authenticated user
        $examStudent = ExamStudent::where('exam_id', $exam->id)
            ->where('student_id', $user->id)  // Filter by logged-in user
            ->first();

        $totalScore = optional($examStudent)->result ?? 0;

        // Return view with necessary data
        return view('student.dashboard', compact('exam', 'questionCount', 'correctAnswers', 'totalScore', 'users', 'user'));
    }




}
