<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Subject;


class SubjectTeacherController extends Controller
{
    public function showSubjectsForStudent()
    {
        $user = auth()->user(); // Get logged-in student
        if (!$user || $user->role !== 'student') {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        // Fetch subjects assigned to the student's department, eager loading the teacher (from Users table)
        $subjects = Subject::whereHas('course', function ($query) use ($user) {
            $query->where('department_id', $user->department_id);
        })
            ->with('subjectTeachers.teacher')  // Eager load the subjectTeachers and their teacher
            ->get();

        // Debug: Check the fetched subjects and teachers
        dd($subjects);

        return view('student.subject', compact('subjects'));
    }



}
