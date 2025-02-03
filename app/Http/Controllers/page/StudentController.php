<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Exam;

class StudentController extends Controller
{

    public function index()
    {
        return view('Student.student');
    }

}
