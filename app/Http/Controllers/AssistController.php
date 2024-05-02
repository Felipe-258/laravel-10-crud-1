<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class AssistController extends Controller
{
    public function show(Student $student) : View
    {
        $total = DB::table('assists')->where('student_id', $student->id)->count();
        $assists = DB::table('assists')->where('student_id', $student->id)->get();
        /* dd($assists); */
        //           carpeta  archivo
        return view('students.assist', [
            'student' => $student,
            'total' => $total,
            'assists' => $assists
        ]);
    }
}

