<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $users = User::with(relations: 'department')->get();
        return view('student.dashboard', compact('users'));
    }

    /**
     * Get a specific user with department details.
     */
    public function show($id)
    {
        $user = User::with('department')->findOrFail($id);
        return response()->json($user);
    }




}
