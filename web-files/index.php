<!DOCTYPE html>
<html lang="en">
    <head>
        <title >Attendance System</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="style.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    </head>
    <body onload="myFunction()" style="margin:0;">
        <div id="loader"></div>
        <div style="display:none;" id="myDiv" class="animate-bottom">
    
        <header class="header-area bg-white meu ">
             <?php include 'includes/header.php' ;?>
             <!-- navbar area -->
        
        <div class = "orge">
            <div class="container">
                <h2 class="pb-3">WELCOME TO OUR PORTAL!</h2>
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <div class="card">
                        <div class="iccc"><i class="fa fa-cog" aria-hidden="true"></i></div>
                            <p>Students Zone!</p> 
                            <a href="students">Go To Student's Zone</a>
                        </div>    
                    </div>
                    <div class="col-md-5">
                        <div class="card">
                        <div class="iccc"><i class="fa fa-user"></i></div>
                            <p>Teacher's Zone!</p>
                            <a href="teachers"> Go To Teacher's Zone</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </header>
        <div class="how">
            <div class="container">
                <h2>How It Works?</h2>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card">
                    	    <div class="icc"><i class="fa fa-search"></i></div>
                            <p>DAILY UPDATES OF STUDENT'S ATTENDANCE</p>
                        </div>    
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                    	    <div class="icc"><i class="fa fa-heart"></i></div>
                            <p>STUDENTS CAN SEE AN UPDATED OF ATTENDANCE RECORD</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="icc"><i class="fa fa-home"></i></div>
                            <p>TEACHERS CAN SEE AN UPDATED ATTENDANCE RECORD</p>
                        </div>    
                    </div>    
                </div>
            </div>    
        </div>    

        <div class="shadow-lg foot">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <h5>About Us</h5>
                        <hr class="style1">
                        <p>Let camera scan your face, and your attendance will automatically be recorded and will be visible in both student's and teacher's panel!</p>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <h5>Useful Links</h5>
                        <hr class="style1">
                        <div class="links">
                            <a href="index.php">Home</a></br>
                            <a href="students">Student's Login</a></br>
                            <a href="teachers">Teacher's SignUp</a></br>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <h5>Our Team</h5>
                        <hr class="style1">
                        <div class="links">
                            <a href="#">1. Manan Raj</a></br>
                            <a href="#">2. Megha Jaiswal</a></br>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <h5>Contact us</h5>
                        <hr class="style1">
                        <p><i class="fa fa-map-marker"  style="margin-right: 7px; font-size: 20px;"></i> Address</p>
                        <p><i class="fa fa-phone" style="margin-right: 7px; font-size: 20px;"></i>+91 7764001252</p>
                        <p><i class="fa fa-envelope" style="margin-right: 7px; font-size: 20px;"></i> mrmananraj34@gmail.com</p>
                    </div>
                </div>
            </div>    
        </div> 
        <section class="last"> 
            <div class="container">
                <p class="reserved">AttendanceMate Project done by  <span><a href="#" class="lik">USN_033_034</a></span></p>
            </div>
        </section>  
    </div>
        <script>
            var myVar;
            
            function myFunction() {
              myVar = setTimeout(showPage, 3000);
            }
            
            function showPage() {
              document.getElementById("loader").style.display = "none";
              document.getElementById("myDiv").style.display = "block";
            }
            </script>
    </body>  
</html>