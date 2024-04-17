<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('students.index', [
            'students' => Student::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request) : RedirectResponse
    {
        Student::create($request->all());
        return redirect()->route('students.index')
                ->withSuccess('New Student is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $Student) : View
    {
        return view('students.show', [
            'Student' => $Student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $Student) : View
    {
        return view('students.edit', [
            'Student' => $Student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student) : RedirectResponse
    {
        $student->update($request->all());
        return redirect()->back()
                ->withSuccess('Student is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $Student) : RedirectResponse
    {
        $Student->delete();
        return redirect()->route('students.index')
                ->withSuccess('Student is deleted successfully.');
    }
}
