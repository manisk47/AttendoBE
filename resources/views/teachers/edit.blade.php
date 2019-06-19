@extends('layouts.applayout')

@section('content')
    <div class="jumbotron">
        <h1>Edit Teacher</h1>
        <br><br><br>

        <form action="{{ route('teachers.update', ['teacher' => $teacher->id]) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <h3><label for="First Name:">First Name</label> &nbsp&nbsp
                <input class="form-control col-3 " name="firstName" value="{{ $teacher->firstName }}" /> </h3>
            </div>
            <div class="form-group">
                <h3><label for="Last Name:">Last Name</label>
                <input class="form-control col-3" name="lastName" value="{{ $teacher->lastName }}" /></h3>
            </div>
            <div class="form-group">
                <h3><label for="Email:">Email</label>
                <input class="form-control col-3" name="email" value="{{ $teacher->email }}" /></h3>
            </div>
            <div class="form-group">
                <h3><label for="Password:">Password</label>
                <input class="form-control col-3" name="password" value="{{ $teacher->password }}" /></h3>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Update Teacher</button>
        </form>

        </div>
    <br>
    <br>
    <br>
    <hr class="my-4">
@endsection