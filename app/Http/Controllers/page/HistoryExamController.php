<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;

class HistoryExamController extends Controller
{
    public function index()
    {
        $completedExams = Exam::where('status', 'completed')->get();
        $upcomingExams = Exam::where('status', 'scheduled')->get();
        return view('Student.history_exam', compact('completedExams', 'upcomingExams'));
    }
}
