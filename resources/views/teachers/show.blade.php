@extends('layouts.applayout')


@section('content')
    <div class="jumbotron">

        <h1><strong>{{$teacher->firstName}} {{$teacher->lastName}}</strong></h1>
        <br>
        <h4>First Name: &nbsp  <strong> {{$teacher->firstName}} </strong></h4>
        <h4>Last Name:  &nbsp  <strong>{{$teacher->lastName}} </strong></h4>
        <h4>Email:   &nbsp <strong>{{$teacher->email}} </strong></h4>
        <h4>Password: &nbsp  <strong> {{$teacher->password}} </strong></h4>
        <br>
        <a href="/teachers" class="btn btn-primary btn-lg float-right">Back</a>
        <form action="{{ route('teachers.destroy', ['teacher' => $teacher->id]) }}" method="post">
            <a href="{{ route('teachers.edit', ['teacher' => $teacher->id]) }}" class="btn btn-primary btn-lg">Edit</a>
            @csrf
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger btn-lg">Delete</button>
        </form>
        <br>

         <hr class="my-5">
        <div class="form-inline float-right">
                <form action="{{ route('storeCourse', ['id' => $teacher->id]) }}" method="post" class="form-group col-lg-12" style=" float: right; font-size:20px">
                    @csrf 
                    <select name="course" class="form-control">
                        @foreach($allCourses as $selectedCourse)
                             <option value="{{ $selectedCourse->id }}">{{ $selectedCourse->courseCode }}- {{ $selectedCourse->courseName }}</option>
                        @endforeach
                    </select>
                    &nbsp&nbsp&nbsp&nbsp
                    <button type="submit" class="btn btn-success btn-md">Add Course</button>
                </form>
        </div>
        
        <br><br><br>
        <h2>Assigned Courses:</h2> 
         @if(count($courses)>0)
            @foreach ($courses as $course)
                <div class ="card card-body bg-light">
                <h3><a href="{{route('courses.show', $course->id)}}">{{$course->courseCode}} - {{$course->courseName}} ({{$course->courseType}})</a>
                <button type="button" class="close" aria-label="Close">
                    <a href="{{ route('removeCourse', ['id' => $teacher->id, 'course' => $course->id]) }}"><span aria-hidden="true">&times;</span></a>
                </button>
                </h3> </div>
            @endforeach
            <br>
            <br>
            
        @else
            <h3><br>&nbsp&nbsp&nbsp&nbsp&nbsp There's no courses assigned</p>
            <br>
            
        @endif
        <hr class="my-5">
    </div>
@endsection
