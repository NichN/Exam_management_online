<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $department= Department::with('courses.subjects')->get();
        return response()->json($department,200);
    }

    public function getCourses($id)
    {
        try {
            $department = Department::with('courses')->findOrFail($id);
            return response()->json([
                'department' => $department,
                'courses' => $department->courses,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Department or courses not found.',
                'error' => $e->getMessage(),
            ], 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:departments,name',
                'description' => 'nullable|string',
            ]);

            $department = \DB::transaction(function () use ($validated) {
                return Department::create($validated);
            });

            return response()->json([
                'message' => 'Department created successfully!',
                'department' => $department,
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create department.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function storeCourse(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);

            $department = Department::findOrFail($id);

            $course = $department->courses()->create([
                'name' => $validated['name'],
                'description' => $validated['description'],
            ]);

            return response()->json([
                'message' => 'Course created successfully!',
                'course' => $course,
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create course.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $department->update($validated);
        return response()->json($department, 200);
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return response()->json(null, 204);
    }
    public function storeSubject(Request $request, $departmentId, $courseId)
{
    try {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $department = Department::findOrFail($departmentId);
        $course = $department->courses()->findOrFail($courseId);
        $subject = $course->subjects()->create([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);

        return response()->json([
            'message' => 'Subject created successfully!',
            'subject' => $subject,
        ], 201);

    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Failed to create subject.',
            'error' => $e->getMessage(),
        ], 500);
    }
}

}
