<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyScheduleController extends Controller
{

    public function index()
    {
        return view('Student.my_schedule');
    }
}
