<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        return view('Student.exams');
    }

    public function exampage()
    {
        return view('Student.exam_page');
    }
}
