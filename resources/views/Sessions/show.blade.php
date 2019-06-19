@extends('layouts.applayout')


@section('content')
    <div class="jumbotron">

        <h1><strong>Session {{$session->id}} </strong></h1>
        <br>
        <h4>Week: &nbsp  <strong> {{$session->week}} </strong></h4>
        <h4>Session Time:  &nbsp  <strong>{{$session->sessionTime}} </strong></h4>
        <h4>Course ID:   &nbsp&nbsp <strong> <a href="{{route('courses.show', $session->courseId)}}"> {{$session->courseId}}</a></strong></h4> 
        <h4>Teacher ID:   &nbsp <strong> <a href="{{route('teachers.show', $session->teacherId)}}"> {{$session->teacherId}}</a></strong></h4> 

        <a href="/sessions" class="btn btn-primary btn-lg float-right">Back</a><br>
        <hr class="my-5">

        <!--  -->

        <h2>Student Attendance:</h2>

        <br>
        @if(count($students)>0)
            <?php $yes = 0; $no = 0;  ?>
            @foreach ($students as $student)
               
                @if( $student->pivot->attended )  
                    <a href="{{route('students.show', $student->id)}}" class="btn btn-success btn-lg btn-block" style="max-width: 35rem; text-align:left; font-size:20px;">&nbsp&nbsp ID: &nbsp {{$student->academicID}} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Name: &nbsp {{$student->firstName}} {{$student->lastName}}</a>
                    <?php $yes +=1  ?>
                @else
                    <a href="{{route('students.show', $student->id)}}" class="btn btn-danger btn-lg btn-block" style="max-width: 35rem; text-align:left; font-size:20px;">&nbsp&nbsp ID: &nbsp {{$student->academicID}} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Name: &nbsp {{$student->firstName}} {{$student->lastName}}</a>
                    <?php $no +=1  ?>
                @endif
                
            @endforeach
            <br><br><br><br>
           <h3> Attended Students: {{$yes}} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Absent Students: {{$no}} </h3>
            <br>
        @else
            <h3><br>&nbsp&nbsp&nbsp&nbsp&nbsp There's no Students Attended</p>
            <br>

        @endif
         <hr class="my-5">
   



    </div>

@endsection
