<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoryExamController extends Controller
{
    public function index()
    {
        return view('Student.history_exam');
    }
}
