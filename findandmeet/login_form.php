<?php 
include "header.php";
?>

    <!--Navigation Bar Ends-->
    <!--Banner-->
      <div class="container-fluid banner banner-hide" >
      <img src="img/date-1.jpg" >
      </div>
    <!--Why Dating Section-->
    <div class="container-fluid login-section">
    <div class="container">
        <div class="row" style="border:1px #c0b283 dashed" >
        <div class="col-sm-2"> </div>
        <div class="col-sm-7" style="border-bottom:1px #c0b283 dashed">
        <h3 class="register-title font-head txt-center" >Login!</h3>
        </div>
        <div class="col-sm-2"> </div>
        <div class="col-sm-2"> </div>
        
        <div class="col-sm-7 login-form" >
                <form class="login_data-1" method="post">
             
            <div class="form-group">
              
              <input type="email" class="form-control custom-form " id="email" name= "email"  placeholder="Email">
                  
            </div>
           

              <div class="form-group">
                
                <input type="password" class="form-control custom-form" name= "pwd" placeholder="Password" id="pwd" >
                
              </div>
              <p id="error"> Email or Password Incorrect!</p>

              <center><input type="button" name="submit" class="btn btn-custom  button" id="submit" value="Login">
            <h5 style="visibility: hidden">d </h5>
           </center>
            </form> 
                 
            </div>
           <div class="col-sm-2"> </div>
        
        
        </div>
       </div> 
    </div>
    <!--Why Dating Ends-->
  
       <!--Footer-->
 <?php
    include "footer.php";
    ?>
<!--Footer Ends-->
    </body>
    <script type="text/javascript" src="js/custom.js"></script>
<script>
//Login Script
$("#button").css('visibility','hidden');
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

</script>

    </html>
