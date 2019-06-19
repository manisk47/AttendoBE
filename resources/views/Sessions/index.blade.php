@extends('layouts.applayout')

@section('content')
    <div class="jumbotron">
        <h1>Sessions</h1>
        <br>
        @if(count($sessions)>0)
            @foreach ($sessions as $session)
                <div class ="card card-body bg-light">
                <h3><a href="{{route('sessions.show', $session->id)}}">Session {{$session->id}} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ({{$name= App\course::find($session->courseId)->courseName}} -  {{$name= App\course::find($session->courseId)->courseType}} - Week {{$session->week}})</a></h3>  </div>
            @endforeach
            <br>
            {{$sessions->links()}}
        @else
            <h3>No Sessions Found</p>
        @endif
        <hr class="my-5">
    </div>

@endsection