   <!--Navigation Bar -->

	    <?php 

include "header.php";
if(!isset($_SESSION["id"])){

      header("Location:profile.php");
      
      }
include "connect.php";

//========Setting Messages Id To PRofiles and user ptofiles Closed=========-->

$user_id = $_SESSION["id"]; //getting user_id
$to_user_id = $_GET["id"];//getting user_id of user whom to send the message 
$email = $_SESSION["email"];
$message_id = "";

$check_message_id_exists = "select message_id from message_id where user_id = '".$user_id."' and to_user_id ='".$to_user_id."'";
$result = mysqli_query($conn,$check_message_id_exists);
if(mysqli_num_rows($result)>0){
while($row = mysqli_fetch_assoc($result)){
  $message_id = $row["message_id"];
}
// echo $message_id;
}
else{
  // echo "Message_id not exists";
  // die;
$assiging_id = "select message_id from message_id where user_id = '".$to_user_id."' and to_user_id='".$user_id."'";
$get_result = mysqli_query($conn,$assiging_id);
if(mysqli_num_rows($get_result)>0){
  while($row = mysqli_fetch_assoc($get_result)){
    $message_id = $row["message_id"];

  }

  $insert_message_id = "insert into message_id(user_id,message_id,to_user_id) values('".$user_id."','".$message_id."','".$to_user_id."')";
  if($conn->query($insert_message_id)){
    echo "added!";
  }
  else{
    echo $conn->error;
  }
}
else{
$message_id = rand(10000,99999);
$insert_message_id = "insert into message_id(user_id,message_id,to_user_id) values('".$user_id."','".$message_id."','".$to_user_id."')";
if($conn->query($insert_message_id)===TRUE)
{
  echo "added!";

}
else{
  echo $conn->error;
}

}
}
$get_data = "select register.f_name,register.l_name,register.email,user_profiles.image,online.last_activity from register left join online on register.id = online.user_id left join user_profiles on register.id = user_profiles.user_id where register.id = '".$to_user_id."'";
$result = mysqli_query($conn,$get_data);
// echo "<pre>";print_r($result);die;
?>

<!--========Setting Messages Id To PRofiles and user ptofiles Closed=========-->
	    <!--Banner-->
      <!-- <div class="container-fluid banner" >
      <img src="img/date-1.jpg" >
      </div> -->
    <!--Navigation Bar Ends-->


</head>
<body>

	<div class="container-fluid">
  
	<div class="row">
	
	<div class="col-sm-12" style="padding: 0px;margin-top: 80px;">	
	<div class="top-background" >
		<div class="list-user"> <h3 class="msgcht font-head rose-color"> Message</h3>
		</div>
	</div>
			<!--PERSON PROFILE BAR.............................-->
      <div class="container ">
<div class="usernamebar">
	
	<div class="usernamebox chat-img">
		<div class="msgusr-profile"> 
		<?php if(mysqli_num_rows($result)>0){
while($row = mysqli_fetch_assoc($result)){
	?>
   <?php if($row["image"]!=""){?>
                 <img src="<?php echo $row["image"];?>" border="0"  class="all-img" style="   width: 100%;height: 100%; border-radius: 50%"> 
                  <?php }
                  else{
                    ?>
                    <img class="card-img-top  all-img" src="img/img_avatar1.png" alt="Profile Pic" border="0" style="   width: 100%;height: 100%; border-radius: 50%" >
                    <?php }?>
	  
		</div>
    <h4 class="img-txt font-txt" style="color:white"><?php
  echo $row["f_name"] . "   " . $row["l_name"];

// date_default_timezone_set('Canada/Central');
  $date_logged =  $row['last_activity'];
$current = date('Y-m-d H:i:s');
$c = strtotime($current);
$d = strtotime($date_logged);
$minutes = round(abs($c-$d)/60,2);
// echo $minutes;

        if($minutes>1){
          echo " <i class='fas fa-circle' style='color:red;font-size:15px;'></i>";
        }
        else{
          echo " <i class='fas fa-circle' style='color:green;font-size:15px;'></i>";
        }

}

      }?></h4>
    
	</div>

</div>	
</div>
	<!--MESSAGEBOX..............................................-->
  <div class="container">
	<div class="messagebox"> 
			<!--Retrieving Old Messages-->
