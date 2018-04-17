<?php 
session_start();
if(isset($_SESSION["id"])){
include 'connect.php';
$request_id = $_GET["id"];
$user_id = $_SESSION["id"];
$check_already_sent = "select * from requests where user_id = '".$user_id."' and to_user_id = '".$request_id."'";
$result = mysqli_query($conn,$check_already_sent);
if(mysqli_num_rows($result)>0){
header("Location:matchlist.php?id=".$request_id."&status=0");
}
else{
$insert = "insert into requests (user_id,to_user_id,request_status) values ('".$user_id."','".$request_id."','U')";
if($conn->query($insert)===TRUE){
header("Location:matchlist.php?id=".$request_id."&status=1");
}	
else{
	echo $conn->error;
}
}


}

else{
	header("Location: index.php");
}


?>