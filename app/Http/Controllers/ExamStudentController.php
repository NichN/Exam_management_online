<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\ExamStudent;
use Illuminate\Http\Request;
use App\Models\StudentAnswer;

class ExamStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $examStudents = ExamStudent::with('exam', 'student')->get();
        return response()->json($examStudents);
    }


    public function getScore($examId, $studentId)
    {
        $examResult = ExamStudent::where('exam_id', $examId)
            ->where('student_id', $studentId)
            ->first();

        if (!$examResult) {
            return response()->json(['message' => 'No score found'], 404);
        }

        return response()->json([
            'exam_id' => $examId,
            'student_id' => $studentId,
            'score' => $examResult->result,
        ]);
    }


    public function showExamResult($examId, $studentId)
    {
        $examResult = ExamStudent::where('exam_id', $examId)
            ->where('student_id', $studentId)
            ->first();

        return view('exam.result', ['examResult' => $examResult]);
    }




    /**
     * Show details for a specific exam-student relationship.
     */
    public function show($id)
    {
        $examStudent = ExamStudent::with('exam', 'student')->findOrFail($id);
        return response()->json($examStudent);
    }

    /**
     * Associate a student with an exam.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'exam_id' => 'required|exists:exams,id',
            'student_id' => 'required|exists:users,id',
        ]);

        // Ensure no duplicate entries
        $exists = ExamStudent::where('exam_id', $validated['exam_id'])
            ->where('student_id', $validated['student_id'])
            ->exists();

        if ($exists) {
            return response()->json(['error' => 'Student is already associated with this exam'], 400);
        }

        // Create new record with result defaulted to 0
        $examStudent = ExamStudent::create([
            'exam_id' => $validated['exam_id'],
            'student_id' => $validated['student_id'],
            'result' => 0,
        ]);

        return response()->json($examStudent, 201);
    }


    /**
     * Calculate and update the total score of a student for a specific exam.
     */
    public function updateScore($examId, $studentId)
    {
        // Check if the student is associated with the exam
        $examStudent = ExamStudent::where('exam_id', $examId)
            ->where('student_id', $studentId)
            ->firstOrFail();

        // Calculate total points from student answers for this exam
        $totalScore = StudentAnswer::where('student_id', $studentId)
            ->whereHas('question', function ($query) use ($examId) {
                $query->where('exam_id', $examId); // Filter questions related to the exam
            })
            ->sum('points'); // Sum the points of all correct answers

        // Update the result in the `exam_student` table
        $examStudent->update([
            'result' => $totalScore,
        ]);

        return response()->json([
            'message' => 'Score updated successfully',
            'total_score' => $totalScore,
        ]);
    }
    /**
     * Delete a specific exam-student relationship.
     */
    public function destroy($id)
    {
        $examStudent = ExamStudent::findOrFail($id);
        $examStudent->delete();
        return response()->json(['message' => 'Exam-student relationship deleted successfully']);
    }
}
