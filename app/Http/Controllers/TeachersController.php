<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Course;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::orderBy('firstName')->paginate(8) ;
        return view('teachers.index')->with('teachers',$teachers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teachers.create');
    }

    public function storeCourse(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        $teacher->courses()->attach($request['course']);

        return redirect()->back()->with('success', 'Course Added Successfully');
    }

    public function removeCourse($id, $course)
    {
        $teacher = Teacher::find($id);
        $teacher->courses()->detach($course);

        return redirect()->back()->with('success', 'Course Removed Successfully');
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
            'email' => 'required',
            'password' => 'required'
        ]);

        $teacher = new Teacher;
        $teacher ->firstName = $request->input('firstName');
        $teacher ->lastName = $request->input('lastName');
        $teacher ->email = $request->input('email');
        $teacher ->password = $request->input('password');
        $teacher->save();

        return redirect('/teachers')->with('success','Teacher Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher= Teacher::find($id);
        $courses= $teacher->courses;
        $allCourses = Course::with('teachers')->whereDoesntHave('teachers', function($query) use ($id) {
                            $query->where('teacherID', $id);
                        })->orderBy('courseCode')->get();
        return view('teachers.show', ['teacher'=>$teacher, 'courses'=>$courses, 'allCourses' => $allCourses]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', ['teacher' => $teacher]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $teacher->update($request->all());

        return redirect('/teachers/' . $teacher->id)->with('success','Teacher Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->courses()->detach();
        $teacher->delete();

        return redirect('/teachers')->with('success','Teacher Deleted Successfully');
    }
}
