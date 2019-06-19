@extends('layouts.applayout')

@section('content')
    <div class="jumbotron">
        <h1>Add New Course</h1>
        <br><br><br>

        {!! Form::open (['action' => 'CoursesController@store' , 'method' => 'Post']) !!}
        
        <div class="form-group">
        <h3>{{Form::label('courseName','Course Name:')}} &nbsp
        {{Form::text('courseName', '')}} </h3>
        </div>

        <div class="form-group">
        <h3>{{Form::label('courseCode','Course Code:')}} &nbsp&nbsp
        {{Form::text('courseCode', '')}} </h3>
        </div>

        <div class="form-group">
        <h3>{{Form::label('courseType','Course Type:')}} &nbsp&nbsp
        {{Form::text('courseType', '')}} </h3>
        </div>

        {{Form::submit('Submit',['class'=>'btn btn-success btn-lg float-right'])}}


    {!! Form::close()!!}
    <br>
    <br>
    <br>
    <hr class="my-4">

@endsection