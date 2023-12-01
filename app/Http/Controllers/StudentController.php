<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = Student::create($request->all());
        // $student = Student::create([
        //     "first_name"=> $request->first_name,
        //     "last_name"=> $request->last_name,
        //     "email"=> $request->email,
        //     "rank"=> $request->rank,
        // ]);
        return response()->json($student, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //$student = Student::findOrFail($id);
        $student = Student::find($id);
        if ($student == null) {
            return response()->json(["message"=> "no students found"],404);
        }
        return response()->json($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
        if ($student == null) {
            return response()->json(["message"=> "no students found"],404);
        }
        $student->update($request->all());
        return response()->json($student, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        if ($student == null) {
            return response()->json(["message"=> "no students found"],404);
        }
        $student->delete();
        return response(204);
    }
}
