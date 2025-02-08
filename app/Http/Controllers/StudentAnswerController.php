<?php
namespace App\Http\Controllers;

use App\Models\ExamStudent;
use App\Models\StudentAnswer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StudentAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(StudentAnswer::with('question')->get());
    }

    /**
     * Store a newly created resource in storage (Student submitting answers).
     */
    public function store(Request $request)
    {
        // Log request data to see what is being sent
        Log::info('Request Data: ', $request->all());

        // Validate incoming data
        $request->validate([
            'exam_id' => 'required|integer',
            'student_id' => 'required|integer',
            'answers' => 'required|array',
            'answers.*.question_id' => 'required|integer',
            'answers.*.answer' => 'required|string',
        ]);

        $examId = $request->exam_id;
        $studentId = $request->student_id;
        $totalQuestions = 0;
        $correctAnswers = 0;

        try {
            foreach ($request->answers as $answerData) {
                $question = Question::find($answerData['question_id']);
                if (!$question) {
                    continue;
                }

                $isCorrect = $question->correct_answer === $answerData['answer'];
                if ($isCorrect) {
                    $correctAnswers++;
                }
                $totalQuestions++;

                // Save or update the student answer record
                StudentAnswer::updateOrCreate(
                    [
                        'question_id' => $answerData['question_id'],
                        'student_id' => $studentId,
                    ],
                    [
                        'answer' => $answerData['answer'],
                        'is_correct' => $isCorrect,
                    ]
                );
            }

            // Calculate the score
            $score = ($totalQuestions > 0) ? ($correctAnswers / $totalQuestions) * 100 : 0;

            // Save the score to the exam_student table
            ExamStudent::updateOrCreate(
                [
                    'exam_id' => $examId,
                    'student_id' => $studentId,
                ],
                [
                    'result' => $score,
                ]
            );

            // Log the score for debugging
            Log::info('Calculated Score: ' . $score);

            // Return the response with the calculated score
            return response()->json([
                'message' => 'Answers submitted successfully',
                'score' => $score,
            ]);

        } catch (\Exception $e) {
            // Log the exception to catch any errors
            Log::error('Error occurred: ' . $e->getMessage());
            return response()->json(['message' => 'An error occurred.', 'error' => $e->getMessage()], 500);
        }
    }
    public function getStudentAnswers($studentId)
    {
        // Fetch answers based on student ID
        $answers = StudentAnswer::where('student_id', $studentId)->get();

        // Check if answers exist
        if ($answers->isEmpty()) {
            return response()->json(['message' => 'No answers found for this student'], 404);
        }

        return response()->json($answers, 200);
    }
}
