@extends('layouts.applayout')


@section('content')
    <div class="jumbotron">
        <h1><strong>{{$student->firstName}} {{$student->lastName}}</strong></h1>
        <br>
        <h4>First Name: &nbsp <strong>{{$student->firstName}} </strong></h4>
        <h4>Last Name:  &nbsp <strong>{{$student->lastName}}</strong> </h4>
        <h4>Academic ID:  &nbsp <strong>{{$student->academicID}} </strong></h4>
        <h4>Level: &nbsp <strong>{{$student->level}} </strong></h4>
        <h4>Email:  &nbsp <strong>{{$student->email}} </strong></h4>
        <h4>Password:  &nbsp<strong>{{$student->password}} </strong></h4>
        <a href="/students" class="btn btn-primary btn-lg float-right">Back</a>
         <br>
         <form action="{{ route('students.destroy', ['student' => $student->id]) }}" method="post">
            <a href="{{ route('students.edit', ['student' => $student->id]) }}" class="btn btn-primary btn-lg">Edit</a>
            @csrf
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger btn-lg">Delete</button>
        </form>
        <br>

        <hr class="my-5">

       <h2>Assigned Sessions:</h2>

        <br>
       @if(count($sessions)>0)
            <?php $yes = 0; $no = 0;  ?>
            @foreach ($sessions as $session)
               
                @if( $session->pivot->attended )  
                    <a href="{{route('sessions.show', $session->id)}}" class="btn btn-success btn-lg btn-block" style="max-width: 40rem; text-align:left; font-size:20px;">&nbsp&nbsp Session {{$session->id}} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ({{$name= App\course::find($session->courseId)->courseName}} -  {{$name= App\course::find($session->courseId)->courseType}} - Week {{$session->week}})   </a>
                    <?php $yes +=1  ?>
                @else
                    <a href="{{route('sessions.show', $session->id)}}" class="btn btn-danger btn-lg btn-block" style="max-width: 40rem; text-align:left; font-size:20px;">&nbsp&nbsp Session {{$session->id}} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ({{$name= App\course::find($session->courseId)->courseName}} - {{$name= App\course::find($session->courseId)->courseType}} - Week {{$session->week}})   </a>
                    <?php $no +=1  ?>
                @endif
                
            @endforeach
            <br><br><br><br>
           <h3> Attended Sessions: {{$yes}} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Absent Sessions: {{$no}} </h3>
            <br>
        @else
            <h3><br>&nbsp&nbsp&nbsp&nbsp&nbsp There's no Students Attended</p>
            <br>

        @endif
         <hr class="my-5">
   



    </div>

@endsection