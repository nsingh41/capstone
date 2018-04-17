<?php 
session_start();
if(isset($_SESSION["email"])){
	include "connect.php";
	include "get_requests.php";
	$email = $_SESSION["email"];
	$id = "";
	$get_id = "select id from register where email = '".$email."'";
	$result = mysqli_query($conn,$get_id);

	// echo "<pre>";print_r($result);die;
	if(mysqli_num_rows($result)>0){
while($row = mysqli_fetch_assoc($result)){
$id = $row["id"];
}
// date_default_timezone_set('Asia/Calcutta');
$update_activity = "update online set last_activity = '".date('Y-m-d H:i:s')."' where user_id='".$id."'";
if($conn->query($update_activity)){

}
else{
	echo $conn->error();
}
}
}
?>