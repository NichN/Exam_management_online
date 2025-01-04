<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Response::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'user_id' => 'required|integer|exists:users,id',
                'question_id' => 'required|integer|exists:question,question_id',
                'answer_id' => 'required|integer|exists:answer,answer_id'
            ]);

            $response = Response::create($validated);

            return response()->json($response, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation Error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            \Log::error('Error creating response: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $response = Response::findOrFail($id);
            return response()->json($response, 200);
        } catch (\Exception $e) {
            \Log::error('Error fetching response: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Response $response)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $response = Response::findOrFail($id);
            $validated = $request->validate([
                'user_id' => 'required|integer|exists:users,id',
                'question_id' => 'required|integer|exists:question,question_id',
                'answer_id' => 'required|integer|exists:answer,answer_id'
            ]);
            $response->update($validated);
            return response()->json($response, 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validation Error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            \Log::error('Error updating response: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $response = Response::findOrFail($id);
            $response->delete();
            return response()->json(['message' => 'Response deleted successfully'], 200);
        } catch (\Exception $e) {
            \Log::error('Error deleting response: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
        }
    }
}
