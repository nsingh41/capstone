<?php
session_start();
// echo print_r($_FILES["image"]["name"]);die; 
// echo print_r($_REQUEST);die;
include "connect.php";



if(isset($_SESSION["username"])){

	$hobby = implode(', ',$_REQUEST["hobby"]);
	$looking = $_REQUEST["looking"];
	$interest = $_REQUEST["interest"];
	$status = $_REQUEST["status"];
	$email = $_SESSION["email"];
	$id = $_SESSION["id"];
	$check_id_exists = "select user_id from user_profiles where user_id = '".$id."'";
	$check_result = mysqli_query($conn,$check_id_exists);
	if(mysqli_num_rows($check_result)>0){
		 $update_data = "update user_profiles set email = '".$email."', hobby='".$hobby."', looking_for='".$looking."', interest = '".$interest."', status = '".$status."' where user_id = '".$id."'";
 if($conn->query($update_data)===TRUE){
$resp = array('status' =>1);
		echo json_encode($resp);

 }
 else{
 	$resp = array('status' =>0);
 	echo $conn->error;
		echo json_encode($resp);
 }
	}
	else{	
	$query = "insert into user_profiles(email,user_id,hobby,looking_for,interest,status) values ('".$email."','".$id."','".$hobby."','".$looking."','".$interest."','".$status."')";
	
	
	if ($conn->query($query) === TRUE) {
		$resp = array('status' =>1);
		echo json_encode($resp);
	} else {
		$resp = array('status' =>0);
		echo json_encode($resp);
	}
	}
}
else{
	header("Location:index.php");
}

?>