<?php 
$message_id = "";
$get_message_id = "select message_id from message_id where user_id ='".$user_id."' and to_user_id='".$to_user_id."'";
$result = mysqli_query($conn,$get_message_id);
if(mysqli_num_rows($result)>0){
  while($row = mysqli_fetch_assoc($result)){
$message_id = $row["message_id"];
  }
  // echo $message_id."<br>";
}
$data = array();
$sent_messages = "select * from chat where message_id ='".$message_id."'";
// $recieve_messages = "select send,sent_time from chat where user_id='".$to_user_id."' and to_user_id = '".$user_id."'";
$send_result = mysqli_query($conn,$sent_messages);
// $recieve_result = mysqli_query($conn,$recieve_messages);
// echo "<pre>";print_r($send_result);
// echo "<pre>";print_r($recieve_result);die;
if(mysqli_num_rows($send_result)>0){

  while($row = mysqli_fetch_assoc($send_result)){

    if($row["user_id"] == $user_id){
    ?><div class='row message-body'>          <div class='col-sm-8 message-main-sender'><div class='sender chat1-box'><div class='message-text'> <?php  echo $row["send"]; ?> </div><span class='message-time pull-right'>
      <?php 
      $time = $row["sent_time"];

      echo date("H:i A",strtotime($time));?>

    </span></div></div></div>
     
      <?php
    }
        else if($row["user_id"] == $to_user_id){
    ?>
    <div class="row message-body">
          <div class="col-sm-12 message-main-receiver">
            <div class="receiver chat-box">
              <div class="message-text black-color">
               <div><?php echo $row["send"];?></div>
              </div>
              <span class="message-time pull-right">
                <?php
                 $time = $row["sent_time"];

          echo date("H:i A",strtotime($time));?>
                
              </span>
            </div>
          </div>
        </div>
     <?php
    }
    }
    //if new message arrived updating its status
   $update = "update chat set read_status = 'S' where user_id='".$to_user_id."' and to_user_id ='".$user_id."'";
    if($conn->query($update)===TRUE){
    
    }
    else{
    echo $conn->error;
    }
  }?>
<!--Retrieving Old Messages Closed-->	
      </div>
</div>
	
	<div class="container">
	<div class="msg-bar">
	<div class="panel-footer">
  <form id="send" method="post" style="margin:10px 0px;">
                    <div class="input-group bar-shadow">
                        <input id="btn-input" type="text" class="form-control input-sm chat_input bar-size font-profile" placeholder="Write your message here..." name="msg"/>
                        <span class="input-group-btn">
                        <input type="hidden" name="to" value="<?php echo $_GET["id"];?>">
                         <input type="hidden" name="message_id" value="<?php echo $message_id?>">
                        <input type="submit" class="btn bar-btn btn-sm" id="btn-chat" style="font-size:18px;font-weight:bolder;color:white" value ="Send">
                        </span>
                    </div>
                    </form>
                </div>
	</div>
  </div>

	
</div>
</div>
	

</div>


	</div>
</div>
<?php
    include "footer.php";
    ?>
    </body>
	
    <script type="text/javascript" src="js/custom.js"></script>
<script>

$(document).ready(function(){
   $('.messagebox').animate({scrollTop: $('.messagebox').prop("scrollHeight")}, 500);
  var id = <?php echo $_GET["id"];?>;
  var time = "<?php echo date('H:i A');?>";
   function recieve(){
    $.ajax({
      url : "recieve.php",
      dataType : "html",
      data : {id:id},
      success:function(res){
	  if(res){
$(".messagebox").append(res);
  $('.messagebox').animate({scrollTop: $('.messagebox').prop("scrollHeight")}, 500);
      }
}
    })
}
setInterval(function(){
recieve();

},3000);

  $("#send").on("submit",function(){
var msg =$(".chat_input").val();
var sent = " <div class='row message-body'>          <div class='col-sm-8 message-main-sender'><div class='sender chat1-box '><div class='message-text'> "+ msg + "</div><span class='message-time pull-right'>"+time+"</span></div></div></div>";
if(msg==""){
  // alert("enter message please");
}
else{
  $(".messagebox").append(sent);
  
  $('.messagebox').animate({scrollTop: $('.messagebox').prop("scrollHeight")}, 500);
$.ajax({
        url : "send.php",
        dataType : "json",
        data : $("#send").serialize(),
        success:function(res){


        }

      })
$(".chat_input").val("");
}
return false;
  })
})
</script>
    </html>

	    </html>
 