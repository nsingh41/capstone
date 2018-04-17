    <?php

    date_default_timezone_set('Etc/GMT+7');
    session_start();
    function time_elapsed_string($datetime, $full = false) {
            $now = new DateTime();
            // date_default_timezone_set('Canada/Central');

            $ago = new DateTime($datetime);
            $diff = $now->diff($ago);

            $diff->w = floor($diff->d / 7);
            $diff->d -= $diff->w * 7;

            $string = array(
                'y' => 'year',
                'm' => 'month',
                'w' => 'week',
                'd' => 'day',
                'h' => 'hour',
                'i' => 'minute',
                's' => 'second',
                );
            foreach ($string as $k => &$v) {

                if ($diff->$k) {

                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');

                } else {
                    unset($string[$k]);
                }
            }

            if (!$full) $string = array_slice($string, 0, 1);
            return $string ? implode(', ', $string) . ' ago' : 'just now';
        }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
    	<title>Find & Meet</title>
         <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="shortcut icon" href="img/like.png" type="image/png">
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script:700|Lobster|Pacifico|Sedgwick+Ave|Lora|Dosis:400,700|Dosis" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/animate.css"> 
        <link href="https://use.fontawesome.com/releases/v5.0.2/css/all.css" rel="stylesheet">     
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script src="js/jquery.waypoints.js"></script>
		    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116925848-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-116925848-1');
</script>

<style type="text/css">
#mceu_31{
  display: none;
}
#mceu_30{
  display: none;
}
#mceu_11{
   background-color: #763249;
}
#mceu_28{
    background-color: #763249;
}
#mceu_19{
    background-color: #763249;
}
.mce-panel{
  background-color: #763249;
}  
</style>
    </head>

    <body>

   <!--Navigation Bar -->

    <nav class="navbar navbar-expand-lg justify-content-center fixed-top navbar-transparent">
    <div class="container">

        <a href="#" class="navbar-brand d-flex mr-auto font-head logo" style=""> 
        <i class="fab fa-gratipay logo-icon"> </i> Find&Meet!</a>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3" id="color">
            <i class="fas fa-bars rose-color" id="icon"></i>
        </button>
        <div class="navbar-collapse collapse " id="collapsingNavbar3">
            
            <?php
            if(isset($_SESSION["username"]))
            {
            ?>
            <ul class="navbar-nav mx-auto topBotomBordersIn nav-ul">
               <li class="nav-item">
                    <a class=" nav-link" href="see_posts.php">HOME</a>
                </li>
                <!-- <li class="nav-item">
                    <a class=" nav-link" href="Aboutus.php">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="ourservices.php">OUR SERVICES</a>
                </li>
                <li class="nav-item">
                    <a class="  nav-link" href="stories.php">SUCCESS STORIES</a>
                    </li> -->
                <li class="nav-item active">
                    <a class="nav-link " href="profile.php">MY PROFILE</a>
                </li>
                <li class="nav-item">

                    <a class="nav-link " href="matchlist.php">BROWSE PROFILES</a>

                </li>
                

            </ul>
            <div style="" class="custom-right-nav">
            <ul class="nav navbar-nav ml-auto justify-content-end nav-center nav-btn1">
           
           
             <li class="nav-item ">
                <div class="dropdown">
                        <button type="button" class="btn btn btn-custom profile-droplist" data-toggle="dropdown">
                          <p><span class="fas fa-bell"></span>
                          <sup id="request_count"></sup></p>
                        </button>
                        <div class="dropdown-menu droplist-div nav-center requests drpdown">
                        
                      
                       <p class="black-color txt-center font-txt">Requests!<hr style="border: 1px solid #763249"></p>
                     <div id="get_notification">
                       
                         </div>
    <hr style="border: 1px solid #763249">
                       <p class="black-color txt-center" >Notifications!<hr style="border: 1px solid #763249"></p>
                        <div id="req">
                            
                        </div>
    <!--Getting Post Like Notification-->   
          <div id="get_like">
              
          </div>
            <!--Getting Post Like Notification Closed-->    
            <!--Getting Post Comment Notification-->   
            <div id="get_comments">
                 
            </div>
            <!--Getting Post Comment Notification Closed-->                
                        
                        </div>
                </div>

                    
                </li>
                <li class="nav-item ">
                 <div class="dropdown">
                        <button type="button" class="btn btn btn-custom profile-droplist" data-toggle="dropdown">
                           <span class="fas fa-envelope"></span> <sup id="msg_count">
                          
                          </b><sup></p>
                        </button>
                        <div class="dropdown-menu droplist-div nav-center txt-center dropdown-menu-right" >
                       <p class="black-color font-txt"> Messages<hr style="border: 1px solid #763249"></p>
                        <div id="get_messages">
                        </div>
                        
                        

                        </div>
                </div>


					
                </li>
				<li class="nav-item ">
                <div class="dropdown">
                        <button type="button" class="btn btn btn-custom profile-droplist " data-toggle="dropdown">
                           <span class="fas fa-pencil-alt"></span>
                        </button>
                        <div class="dropdown-menu droplist-div nav-center txt-center dropdown-menu-right">
                       <p class="black-color font-txt">Posts!
							<hr style="border: 1px solid #763249"></p>
                        <a class="dropdown-item black-color" href="user_posts.php"><b>Add Posts</b></a>
                        <a class="dropdown-item black-color" href="see_posts.php"><b>See Posts</b></a>
                        

                        </div>
                </div>

					</li>
					<li class="nav-item ">
               <div class="dropdown">
                        <button type="button" class="btn btn btn-custom profile-droplist  " data-toggle="dropdown">
                          <span class="fas fa-cog"></span>
                        </button>
                        <div class="dropdown-menu droplist-div nav-center txt-center dropdown-menu-right" style="float:right">
                       <p class="black-color font-txt"><b><?php echo $_SESSION["username"];?> </b><hr style="border: 1px solid #763249"></p>
                        <a class="dropdown-item black-color" href="profile.php"><b>Profile</b></a>
                        <a class="dropdown-item black-color" href="friendlist.php"><b>Friends</b></a>
                        
                        <a class="dropdown-item black-color" href="logout.php"><b>Logout</b></a>

                        </div>
                </div>
					
                </li>
            
                
                

            </ul>
            </div>
            <?php	
            }
            else{
            ?>
            <ul class="navbar-nav mx-auto topBotomBordersIn  justify-content-center nav-center">
               
                <li class="nav-item active  ">
                    <a class=" nav-link" href="index.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class=" nav-link" href="Aboutus.php">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="ourservices.php">OUR SERVICES</a>
                </li>
                <li class="nav-item">
                    <a class="  nav-link" href="stories.php">SUCCESS STORIES</a>
                </li>
               
            </ul>
<ul class="nav navbar-nav ml-auto justify-content-end nav-btn-1">
                <li class="nav-item">
					<span class="nav-link">
                    <a href="login_form.php"><button type="button" id="button" class="btn custom-sign"><i class="fas fa-user"></i>

 LOGIN</button></a>
                    <!-- <a href="register.php"><button type="button" id="button1" class="btn custom-sign"> <i class="fas fa-user"></i>

 SIGN UP</button></a> -->
                </span>
                </li>
                <li class="nav-item">
                    
                </li>
                
            </ul>
            <?php
            }
            ?>
            
        </div>
        </div>
    </nav>