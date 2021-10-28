<html>
    <head>
        <meta charset="UTF-8">
        <title>About Us</title>
        <link rel="stylesheet" href="/style1.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <script>
        function alertFunction(){
                alert("Successful Log Out!");
                return true;
            }
    </script>   
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <label class="logo">Western Library</label> 
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('student.home')}}">About Us <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
      <a href="{{route('student.signin')}}" onclick='return alertFunction();'>Log Out</a>
      </li>
    </ul>
</nav>
        <br><br>
        <section>
            <div class="container">
                <div class="cards">
                    <div class="text-card">
                        <h3><b>What is Lorem Ipsum?</b></h3>
                        <p>
                        Lorem Ipsum is simply dummy text of the printing and 
                        typesetting industry. Lorem Ipsum has been the industry's 
                        standard dummy text ever since the 1500s, when an unknown 
                        printer took a galley of type and scrambled it to make a type 
                        specimen book. It has survived not only five centuries, 
                        but also the leap into electronic typesetting, remaining 
                        essentially unchanged. It was popularised in the 1960s with the 
                        release of Letraset sheets containing Lorem Ipsum passages, and 
                        more recently with desktop publishing software like Aldus PageMaker 
                        including versions of Lorem Ipsum.</p>                
                    </div>
                    <div class="text-card">
                        <img src="/13.jfif" width="200px">
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container reveal">
                <div class="cards">
                    <div class="text-card">
                        <h3><b>Why do we use it?</b></h3>
                        <p>
                        It is a long established fact that a reader will be distracted 
                        by the readable content of a page when looking at its layout. 
                        The point of using Lorem Ipsum is that it has a more-or-less normal 
                        distribution of letters, as opposed to using 'Content here, content here',
                        making it look like readable English. Many desktop publishing packages 
                        and web page editors now use Lorem Ipsum as their default model text, and 
                        a search for 'lorem ipsum' will uncover many web sites still in their infancy. 
                        Various versions have evolved over the years, sometimes by accident, sometimes 
                        on purpose (injected humour and the like).</p>
                    </div>
                    <div class="text-card">
                        <img src="/12.png" width="200px">
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container reveal">
                <div class="cards">
                    <div class="text-card">
                        <h3><b>Where does it come from?</b></h3>
                        <p>
                        Contrary to popular belief, Lorem Ipsum is not simply random text. 
                        It has roots in a piece of classical Latin literature from 45 BC, 
                        making it over 2000 years old. Richard McClintock, a Latin professor 
                        at Hampden-Sydney College in Virginia, looked up one of the more obscure 
                        Latin words, consectetur, from a Lorem Ipsum passage, and going through 
                        the cites of the word in classical literature, discovered the undoubtable
                        source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus 
                        Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. 
                        This book is a treatise on the theory of ethics, very popular during the Renaissance.
                        The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in 
                        section 1.10.32.

                        The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those 
                        interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by 
                        Cicero are also reproduced in their exact original form, accompanied by English versions 
                        from the 1914 translation by H. Rackham.</p>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container reveal">
                <h3>BOOK</h3>
                <div class="cards">
                    <div class="text-card">
                        <img src="/1.jfif" width="100%" max-width="900px">
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container reveal" id="container">
                <h3>Where can I get some?</h3>
                <p>
                There are many variations of passages of Lorem Ipsum available,
                but the majority have suffered alteration in some form, by injected 
                humour, or randomised words which don't look even slightly believable.
                If you are going to use a passage of Lorem Ipsum, you need to be sure 
                there isn't anything embarrassing hidden in the middle of text. All the 
                Lorem Ipsum generators on the Internet tend to repeat predefined chunks 
                as necessary, making this the first true generator on the Internet. It 
                uses a dictionary of over 200 Latin words, combined with a handful of model 
                sentence structures, to generate Lorem Ipsum which looks reasonable. The 
                generated Lorem Ipsum is therefore always free from repetition, injected humour, 
                or non-characteristic words etc.</p>
            </div>
        </div>
        </section>
        
        <script type="text/javascript">
            window.addEventListener('scroll', reveal);
            function reveal(){
                var reveals = document.querySelectorAll('.reveal');
                for(var i=0; i<reveals.length; i++){
                    var windowheight = window.innerHeight;
                    var revealtop = reveals[i].getBoundingClientRect().top;
                    var revealpoint = 150;

                    if(revealtop < windowheight - revealpoint){
                        reveals[i].classList.add('active');
                    }
                    else{
                        reveals[i].classList.remove('active');  
                    }
                }
            }
        </script>
    </body>
</html>


