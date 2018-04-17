

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
                    <a href="index.php"><button type="button" id="login" class="btn custom-sign">LOGIN</button></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                
            </ul>
        </div>
        </div>
    </nav>

    <!--Navigation Bar Ends-->
    <!--Banner-->
      <div class="container-fluid banner" >
      <img src="img/date-1.jpg" >
      </div>
    <!--Why Dating Section-->
    <div class="container-fluid login-section">
    <div class="container">
        <div class="row">
        <div class="col-sm-12">
        <h3 class="register-title font-head">Login!</h3>
        </div>
            <div class="col-sm-12 login-form">
                <form class="login_data-1" method="post">
             
            <div class="form-group">
              
              <input type="email" class="form-control custom-form" id="email" name= "email"  placeholder="Email">
                  
            </div>
           

              <div class="form-group">
                
                <input type="password" class="form-control custom-form" name= "pwd" placeholder="Password" id="pwd" >
                
              </div>
              <p id="error"> Email or Password Incorrect!</p>

              <center><input type="button" name="submit" class="btn custom-sign button" id="submit" value="Login">
            </center>
            </form> 
                 
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
  <ul class="">

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
//Login Script
	$("#error").hide();
	$("#success").hide();
	  $(document).ready(function(){
	  $(document).on('click','#submit',function(){
	    $.ajax({
	      'url':'login_attempt.php',
	       'dataType': 'json',
	      'data':$('.login_data-1').serialize(),
	      success:function(res){
	        if(res.status==1){
	          $("#email").addClass("valid");
	          $("#pwd").addClass("valid");
	          $("#success").show();
	          setTimeout(Redirect,1000);
	          function Redirect(){
	            window.location.href = "index.php";
	          }
	        }
	        else if(res.status==0){
	          $("#email").addClass("invalid");
	          $("#pwd").addClass("invalid");
	          $("#error").show();
	          setTimeout(RemoveClass,2000);
	          function RemoveClass(){
	            $("#error").hide();
	          }
	        }

	      }


	    })



	  })  

	  });

</script>

    </html>
