<?php
session_start();

// echo date('Y-m-d H:i:s',strtotime(date('h:i:sa')));die;
include "connect.php";
if(isset($_SESSION["email"])){
$email = $_SESSION["email"];
$message = $_REQUEST["msg"];
$message_id = $_REQUEST["message_id"];
$to = $_REQUEST["to"];
$get_id = "select id from register where email ='".$email."'";
$id_result = mysqli_query($conn,$get_id);
$id = "";
if(mysqli_num_rows($id_result)>0){
	while ($row = mysqli_fetch_assoc($id_result)){
		$id = $row["id"];
	}
	$msg = "insert into chat (user_id,send,to_user_id,message_id,read_status) values('".$id."','".$message."','".$to."','".$message_id."','U')";

	if($conn->query($msg)==TRUE){
		$res  = array('status' => 1 );
		echo json_encode($res);
	}
	else{
		echo $conn->error;
$res  = array('status' => 0);
echo json_encode($res);		
	}
}	
}
?>