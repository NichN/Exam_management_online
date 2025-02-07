<?php

namespace App\Http\Controllers;

use App\Models\SubjectTeacher;
use App\Models\User;
use Illuminate\Http\Request;

class SubjectTeacherController extends Controller
{
    public function index()
    {
        $data = SubjectTeacher::with(['subject', 'teacher'])->get();
        return response()->json($data, 200);
    }

    // ✅ Assign a teacher to a subject
    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'teacher_id' => 'required|exists:users,id'
        ]);

        // Ensure user is a teacher
        $teacher = User::where('id', $request->teacher_id)->where('role', 'teacher')->first();
        if (!$teacher) {
            return response()->json(['error' => 'User is not a teacher'], 400);
        }

        $subjectTeacher = SubjectTeacher::create([
            'subject_id' => $request->subject_id,
            'teacher_id' => $request->teacher_id
        ]);

        return response()->json($subjectTeacher, 201);
    }

    // ✅ Fetch all teachers for a specific subject
    public function getTeachersBySubject($subject_id)
    {
        $teachers = SubjectTeacher::where('subject_id', $subject_id)
            ->with('teacher')
            ->get();

        return response()->json($teachers, 200);
    }

    // ✅ Delete a subject-teacher assignment
    public function destroy($id)
    {
        $subjectTeacher = SubjectTeacher::find($id);
        if (!$subjectTeacher) {
            return response()->json(['error' => 'Not found'], 404);
        }

        $subjectTeacher->delete();
        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
