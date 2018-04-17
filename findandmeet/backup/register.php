

    <!DOCTYPE html>
    <html>
    <head>
    	<title>Find & Meet</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script:700|Lobster|Pacifico|Sedgwick+Ave|Lora" rel="stylesheet"> 
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/animate.css"> 
        <link href="https://use.fontawesome.com/releases/v5.0.2/css/all.css" rel="stylesheet">     
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script src="js/jquery.waypoints.js"></script>
<style type="text/css">
  
</style>
    </head>

    <body>

   <!--Navigation Bar -->

    <nav class="navbar navbar-expand-md justify-content-center fixed-top navbar-transparent">
    <div class="container">
        <a href="/" class="navbar-brand d-flex mr-auto font-head logo" style=""> 
        <i class="fab fa-gratipay logo-icon"> </i> Find&Meet!</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3" id="color">
            <span class="fas fa-bars rose-color"></span>
        </button>
        <div class="navbar-collapse collapse" id="collapsingNavbar3">
            <ul class="navbar-nav mx-auto  justify-content-center">
                <li class="nav-item active">
                    <a class="nav-link " href="#">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">OUR SERVICES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">SUCCESS STORIES</a>
                </li>
            </ul>
            <ul class="nav navbar-nav ml-auto justify-content-end">
                <li class="nav-item">
					<a href="register.php"><button type="button" id="signup" class="btn custom-sign">SIGNUP</button></a>
                    <a href="login_form.php"><button type="button" id="login" class="btn custom-sign">LOGIN</button></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                
            </ul>
        </div>
        </div>
    </nav>
      <!--Banner-->
      <div class="container-fluid banner" >
      <img src="img/date-1.jpg" >
      </div>
    <!--Navigation Bar Ends-->
   
    <!--Why Dating Section-->
    <div class="container-fluid register-section">
    <div class="container">
        <div class="row">
        <div class="col-sm-12">
        <h3 class="register-title font-head">Register!</h3>
        </div>
            <div class="col-sm-12 register-form">
                <form action="" id="register_data" style="" method="post">
                <div class="row">
             <div class="form-group col-mob-6">
              
              <input type="text" class="form-control custom-form" id="firstname" name= "firstname" placeholder="First Name" >
                  <label class="error" for="firstname" id="fname_error">Enter a Valid Name.</label>  
            </div>
            <div class="form-group col-mob-6">
             
              <input type="text" class="form-control custom-form" id="lastname" name= "lastname" placeholder="Last Name" >
                  <label class="error" for="lastname" id="lname_error">Enter a Valid Name.</label>
            </div>
            </div>
            <div class="form-group">
              
              <input type="email" class="form-control custom-form" id="email" name= "email"  placeholder="Enter Your Email">
                  <label class="error" for="email" id="email_error">Enter a Valid Email Address.</label>
            </div>
            <div class="form-group">
              <label for="sel1">Date Of Birth:</label>
              <div class="row">

                <div class="col-mob-3" style="">

                  <select class="form-control custom-form custom-select" name="day" id="day">
                    <option value="" selected="selected">Day</option>
                    
                    <?php
                    
                    for($d=1;$d<=31;$d++)
                    {
                      echo "<option value='".$d."'>".$d."</option>";
                    }
                    ?>

                   </select>
                   <label class="error" for="day" id="day_error">Enter Day</label>
                  </div>
                  <div class="col-mob-3">
                    <select class="form-control custom-form custom-select" name= "month"  id="month">
                      <option value="">Month</option>
                      <?php
                      for($m=1;$m<=12;$m++)
                      {
                        echo "<option value='".$m."'>".$m."</option>" ;
                      }
                      ?>
                    </select>
                      <label class="error" for="month" id="month_error">Enter Month</label>
                  </div> 
                  <div class="col-mob-3">

                    <select class="form-control custom-form custom-select" name= "year"  id="year">
                      <option value="">Year</option>
                     <?php
                     for($y=1947;$y<=2000;$y++)
                     {
                      echo "<option value='".$y."'>".$y."</option>";
                     }
                     ?>
                    </select>
                    <label class="error" for="year" id="year_error">Enter Year</label>
                  </div> 
                </div> 
              </div>

              <div class="form-group">
                
                <input type="password" class="form-control custom-form" name= "password" placeholder="Enter Password" id="pwd" >
                <label class="error" for="pwd" id="pwd_error">Enter Password</label>
              </div>
              <div class="form-group">
                
                <input type="password" class="form-control custom-form" name= "confirm_password" placeholder="Re-Enter Password"  id="cpwd" >
                <label class="error" for="cpwd" id="cpwd_error">Password doesnt match</label>
              </div>

              <center><input type="button" name="submit" class="btn custom-sign button" value="Register">
            </center>
            </form> 
                  <div id="success_register">
                  <h1>You Have Successfully Created Account Redirecting to You To Our Home Page</h1>
                    
                  </div> 
            </div>
           
        </div>
       </div> 
    </div>
    <!--Why Dating Ends-->
  
       <!--Footer-->
    <div class="container-fluid footer">
<div class="container">
<div class="row">
    <div class="col-sm-6 icons">
  <ul>

<a href="#"><i class="fab fa-facebook-square icon-color" ></i></a>

<a href="#"> <i class="fab fa-instagram  icon-color"></i></a>
<a href="#"> <i class="fab fa-pinterest-square  icon-color"></i></a>
<a href="#"> <i class=" fab fa-twitter-square  icon-color"></i></a>

    </ul>
</div>
<div class="col-sm-6">
 <div class="copyright"> <span href="#">2018 copyright by company</span>
</div>
</div>
</div>
</div>
</div>
<!--Footer Ends-->
    </body>
    <script type="text/javascript" src="js/custom.js"></script>
<script>
$("#signup").hide();
$("#login").show();
</script>

    </html>
