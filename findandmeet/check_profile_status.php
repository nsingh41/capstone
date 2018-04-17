<?php
session_start();
if(isset($_SESSION["username"]))
{
	include"connect.php";
	$email = $_SESSION["email"];
	$check = "select email from user_profiles where email ='".$email."'";
	$result = mysqli_query($conn,$check);
	// echo "<pre>";print_r($result);die;
	if(mysqli_num_rows($result)>0){
		$hobby = $looking = $interest = $status ="";
		$profile_query = "SELECT hobby,looking_for,interest,status from user_profiles where email = '".$email."'";
		$profile_result = mysqli_query($conn,$profile_query);
		 // echo "<pre>";print_r($profile_result);die;
		if(mysqli_num_rows($profile_result)>0){
			while($row = mysqli_fetch_assoc($profile_result)){
				$hobby = $row["hobby"];
				$looking = $row["looking_for"];
				$interest = $row["interest"];
				$status = $row["status"];
			}
		}
		$resp = array('hobby'=>$hobby,'looking'=>$looking,'interest'=>$interest,'status'=>$status );
		echo json_encode($resp);
	}

}

else
{

	header("Location:index.php");
}

?>