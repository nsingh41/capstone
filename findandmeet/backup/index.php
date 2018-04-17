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

	    </head>
	    <body>

	   <!--Navigation Bar -->

	    <nav class="navbar navbar-expand-md justify-content-center fixed-top navbar-transparent">
	    <div class="container">
	        <a href="index.php" class="navbar-brand d-flex mr-auto font-head logo" style=""> 
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
	                   <a href="register.php"> <button  type="button" class="btn custom-sign">SIGNUP</button></a>
	                   <a href="login_form.php"> <button type="button" id="login" class="btn custom-sign">LOGIN</button></a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link" href="#"></a>
	                </li>
	                
	            </ul>
	        </div>
	        </div>
	    </nav>

	    <!--Navigation Bar Ends-->
	    <!--Slider And Form-->
	    <div id="demo" class="carousel slide" data-ride="carousel" >

	      <!-- Indicators -->
	      <ul class="carousel-indicators" style="width: 0px">
	        <li data-target="#demo" data-slide-to="0" class="active"></li>
	        <li data-target="#demo" data-slide-to="1"></li>
	        <li data-target="#demo" data-slide-to="2"></li>
	    </ul>

	    <!-- The slideshow -->
	    <div class="carousel-inner">
	        <div class="carousel-item active">
	          <div style="background-color: black;"><img src="img/date-1.jpg" class="slider-img img-fluid"></div>
	      </div>
	      <div class="carousel-item">
	          <img src="img/date-2.jpg" class="slider-img img-fluid">
	      </div>
	      <div class="carousel-item">
	          <img src="img/date-3.jpg" class="slider-img img-fluid">
	      </div>
	    </div>


	    <div class="container">
	      <div class="row">
	     <div class="slider-caption-align">
	     <h1 class="gold-color font-head">Its All Starts With<br>  First Step!</h1>
	     </div>
	          <div class="well searchForm well-slider" style="">
	              <img src="img/login-2.jpg" class="img img-fluid mx-auto d-block rounded-circle center-block" style="">

	              <h3 class="logo-caption font-head" style="text-align: center;">login</h3>

	              <div class="controls frm-control">
	              <form id="login_data" method="post">
	                <input type="text" name="email" id="email" placeholder="Username" class="form-control custom-form" />
	                <input type="password" name="pwd" id="pwd" placeholder="Password" class="form-control custom-form" />
	                <p id="error"> Email or Password Incorrect!</p>
	  				
	                <button type="button" class="btn btn-default btn-block btn-custom login" id=submit style="">Login</button>
	                </form>
	            </div><!-- /.controls -->

	        </div>

	    </div>
	    </div>
	    </div>
	    <!--Slider and Form Ends-->
	    <!--Why Dating Section-->
	    <div class="container-fluid whyDating-section">
	    <div class="container">
	        <div class="row">
	        <div class="col-sm-12 whyDating-margin">
	        <h3 class="title font-head">Why Online Dating?</h3>
	        </div>
	            <div class="col-sm-6 whyDating-margin-content">
	                
	                <h4 class="black-color font-text">consectetur adipisicing elit eiusmod</h4>
	                <p class="black-color font-text">
	                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	                      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	                      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	                      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	                </p>
	            </div>
	            <div class="col-sm-6 whyDating-margin-content">
	                <img src="img/date-4.jpg" class="img-fluid">

	            </div>

	        </div>
	       </div> 
	    </div>
	    <!--Why Dating Ends-->
	    <!--Success Stories-->
	    <div class="container">
	      <!--heading--> 
	      <div class="row">
	      <div class="col-sm-12 gold-color font-head">
	      <h2 class="success-heading">Our success stories
	      </h2>
	      
	      </div>
	      </div>
	      </div>
	    <div class="container">
	     <div class="row ">
	     <div class="col-sm-4 success-stories">
	       <img src="img/story-1.jpg" class="img-fluid mx-auto d-block" >
	       <dl class="txt-center">

	                       <dt class="gold-color font-text">consectetur adipiscing</dt>
	                      <dd class="black-color font-text" >lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas luctus. 
	                                              atus error sit voluptatem accusantium doloremque 
	                      </dd>  
	                      <dd class=""><a href="#" class="read-more" style="">  <p class="gold-color font-text">Read More</p></a></dd>
	                      </dl>  
	       </div>
	       <div class="col-sm-4 success-stories">
	       <img src="img/story-2.jpg" class="img-fluid mx-auto d-block">
	       <dl class="txt-center">

	                      <dt class="gold-color font-text">consectetur adipiscing</dt>
	                      <dd class="black-color font-text">lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas luctus. 
	                                            atus error sit voluptatem accusantium doloremque 
	                      </dd> 
	                      <dd class=""><a href="#" class=" read-more"> <p class="gold-color font-text">Read More</p></a></dd> 
	                      </dl>  
	       </div>
	       <div class="col-sm-4 success-stories">
	       <img src="img/story-3.jpg" class="img-fluid mx-auto d-block">
	       <dl class="txt-center">

	                       <dt class="gold-color font-text">consectetur adipiscing</dt>
	                      <dd class="black-color font-text" >lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas luctus. 
	                      atus error sit voluptatem accusantium doloremque 
	                      </dd>  
	                      <dd class=""><a href="#" class="read-more">  <p class="gold-color font-text">Read More</p></a></dd>
	                      </dl>  
	       </div>
	       </div>
	       </div>
	       <!--Success Stories Ends-->
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
	      'data':$('#login_data').serialize(),
	      success:function(res){
	        if(res.status==1){
	          $("#email").addClass("valid");
	          $("#pwd").addClass("valid");
	          $("#success").show();
	          setTimeout(Redirect,1000);
	          function Redirect(){
	            window.location.href = "home.php";
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
