<?php
include "connect.php";
if(isset($_REQUEST["email"]))
{
	$email = $_REQUEST["email"];
	$query = "select email from register where email = '".$email."'";
	$result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0){
		$res = array("status"=>1);
		echo json_encode($res);
	}
	else {
	$res = array("status"=>0);
		echo json_encode($res);	
	}

}

?>