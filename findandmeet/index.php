<?php 
include "header.php";
if(isset($_SESSION["id"])){
	header("Location :see_posts.php");
}
?>
	    <!--Navigation Bar Ends-->
	    <!--Slider And Form-->
	    <div id="demo" class="carousel slide carousel-fade" data-ride="carousel" >

	      <!-- Indicators -->
	      <ul class="carousel-indicators" style="width: 0px">
	        <li data-target="#demo" data-slide-to="0" class="active"></li>
	        <li data-target="#demo" data-slide-to="1"></li>
	        <li data-target="#demo" data-slide-to="2"></li>
	    </ul>

	    <!-- The slideshow -->
	    <div class="carousel-inner">
	        <div class="carousel-item active">
	          <div style="background-color: black;"><img src="img/date-1.jpg" class="slider-img img-fluid all-img"></div>
	      </div>
	      <div class="carousel-item">
	          <img src="img/date-2.jpg" class="slider-img img-fluid all-img">
	      </div>
	      <div class="carousel-item">
	          <img src="img/date-3.jpg" class="slider-img img-fluid all-img">
	      </div>
	    </div>


	    <div class="container">
	      <div class="row">
	     <div class="slider-caption-align">
	     <h1 class="gold-color font-head">Everything Starts With<br><br>  The First Step!</h1>
	     </div>
	          <div class="well searchForm well-slider" style="">
	             

	              <h3 class="logo-caption font-head success-heading" style="text-align: center;">login</h3>

	              <div class="controls frm-control">
	              <form id="login_data" method="post">
	                <input type="text" name="email" id="email" placeholder="Email" class="form-control custom-form" />
	                <input type="password" name="pwd" id="pwd" placeholder="Password" class="form-control custom-form" />
	                <p id="error"> Email or Password Incorrect!</p>
	  				
	                <button type="button" class="btn btn-default btn-block btn-custom myButt one-1" id=submit style="">
					<div class="insider"></div>
	                Login</button>
	                <hr>
	          			<!-- <h3 class="login-or">or</h3> -->
	                <a href="register.php"><button type="button" id="signup" class="btn btn-default btn-block btn-custom myButt one-1">

	                <div class="insider"></div>
	                Signup</button></a>
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
	        <div class="col-sm-12">
	        <h3 class="title font-head success-heading ">Why Online Dating?</h3>
	        </div>
	            <div class="col-sm-6 col-md-12 col-lg-6 whyDating-margin-content">
	                
	               <!--  <h4 class="black-color font-text">consectetur adipisicing elit eiusmod</h4> -->
	                <p class="black-color font-text" style="text-align: justify;">
	                  <ul class="font-text">
	                  	<li>It forces you to leave your comfort zone. Putting yourself out there, creating a profile with a picture of your face and sending a message to a random stranger.</li><br>
<li>	You meet different kinds of people than you would in your everyday life.</li><br>
<li> Practice makes perfect. With online dating, you don’t have to wait to meet someone to ask on a date or wait for someone to ask you — in “real life” that could take months. Online, you can get more dates in a shorter period of time.</li><br>
<li>	It’s far from being passive. Some people say, “Good things come to those who wait.” I say, “Good things come to those who put themselves out there and try hard.”</li><br>
<li>	You learn a lot about yourself and other people. Like, what do you do when someone sends you two paragraphs on how beautiful you are and how you have the same taste in movies, but it’s so over the top that you’re thoroughly creped out? What about when you’ve been messaging someone and all of a sudden, they just stop answering — as if you are not even a human being.</li>

	                  </ul>
	                </p>
	            </div>
	            <div class="col-sm-6 col-lg-6 col-md-12 whyDating-margin-content item">
	                <img src="img/date-4.jpg" class="img-fluid hide-img">
					<div class="item-overlay top"></div>
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
	      <h2 class="success-heading about-heading">Our success stories
	      </h2>
	      
	      </div>
	      </div>
	      </div>
	    <div class="container">
	     <div class="row ">
	     <div class="col-sm-4 success-stories animated success-img"  id="left-0">
	       <img src="img/story-1.jpg" class="img-fluid mx-auto d-block all-img" >
	       <dl class="txt-center">

	                       <dt class="gold-color font-text">Mathew and Vanessa</dt>
	                      <dd class="black-color font-text" >The way we met was actually a happy accident. I had not changed my location settings or my age settings from the default
	                                               
	                      </dd>  
	                      <dd class=""><a href="stories.php" class="read-more" style="">  <p class="gold-color font-text">Read More</p></a></dd>
	                      </dl>  
	       </div>
	       <div class="col-sm-4 success-stories success-img">
	       <img src="img/story-2.jpg" class="img-fluid mx-auto d-block all-img">
	       <dl class="txt-center">

	                      <dt class="gold-color font-text">Bruce and Jane</dt>
	                      <dd class="black-color font-text">I signed up for online dating with a friend, almost like signing up for a marathon together. I went on dates with a few guys,
	                                             
	                      </dd> 
	                      <dd class=""><a href="stories.php" class=" read-more"> <p class="gold-color font-text">Read More</p></a></dd> 
	                      </dl>  
	       </div>
	       <div class="col-sm-4 success-stories animated success-img" id="right-0">
	       <img src="img/story-3.jpg" class="img-fluid mx-auto d-block all-img">
	       <dl class="txt-center">

	                       <dt class="gold-color font-text">Lia and John</dt>
	                      <dd class="black-color font-text" >Hi, I am Lia here. I am going to tell you about my love life. I still cannot believe that I found my Mr. Right from this web app. 
	                      </dd>  
	                      <dd class=""><a href="stories.php" class="read-more">  <p class="gold-color font-text">Read More</p></a></dd>
	                      </dl>  
	       </div>
	       </div>
	       </div>
	       <!--Success Stories Ends-->
	       <!--Footer-->
	   <?php
    include "footer.php";
    ?>
	<!--Footer Ends-->
	    </body>
	    <script type="text/javascript" src="js/custom.js"></script>
	<script>

	function checkPosition() {
    if (window.matchMedia('(max-width: 767px)').matches) {
			$("#button").show();
			$("#button1").show();
    } else {
      	$("#button").hide();
		$("#button1").hide();
    }
}
checkPosition();
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
	            window.location.href = "see_posts.php";
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

	

//    (function($) {
	
// 	/*
// 	* We need to turn it into a function.
// 	* To apply the changes both on document ready and when we resize the browser.
// 	*/
	
// 	function mediaSize() { 
// 		/* Set the matchMedia */
// 		if (window.matchMedia('(max-width: 768px)').matches) {
// 		/* Changes when we reach the min-width  */
	
// 		} else {
// 		/* Reset for CSS changes – Still need a better way to do this! */
// 		$('#left-0').css('opacity', 0);
 
//   $('#left-0').waypoint(function() {
//       $('#left-0').addClass('slideInLeft');
//       $('#left-0').css('opacity', 1);
//   }, { offset: '50%' });

//    $(document).ready(function(){
//    // hide our element on page load
//   $('#right-0').css('opacity', 0);
 
//   $('#right-0').waypoint(function() {
//       $('#right-0').addClass('slideInRight');
//       $('#right-0').css('opacity', 1);
//   }, { offset: '50%' });
//  }); 	
// 		}
// 	};
	
// 	/* Call the function */
//   mediaSize();
//   /* Attach the function to the resize event listener */
// 	window.addEventListener('resize', mediaSize, false);  
	
// })(jQuery);


    
  </script>
  

	    </html>
