<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamModel;
use Illuminate\Http\Request;
use App\Models\User;

class StudentController extends Controller
{
    public function index()
    {
        return view('Student.student');
    }
        public function __construct()
        {
            $this->middleware('auth:sanctum'); // Ensure the request is authenticated with Sanctum
        }
        public function getTotalStudents(Request $request)
        {
            // Ensure the user is a teacher
            if ($request->user()->role !== 'teacher') {
                return response()->json(['error' => 'Unauthorized'], 403);
            }
    
            // Count the number of students in the system
            $totalStudents = User::where('role', 'student')->count();
    
            return response()->json(['total_students' => $totalStudents], 200);
        }
    }
