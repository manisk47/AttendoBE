@extends('layouts.applayout')

@section('content')
    <div class="jumbotron">
        <h1>Teachers</h1>
        <br>
        @if(count($teachers)>0)
            @foreach ($teachers as $teacher)
                <div class ="card card-body bg-light">
                <h3><a href="{{route('teachers.show', $teacher->id)}}">{{$teacher->firstName}} {{$teacher->lastName}}</a></h3> </div>
            @endforeach
            <br>
            {{$teachers->links()}}
        @else
            <h3>No Teachers Found</p>
        @endif
        <hr class="my-5">
    </div>

@endsection