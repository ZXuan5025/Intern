@extends('master')
@section('content')
<html>
    <head>
        <meta charset="UTF-8">
        <title>Log in</title>
        <link rel="stylesheet" href="/style.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"/>
    </head>
    <body class="content-container">
        <div class="d-flex justify-content-center h-100 w-100">
        <div class="user_card">
        <div class="d-flex justify-content-center">        
        <div class="brand_logo_container">
            <img src="/book.jpg" class="brand_logo" alt="logo">  
        </div>      
        </div>
            <div class="d-flex justify-content-center form_container">
            @if(\Session::has('success'))
                 <div class="alert alert-success">
                     <p>{{ \Session::get('success') }}</p>
                    </div>
                    @endif
                <form method="post" action="/register">
                {{csrf_field()}}
                    <label for="ic"><b>IC</b></label>    
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" name="ic" placeholder="eg: xxxxxxxx" required="true" maxlength="12">
                    </div>
                    <label for="password"><b>Password</b></label>
                    <div class="input-group mb-3">
                        <input class="form-control" type="password" name="password" placeholder="Your Password" required="true"  minlength="8" maxlength="15">
                    </div>
                    <div class="d-flex justify-content-center mt-2 row-cols-sm-1">   
                    <input class="btn btn-primary" href="{{route('student.home')}}" type="submit" name="btnlogin" value="Login">
                    </div>
                    <small class="d-flex justify-content-center mt-2 links">
                        Have account? <a href="{{route('student.register')}}">Sign Up</a>
                    </small>
                  </form>
                </div>
            </div>
        </div>
    </body>
</html>