<?php
if(isset($_SESSION["email"])){
include "connect.php";
$email = $_SESSION["email"];
$query = "SELECT f_name,l_name,email,gender,dob from register where email = '".$email."'";

$username = $email = $gender = $age = "";
$result = mysqli_query($conn,$query);

// echo "<pre>";print_r($result);die;
if(mysqli_num_rows($result)>0){
	while ($row = mysqli_fetch_assoc($result)){
	$username = $row["f_name"] ."   ". $row["l_name"];
	$email = $row["email"];
	$gender = $row["gender"];
	$age = $row["dob"];		
		// $diff = $date->diff($date1);
		// echo $diff->y;
	}
}
else {
	echo mysqli_error();
}


}
else{
	header("Location:index.php");
}
?>
