@extends('layouts.applayout')

@section('content')
    <div class="jumbotron">
        <h1>Courses</h1>
        <br>
        @if(count($courses)>0)
            @foreach ($courses as $course)
                <div class ="card card-body bg-light">
                <h3><a href="{{route('courses.show', $course->id)}}">{{$course->courseCode}} - {{$course->courseName}} ({{$course->courseType}})</a></h3> </div>
            @endforeach
            <br>
            {{$courses->links()}}
        @else
            <h3>No Courses Found</p>
        @endif
        <hr class="my-5">
    </div>

@endsection