<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class ApiController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json(['student'=>$students],200);
    }

    public function show($id)
    {
        $students = Student::find($id);
        return response()->json(['student'=>$students],200);
    }
}
