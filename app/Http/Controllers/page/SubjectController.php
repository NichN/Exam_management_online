<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
//        $subject = Subject::with('teachers')->find($subjectId);
//        foreach ($subject->teachers as $teacher) {
//            echo $teacher->name;
//        }

        return view('Student.subject');
    }
}
