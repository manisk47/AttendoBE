@extends('layouts.applayout')

@section('content')
    <div class="jumbotron">
        <h1>Edit Student</h1>
        <br><br><br>

        <form action="{{ route('students.update', ['student' => $student->id]) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <h3><label for="First Name:">First Name</label> 
                <input class="form-control col-3 " name="firstName" value="{{ $student->firstName }}" /> </h3>
            </div>
            <div class="form-group">
                <h3><label for="Last Name:">Last Name</label>
                <input class="form-control col-3" name="lastName" value="{{ $student->lastName }}" /></h3>
            </div>
            <div class="form-group">
                <h3><label for="Level:">Email</label>
                <input class="form-control col-3" name="level" value="{{ $student->level }}" /></h3>
            </div>
            <div class="form-group">
                <h3><label for="Academic ID:">Email</label>
                <input class="form-control col-3" name="academicID" value="{{ $student->academicID }}" /></h3>
            </div>
            <div class="form-group">
                <h3><label for="Email:">Email</label>
                <input class="form-control col-3" name="email" value="{{ $student->email }}" /></h3>
            </div>
            <div class="form-group">
                <h3><label for="Password:">Password</label>
                <input class="form-control col-3" name="password" value="{{ $student->password }}" /></h3>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Update Student</button>
        </form>

        </div>
    <br>
    <br>
    <br>
    <hr class="my-4">
@endsection