<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy('firstName')->paginate(8);
        return view('students.index')->with('students',$students);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'academicID' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $student = new Student;
        $student ->firstName = $request->input('firstName');
        $student ->lastName = $request->input('lastName');
        $student ->level = $request->input('level');
        $student ->academicID = $request->input('academicID');
        $student ->email = $request->input('email');
        $student ->password = $request->input('password');
        $student ->save();

        return redirect('/students')->with('success','Student Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student= Student::find($id);
        $sessions= $student->sessions;
        return view('students.show',['student'=>$student,'sessions'=>$sessions]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'academicID' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $student->update($request->all());

        return redirect('/students/' . $student->id)->with('success','Student Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->sessions()->detach();
        $student->delete();

        return redirect('/students')->with('success','Student Deleted Successfully');
    }
}
