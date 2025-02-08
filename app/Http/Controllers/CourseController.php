<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Department;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('subjects')->get();
        return response()->json($courses, 200);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:departments,name',
                'description' => 'nullable|string',
                'courses' => 'nullable|array',
                'courses.*.name' => 'required|string|max:255',
                'courses.*.description' => 'nullable|string',
            ]);

            $department = \DB::transaction(function () use ($validated) {
                $department = Department::create([
                    'name' => $validated['name'],
                    'description' => $validated['description'] ?? null,
                ]);

                if (!empty($validated['courses'])) {
                    foreach ($validated['courses'] as $courseData) {
                        $department->courses()->create($courseData);
                    }
                }

                return $department;
            });

            return response()->json([
                'message' => 'Department and courses created successfully!',
                'department' => $department->load('courses'),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create department and courses.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        $course = Course::with(['department', 'subjects'])->findOrFail($id);
        return response()->json($course, 200);
    }

    public function showDepartmentCourses($id)
    {
        $department = Department::with('courses.subjects')->find($id);

        if (!$department) {
            return abort(404, 'Department not found');
        }

        return view('Admin.major', ['department' => $department]);
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'department_id' => 'sometimes|required|exists:departments,id',
        ]);

        $course->update($validated);

        return response()->json($course->load('department'), 200);
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return response()->json(['message' => 'Course deleted successfully'], 204);
    }
}
