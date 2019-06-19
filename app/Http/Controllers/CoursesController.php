<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Teacher;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderBy('courseName')->paginate(8);
        return view('courses.index',['courses'=> $courses]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');

    }

    public function storeTeacher(Request $request, $id)
    {
        $course = Course::find($id);
        $course->teachers()->attach($request['teacher']);

        return redirect()->back();
    }

    public function removeTeacher($id, $teacher)
    {
        $course = Course::find($id);
        $course->teachers()->detach($teacher);

        return redirect()->back();
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
            'courseName' => 'required',
            'courseCode' => 'required',
            'courseType' => 'required'
        ]);

        $course = new Course;
        $course ->courseName = $request->input('courseName');
        $course ->courseCode = $request->input('courseCode');
        $course ->courseType = $request->input('courseType');
        $course->save();

        return redirect('/courses')->with('success','Course Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course= Course::find($id);
        $teachers= $course->teachers;
        $allTeachers = Teacher::with('courses')->whereDoesntHave('courses', function($query) use ($id) {
            $query->where('courseID', $id);
        })->orderBy('firstName')->get();
        return view('courses.show',['course'=>$course,'teachers'=>$teachers , 'allTeachers'=>$allTeachers]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('courses.edit', ['course' => $course]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $this->validate($request, [
            'courseName' => 'required',
            'courseCode' => 'required',
            'courseType' => 'required'
        ]);

        $course->update($request->all());

        return redirect('/courses/' . $course->id)->with('success','Course Updated Successfully');
    }
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->teachers()->detach();
        $course->delete();

        return redirect('/courses')->with('success','Course Deleted Successfully');
    }
}
