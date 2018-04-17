<?php
session_start();
if(isset($_SESSION["id"])){
	include "connect.php";

	$user_id = $_SESSION["id"];
	$to_user_id = $_REQUEST["user_id"];
	$not_type = $_REQUEST["not_type"];
	if($not_type == "like"){
		$post_id = $_REQUEST["post_id"];
		$update_like = "update post_likes set read_status = 'R' where user_id ='".$to_user_id."' and post_id = '".$post_id."' and to_user_id = '".$user_id."'";
		if($conn->query($update_like)===TRUE){
			echo "updated!";
		}
		else{
			echo $conn->error;
		}
		// echo "like";
	}
	else if($not_type == "request"){
			$delete_request = "delete from requests where user_id='".$user_id."' and to_user_id='".$to_user_id."'";
		if($conn->query($delete_request)===TRUE){
			echo "delete_successful";
		}
		else{
			echo $conn->error;
		}

	}
	else if($not_type == "comment"){
		$post_id = $_REQUEST["post_id"];
		$update_like = "update post_comments set read_status = 'R' where user_id ='".$user_id."' and post_id = '".$post_id."' and from_user_id = '".$to_user_id."'";
		if($conn->query($update_like)===TRUE){
			echo "updated!";
		}
		else{
			echo $conn->error;
		}
	}
	else{
		header("Location: index.php");
	}
}

else{
	header("Location:index.php");
}

?>