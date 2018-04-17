<?php 
include "header1.php";
?>


      <!--Banner-->
      <!-- <div class="container-fluid banner" >
      <img src="img/date-1.jpg" >
      </div> -->
    <!--Navigation Bar Ends-->
   
    <!--Why Dating Section-->
    <div class="container-fluid register-section div-margin">
    <div class="container" style="margin-top: 70px;">
        <div class="row" style="border:1px #c0b283 dashed" >
        <div class="col-sm-2"> </div>

        <div class="col-sm-7" style="border-bottom:1px #c0b283 dashed">
        <h3 class="register-title font-head txt-center success-heading">Register!</h3>
        </div>

        <div class="col-sm-2"> </div>
        <div class="col-sm-2"> </div>
        
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
                        <label for="gender">Gender:</label>
            <div class="radio">

  <label class="radio-inline"><input type="radio" name="gender" value="M">Male</label>
    <label class="radio-inline"><input type="radio" name="gender" value="F">Female</label>
 
</div>
<label class="error" for="gender" id="gender_error">Select Gender.</label>
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
                     for($y=1985;$y<=2000;$y++)
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

              <center><input type="button" name="submit" class="btn btn-custom button" value="Register">
            </center>
            <h5 style="visibility: hidden;"> d</h5>
            </form> 

                  <div id="success_register">
                  <i class="fas fa-spinner fa-spin fa-5x gold-color"></i>
                  <h2 class="font-text gold-color">You Have Successfully Created Account Redirecting to You To Our Home Page</h2>
                    
                  </div> 
                  
            </div>
           
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
$("#button1").css('visibility','hidden');

</script>

    </html>
