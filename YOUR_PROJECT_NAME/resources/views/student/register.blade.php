@extends('master')
@section('content')
<!DOCTYPE html> 
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Registration</title>
        <link rel="stylesheet" href="/style.css"/>
        <link rel="stylesheet" href="/css/bootstrap.min.css"/>
</head>
    <body class="container"> 
        <div class="main">
        <div class="container h-100">
            <div class="d-flex justify-content-center h-100">
                <div class="main">
                <div class="regform"><h1>Registration</h1>
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                 </div>
                 @endif
                 @if(\Session::has('success'))
                 <div class="alert alert-success">
                     <p>{{ \Session::get('success') }}</p>
                    </div>
                    @endif
                <form method="post" action="/signin">
                {{csrf_field()}}
                <label for="ic"><b>IC</b></label>
                <input class="form-control" name="ic" type="text" maxlength="12" required="true" value="{{ old('ic') }}"/>
                 
                <label for="name"><b>Name</b></label>
                <input class="form-control" name="name" type="text" maxlength="30" required="true" value="{{ old('name') }}"/>
             
                <label for="email"><b>Email Address</b></label>
                <input class="form-control" name="email" type="email" maxlength="50" required="true"value="{{ old('email') }}"/>

                <label for="phone"><b>Phone Number</b></label>
                <input class="form-control" name="phoneno" type="text" maxlength="11" required="true" value="{{ old('phoneno') }}"/>
                
                <label for="password"><b>Password</b></label>
                <input class="form-control" name="password" type="password" maxlength="15" minlength="8" required="true" value="{{ old('password') }}"/>
                
                <label for="cPassword"><b>Confirm Password</b></label>
                <input class="form-control" name="cPassword" type="password" maxlength="15" minlength="8" required="true" value="{{ old('password') }}"/>
                <hr class="mb-3">
                <div class="row-cols-sm-1">
                <input class="btn btn-primary" href="{{route('student.signin')}}" id="register" type="submit" name="submit" value="Sign Up"/>
                </div>
                </div>
            </form>
        </div>
      </div>
        </div>
        </div>
    </body>
</html>
@endsection