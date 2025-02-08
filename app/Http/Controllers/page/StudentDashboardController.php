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
        // Fetch all users and their related data
        $users = User::with(['department', 'exams.subject'])->get();
        foreach ($users as $user) {
            $user->exams = $user->exams ?: collect(); // Ensure that we don't pass null exams
        }

        // Fetch all exams with their subjects and teachers
        $exams = Exam::with(['subject', 'teacher'])->get(); // Get all exams

        // If no exams are available
        if ($exams->isEmpty()) {
            return redirect()->back()->with('error', 'No exams available');
        }

        // Initialize an empty array to store the exam details
        $examDetails = [];

        // Loop through each exam to gather related information
        foreach ($exams as $exam) {
            // Get the number of questions for this exam
            $questionCount = Question::where('exam_id', $exam->id)->count();

            // Count correctly answered questions by the student
            $correctAnswers = StudentAnswer::whereIn('question_id', function ($query) use ($exam) {
                $query->select('id')
                    ->from('questions')
                    ->where('exam_id', $exam->id);
            })
                ->where('is_correct', true)
                ->count();

            // Get the result (score) for the logged-in student
            $user = auth()->user();
            $examStudent = ExamStudent::where('exam_id', $exam->id)
                ->where('student_id', $user->id)
                ->first();

            $totalScore = optional($examStudent)->result ?? 0;

            // Push the exam details to the array
            $examDetails[] = compact('exam', 'questionCount', 'correctAnswers', 'totalScore');
        }

        // Return view with all exams and their details
        return view('student.dashboard', compact('exams', 'examDetails', 'users', 'user'));
    }





}
