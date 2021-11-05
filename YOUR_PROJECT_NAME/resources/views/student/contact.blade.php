<html>
    <head>
        <meta charset="UTF-8">
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
      <a href="{{route('student.signin')}}" onclick='return alertFunction();'>Log Out</a>
      </li>
    </ul>
    </nav>
        <br><br>
        <section>
            <div class="container">
                <h3 style="color:#770115">Contact Us</h3>
                <div class="cards">
                    <div class="text-card" style="width:100%">
                        <button class="icon" onclick="window.location.href='mailto:westernlibrary@gmail.com'">
                            <i class="fa">&#xf003;</i>
                        </button>
                        <label>westernlibrary@gmail.com</label><br><br>
                        <button class="icon" onclick="window.location.href='https://www.facebook.com/westernuLibs'">
                            <i class="fa">&#xf082;</i>
                        </button>
                        <label>@WesternLibrary</label><br><br>
                        <button class="icon" onclick="window.location.href='https://www.instagram.com/westernulibs/'">
                            <i class="fa">&#xf16d;</i>
                        </button>
                        <label>Western Library</label><br><br>
                        <button class="icon" onclick="window.location.href='https://www.lib.uwo.ca/'">
                            <i class="fa">&#xf041;</i>
                        </button>
                        <label>1151 Richmond Street London, Ontario, Canada, N6A 3K7</label>
                    </div>
                   
                </div>
            </div>
        </section>
    </body>   
</html>