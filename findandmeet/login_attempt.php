<?php

include 'connect.php';



$email = $_REQUEST['email'];

$password = $_REQUEST['pwd'];

$query = "select * from register where email='".$email."' and pwd = '".$password."'";

$result = mysqli_query($conn,$query);

// echo "<pre>";print_r($result);die;

if(mysqli_num_rows($result)>0){
while ($row=mysqli_fetch_assoc($result)) {
	$f_name = $row["f_name"];
	$l_name = $row["l_name"];
	$email = $row["email"];
	$user_id = $row["id"];
	$username = $f_name . " " . $l_name;
	session_start();
	$_SESSION["username"]=$username;
	$_SESSION["email"]=$email;
	$_SESSION["id"]=$user_id;
	$id = "";
	$get_id = "select id from register where email = '".$_SESSION["email"]."'";
	$result = mysqli_query($conn,$get_id);
	// echo "<pre>";print_r($result);die;
	if(mysqli_num_rows($result)>0){
while($row = mysqli_fetch_assoc($result)){
$id = $row["id"];
}
$check_id_exists = "select user_id from online where user_id='".$id."'";
$check_result = mysqli_query($conn,$check_id_exists);
if(mysqli_num_rows($check_result)>0){
	// date_default_timezone_set('Asia/Calcutta'); 
	$update_activity = "update online set last_activity = '".date('Y-m-d H:i:s')."' where user_id='".$id."'";
	
	if($conn->query($update_activity)==TRUE){
		// echo "updated successfully!";
	}
	else{
		echo $conn->error();
	}

}
else{
$insert_activity = "insert into online (user_id) values('".$id."')";
	if($conn->query($insert_activity)==TRUE){
		// echo "created Successfully";

	}
	else{
		echo $conn->error();
	}
}

	}
    // if(isset($_SESSION['username'])) {
    // $setLogged= mysql_query("UPDATE `useraccounts` SET `logged` = '".time()."' WHERE `id` = '".$_SESSION['userID']."'") or die(mysql_error());
    // }
    


	// echo "matched";
}
	$resp = array("status"=>1);

	echo json_encode($resp);

	}



else {

	// echo "not matched";

	$resp = array("status"=>0);

	echo json_encode($resp);



}

?>