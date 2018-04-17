<?php
session_start();
if(isset($_SESSION["email"])){
include "connect.php";
$email = $_SESSION["email"];
$to_user_id = 20;
$user_id = "";
$get_user_id  = "select id from register where email = '".$email."'";
$id_result = mysqli_query($conn,$get_user_id);
// echo "<pre>";print_r($id_result);die;
if(mysqli_num_rows($id_result)>0){
while($row = mysqli_fetch_assoc($id_result)){

	$user_id = $row["id"];
}
}
$data = array();
$sent_messages = "select send,sent_time from chat where user_id='".$user_id."' and to_user_id = '".$to_user_id."'";
$recieve_messages = "select send,sent_time from chat where user_id='".$to_user_id."' and to_user_id = '".$user_id."'";
$send_result = mysqli_query($conn,$sent_messages);
$recieve_result = mysqli_query($conn,$recieve_messages);
// echo "<pre>";print_r($send_result);
// echo "<pre>";print_r($recieve_result);die;
if(mysqli_num_rows($send_result)>0){

	while($row = mysqli_fetch_assoc($send_result)){
		 echo $row["send"]. ' ' .$row["sent_time"]."<br>";
	
	}
}
if(mysqli_num_rows($recieve_result)>0){

	while($row = mysqli_fetch_assoc($recieve_result)){
		 echo $row["send"]. ' ' .$row["sent_time"]."<br>";
	
	}
}

}
else{
	echo "yoooo";
}





?>