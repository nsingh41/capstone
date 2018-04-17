<?php 
session_start();
include "connect.php";
if(isset($_REQUEST["accept_id"])){
	$user_id = $_SESSION["id"];
	$from_user_id = $_REQUEST["accept_id"];
	// echo $user_id . $from_user_id;
	$check_status = "select * from message_id where user_id = '".$user_id."' and to_user_id ='".$from_user_id."'";
	$check_result = mysqli_query($conn,$check_status);
	if(mysqli_num_rows($check_result)>0){
		echo "message_id already exists!";
	}
	else{
		$generate_message_id = rand(10000,99999);
		$insert_message_ids = "insert into message_id (user_id,message_id,to_user_id) values('".$user_id."','".$generate_message_id."','".$from_user_id."');";
		$insert_message_ids.="insert into message_id (user_id,message_id,to_user_id) values('".$from_user_id."','".$generate_message_id."','".$user_id."');";
		$insert_message_ids .="update requests set request_status='A' where user_id='".$from_user_id."' and to_user_id='".$user_id."'";
		if($conn->multi_query($insert_message_ids)===TRUE){
			echo "insert and delete successful";
			
		}
		else{
			echo $conn->error;
		}
	}

}

if(isset($_REQUEST["cancel_id"])){
$user_id = $_SESSION["id"];
	$from_user_id = $_REQUEST["cancel_id"];
	$delete_request = "update requests set request_status='R' where user_id='".$from_user_id."' and to_user_id='".$user_id."'";
	if($conn->query($delete_request)===TRUE){
		echo "delete successful!";
	}
	else{
		echo $conn->error;
	}
}

?>
