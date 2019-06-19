@extends('layouts.applayout')

@section('content')
    <div class="jumbotron">
        <h1>Students</h1>
        <br>
        @if(count($students)>0)
            @foreach ($students as $student)
                <div class ="card card-body bg-light">
                <h3><a href="{{route('students.show', $student->id)}}">{{$student->firstName}} {{$student->lastName}}</a></h3>                </div>
            @endforeach
            <br>
            {{$students->links()}}
        @else
            <h3>No Students Found</p>
        @endif
        <hr class="my-5">
    </div>

@endsection