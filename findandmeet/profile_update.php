<?php 
session_start();
if(isset($_SESSION["id"])){

	include 'connect.php';
	$id = $_SESSION["id"];
	if(isset($_REQUEST["hobby"])){
		$hobby = implode(', ',$_REQUEST["hobby"]);

		$update = "update user_profiles set hobby='".$hobby."' where user_id='".$id."'";
		if ($conn->query($update) === TRUE) {
			
			$resp = array('status' =>1);
			echo json_encode($resp);
		} else {
			
			$resp = array('status' =>0);
			echo json_encode($resp);
		}
	}
	if(!isset($_REQUEST["hobby"])){
		$resp = array('status' =>0);
			echo json_encode($resp);
	}
	else if(isset($_REQUEST["looking_for"])){
		$looking_for = $_REQUEST["looking_for"];
		if($looking_for == "Looking For"){
			$resp = array('status' =>0);
			echo json_encode($resp);
		}
		else{
		$update = "update user_profiles set looking_for='".$looking_for."' where user_id='".$id."'";
		if ($conn->query($update) === TRUE) {
			
			$resp = array('status' =>1);
			echo json_encode($resp);
		} else {
			
			$resp = array('status' =>0);
			echo json_encode($resp);
		}
			}
	}
	else if(isset($_REQUEST["interest"])){
		$interest = $_REQUEST["interest"];
		if($interest == "I'm Intrested In"){
			$resp = array('status' =>0);
			echo json_encode($resp);
		}
		else{
		$update = "update user_profiles set interest='".$interest."' where user_id='".$id."'";
		if ($conn->query($update) === TRUE) {
			
			$resp = array('status' =>1);
			echo json_encode($resp);
		} else {
			
			$resp = array('status' =>0);
			echo json_encode($resp);
		}
		}
	}
	else if(isset($_REQUEST["status"])){
		$status = $_REQUEST["status"];
		
		if($status == "Status"){
			$resp = array('status' =>0);
			echo json_encode($resp);
		}
		else{
		$update = "update user_profiles set status='".$status."' where user_id='".$id."'";
		if ($conn->query($update) === TRUE) {
			
			$resp = array('status' =>1);
			echo json_encode($resp);
		} else {
			
			$resp = array('status' =>0);
			echo json_encode($resp);
		}
}
	}
	
}
else{

	header("Location: index.php");
}






?>