<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["signin"]) || $_SESSION["signin"] !== true){
    header("location: /signin");
    exit;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Profile</title>
        <link rel="stylesheet" href="/style1.css"/>
        <link href="ks.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            body{
                background-color: white;
            }
            .icon{
                background-color: #770115;
                border: none;
                color: white;
                text-align: center;
                border-radius: 50%;
                padding: 20px;
                font-size: 20px;
                margin-right: 20px;
            }
            input[type=email], select , input[type=text], input[type=password]{
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }
            input[type=submit] {
                width: 200px;
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type=submit]:hover {
                background-color: #45a049;
            }
            input[type=reset] {
                width: 200px;
                background-color: #FFDE33;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            input[type=reset]:hover {
                background-color: #F5D430;
            }
            .profile {
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 20px;
                width: 100%;
            }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <label class="logo">Western Library</label> 
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('student.home')}}">About Us <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('student.contact')}}">Contact Us<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('student.profile')}}">Profile<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
      <a href="{{route('student.signin')}}" onclick='return alertFunction();'>Log Out</a>
      </li>
    </ul>
    </nav>
        <br><br>
        <section>
            <div class="container">
                <h3 style="color:#770115;">Profile</h3>
                <div class="cards">
                    <div class="profile">
                    <h2 style="padding-bottom:10px;">Personal Information</h2>
                   <form action="{{url('update')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name"><b>IC</b><b style="color: red; font-weight:100;"> &nbsp;&nbsp;*This feild can't be modify*</b></label>
                            <input class="form-control" name="c_ic" type="text" maxlength="30" required="true" value="<?php echo htmlspecialchars($_SESSION["ic"]);?>" readonly/>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="name"><b>Name</b></label>
                            <input class="form-control" name="c_name" type="text" maxlength="30" required="true" value="<?php echo htmlspecialchars($_SESSION["name"]); ?>"/>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="email"><b>Email Address</b></label>
                            <input class="form-control" name="c_email" type="email" maxlength="50" required="true" value="<?php echo htmlspecialchars($_SESSION["email"]); ?>"/>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="phone"><b>Phone Number</b></label>
                            <input class="form-control" name="c_phoneno" title="Phone number must be in numeric" type="text" minlength="10" maxlength="11" pattern="\d*" required="true" value="<?php echo htmlspecialchars($_SESSION["phoneno"]); ?>"/>
                        </div>
                        <hr class="mb-3">
                        <div class="row-cols-sm-1">
                        <input class="btn btn-primary" id="update_data" type="submit" name="update_data" value="Update"/>
                        <input class="btn btn-primary" id="reset" type="reset" name="reset" value="Reset"/>
                        </div>
                        </div>
                   </form>
                   </div>
                   <p>&nbsp;</p>
                <div class="profile">
                    <h2 style="padding-bottom:10px;">Change Password</h2>
                   <form action="{{url('change_password')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name"><b>Old Password</b></label>
                            <input class="form-control" name="opass" type="password" maxlength="15" minlength="8" required="true" placeholder="Enter Old Password"/>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="email"><b>New Password</b></label>
                            <input class="form-control" name="npass" type="password" maxlength="15" minlength="8" required="true" placeholder="Enter New Password"/>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="phone"><b>Confirm New Password</b></label>
                            <input class="form-control" name="cnpass" type="password" maxlength="15" minlength="8" required="true" placeholder="Confirm New Password" oninput="check(this)"/>
                        </div>
                        <script language='javascript' type='text/javascript'>
                            if (f.formcheck.value != 'Blue') {
                                alert('Please enter the correct word.')
                                f.formcheck.focus()
                                return false
                            }
                        </script>
                        <hr class="mb-3">
                        <div class="row-cols-sm-1">
                        <input class="btn btn-primary" id="update_password" type="submit" name="update_password" value="Change Password"/>
                        </div>
                        </div>
                   </form>
                </div>
            </div>  
            
            </div>
        </section>
    </body>  

</html> 