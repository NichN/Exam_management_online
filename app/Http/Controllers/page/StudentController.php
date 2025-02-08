<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\User;
use Illuminate\Http\Request;


class StudentController extends Controller
{

    public function index()
    {
        return view('Student.student');
    }
        public function __construct()
        {
            $this->middleware('auth:sanctum'); 
        }
        public function getTotalStudents(Request $request)
        {
            if ($request->user()->role !== 'teacher') {
                return response()->json(['error' => 'Unauthorized'], 403);
            }
            $totalStudents = User::where('role', 'student')->count();
    
            return response()->json(['total_students' => $totalStudents], 200);
        }
        public function showStudentDetails($id)
        {
            $student = User::with('department')->where('role', 'student')->find($id);
            if (!$student) {
                return response()->json(['error' => 'Student not found'], 404);
            }
            return response()->json($student);
        }
        public function showDetail($id)
        {
            $student = User::with('department')->find($id);
            if (!$student) {
                abort(404, 'Student not found');
            }
            return view('Admin.student_detail_screen', compact('student'));
        }
        

}
