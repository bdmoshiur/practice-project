<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::simplePaginate(3);
        return view('student.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'roll' => 'required|max:20',
            'reg' => 'required|max:30',
            'phone' => 'required|min:11|numeric',
            'address' => 'required|max:100',
            'about' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $photo = '';
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $photo = time(). rand(1,999) . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $photo );
        }

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->roll = $request->roll;
        $student->reg = $request->reg;
        $student->address = $request->address;
        $student->phone = $request->phone;
        $student->about = $request->about;
        $student->photo = $photo;
        $student->save();

        Session::flash('message', 'Student Information Added Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student, $id)
    {
        $student = Student::find($id);
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student,$id)
    {

        $edit_student = Student::findOrFail($id);
        $students = Student::simplePaginate(3);
        return view('student.create', compact('edit_student','students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'roll' => 'required|max:20',
            'reg' => 'required|max:30',
            'phone' => 'required|min:11|numeric',
            'address' => 'required|max:100',
            'about' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $photo = '';
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $photo = time(). rand(1,999) . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $photo );
        }

        $student = Student::find($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->roll = $request->roll;
        $student->reg = $request->reg;
        $student->address = $request->address;
        $student->phone = $request->phone;
        $student->about = $request->about;
        $student->photo = $photo;

        $student->update();
        Session::flash('message', 'Student Information Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student, $id)
    {
        $student = Student::find($id);
        $image_path = public_path("images/{$student->photo}");

        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $student->delete();

        Session::flash('message', 'Student Deleted Successfully');
        return redirect()->back();
    }
}
