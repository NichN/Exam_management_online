<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryExamController extends Controller
{
    public function index()
    {
        $completedExams = Exam::with(['subject', 'teacher'])
            ->whereRaw("LOWER(status) = 'completed'")
            ->get();

        $upcomingExams = Exam::with(['subject', 'teacher'])
            ->whereRaw("LOWER(status) = 'scheduled'")
            ->get();

        // Debugging to check if exams exist
        if ($completedExams->isEmpty() && $upcomingExams->isEmpty()) {
            return "No exams found in the database. Please check your data.";
        }

        return view('Student.history_exam', compact('completedExams', 'upcomingExams'));
    }



    public function start($examId)
    {
        $exam = Exam::with(['subject', 'teacher', 'questions'])->findOrFail($examId);
        return view('Student.history_exam', compact('exam'));
    }


    public function completeExam($examId)
    {
        // Get the current exam
        $exam = Exam::findOrFail($examId);

        // Update the status to 'completed'
        $exam->status = 'completed';
        $exam->save();

        // Update the exam results or handle any other related updates
        $examResults = ExamResult::where('exam_id', $examId)->where('student_id', auth()->id())->first();
        if ($examResults) {
            $examResults->update(['status' => 'completed']);
        }

        return response()->json(['message' => 'Exam completed successfully.']);
    }

    public function showExamOverview()
    {
        // Get the completed and upcoming exams for the logged-in student
        $completedExams = Exam::whereHas('examResults', function ($query) {
            $query->where('student_id', auth()->id())->where('status', 'completed');
        })->get();

        $upcomingExams = Exam::whereDoesntHave('examResults', function ($query) {
            $query->where('student_id', auth()->id())->where('status', 'completed');
        })->where('start_time', '>', now())->get();

        return view('exam.overview', compact('completedExams', 'upcomingExams'));
    }

    public function showExamDetail($examId)
    {
        $exam = Exam::findOrFail($examId);
        $examResult = ExamResult::where('exam_id', $examId)->where('student_id', auth()->id())->first();

        // Check if the student already started or completed the exam
        $examStarted = $exam->start_time <= now();
        $examCompleted = $examResult && $examResult->status == 'completed';

        return view('exam.detail', compact('exam', 'examStarted', 'examCompleted'));
    }
}
