<?php

namespace App\Http\Controllers;

use App\DocumentType;
use App\Http\Requests\StudentRequest;
use App\Nationality;
use App\Student;
use App\StudentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('haveaccess','student.index');

        $students = Student::paginate(5);

        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('haveaccess','student.create');

        $student_types = StudentType::all();
        $nationalities = Nationality::all();
        $document_types = DocumentType::all();

        return view('student.create', compact('student_types', 'nationalities', 'document_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        Gate::authorize('haveaccess','student.create');

        Student::create($request->all());

        //if ($request->get('permission')) {
        //return $request->all();
        //$student->permissions()->sync($request->get('permission'));
        //}

        return redirect()->route('student.index')
            ->with('status_success','Student saved success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        Gate::authorize('haveaccess','student.show');

        $student_type = StudentType::find($student->student_type_id);
        $nationality = Nationality::find($student->nationality_id);
        $document_type = DocumentType::find($student->document_type_id);

        return view('student.view', compact('student', 'student_type', 'nationality', 'document_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        Gate::authorize('haveaccess','student.edit');

        $student_types = StudentType::all();
        $nationalities = Nationality::all();
        $document_types = DocumentType::all();

        return view('student.edit', compact('student', 'student_types', 'nationalities', 'document_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        Gate::authorize('haveaccess','student.edit');

        $request->validate([
            'first_name'        => 'required|max:50',
            'last_name'         => 'required|max:50',
            'student_type_id'   => 'required',
            'nationality_id'    => 'required',
            'document_type_id'  => 'required',
            'document_number'   => 'required',
            'file_number'       => 'required|unique:students,file_number,'.$student->id,
            'phone_number'      => 'required',
            'email'             => 'required|unique:students,email,'.$student->id,
        ]);

        $student->update($request->all());

        return redirect()->route('student.index')
            ->with('status_success','Student updated success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Gate::authorize('haveaccess','student.destroy');

        $student->delete();

        return back();
    }
}
