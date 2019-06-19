@extends('layouts.applayout')

@section('content')
    <div class="jumbotron">
        <h1>Add New Student</h1>
        <br><br><br>

        {!! Form::open (['action' => 'StudentsController@store' , 'method' => 'Post']) !!}
        
        <div class="form-group">
        <h3>{{Form::label('firstName','First Name:')}} &nbsp&nbsp&nbsp&nbsp&nbsp
        {{Form::text('firstName', '')}} </h3>
        </div>

        <div class="form-group">
        <h3>{{Form::label('lasttName','Last Name:')}} &nbsp&nbsp&nbsp&nbsp&nbsp
        {{Form::text('lastName', '')}} </h3>
        </div>

        <div class="form-group">
        <h3>{{Form::label('level','Level:')}} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        {{Form::text('level', '')}} </h3>
        </div>

        <div class="form-group">
        <h3>{{Form::label('academicID','Academic ID:')}} &nbsp
        {{Form::text('academicID', '')}} </h3>
        </div>

        <div class="form-group">
        <h3>{{Form::label('email','Email:')}} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        {{Form::text('email', '')}} </h3>
        </div>

        <div class="form-group">
        <h3>{{Form::label('password','Password:')}} &nbsp&nbsp&nbsp&nbsp&nbsp
        {{Form::text('password', '')}} </h3>
        </div>



        {{Form::submit('Submit',['class'=>'btn btn-success btn-lg float-right'])}}


    {!! Form::close()!!}

    <br>
    <br>
    <br>
    <hr class="my-4">

@endsection