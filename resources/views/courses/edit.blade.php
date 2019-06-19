@extends('layouts.applayout')

@section('content')
    <div class="jumbotron">
        <h1>Edit Course</h1>
        <br><br><br>

        <form action="{{ route('courses.update', ['course' => $course->id]) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <h3><label for="Course Name:">Course Name</label> 
                <input class="form-control col-3 " name="courseName" value="{{ $course->courseName }}" /> </h3>
            </div>
            <div class="form-group">
                <h3><label for="Course Code:">Course Code</label>
                <input class="form-control col-3" name="courseCode" value="{{ $course->courseCode }}" /></h3>
            </div>
            <div class="form-group">
                <h3><label for="Course Type:">Course Type</label>
                <input class="form-control col-3" name="courseType" value="{{ $course->courseType }}" /></h3>
            </div>

            <br>
            <button type="submit" class="btn btn-primary">Update Course</button>
        </form>

        </div>
    <br>
    <br>
    <br>
    <hr class="my-4">
@endsection