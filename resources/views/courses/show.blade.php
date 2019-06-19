@extends('layouts.applayout')


@section('content')
    <div class="jumbotron">
        <h1><strong>{{$course->courseCode}} - {{$course->courseName}} ({{$course->courseType}})</strong></h1>
        <br>
        <h4>Course Code:  &nbsp  <strong>{{$course->courseCode}}</strong> </h4>
        <h4>Course Name: &nbsp  <strong> {{$course->courseName}} </strong></h4>
        <h4>Course Type: &nbsp  <strong> {{$course->courseType}}</strong> </h4>

        <a href="/courses" class="btn btn-primary btn-lg float-right">Back</a><br>
        <br>
        <form action="{{ route('courses.destroy', ['course' => $course->id]) }}" method="post">
            <a href="{{ route('courses.edit', ['course' => $course->id]) }}" class="btn btn-primary btn-lg">Edit</a>
            @csrf
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger btn-lg">Delete</button>
        </form>
        <br>

        <hr class="my-5">

        <div class="form-inline float-right">
                <form action="{{ route('storeTeacher', ['id' => $course->id]) }}" method="post" class="form-group col-lg-12" style=" float: right; font-size:20px">
                    @csrf
                    
                    <select name="teacher" class="form-control">
                        @foreach($allTeachers as $selectedTeacher)
                             <option value="{{ $selectedTeacher->id }}">{{ $selectedTeacher->firstName }} {{ $selectedTeacher->lastName }}</option>
                        @endforeach
                    </select>
                    &nbsp&nbsp&nbsp&nbsp
                    <button type="submit" class="btn btn-success btn-md">Add Teacher</button>
                
                </form>
        </div>
        <br><br><br>
        <h2>Assigned Teachers:</h2>
        @if(count($teachers)>0)
            @foreach ($teachers as $teacher)
                <div class ="card card-body bg-light">
                <h3><a href="{{route('teachers.show', $teacher->id)}}">{{$teacher->firstName}} {{$teacher->lastName}}</a>               
                <button type="button" class="close" aria-label="Close">
                    <a href="{{ route('removeTeacher', ['id' => $course->id, 'teacher' => $teacher->id]) }}"><span aria-hidden="true">&times;</span></a>
                </button> 
                </h3> </div>          
            @endforeach
            <br>
             <br>
        @else
            <h3><br>&nbsp&nbsp&nbsp&nbsp&nbsp There's no teachers assigned</p>
            <br>

        @endif
         <hr class="my-5">
   

    </div>

@endsection