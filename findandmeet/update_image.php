<?php
session_start();
if(isset($_SESSION["email"])){
include("connect.php");
if($_FILES["image"]["name"] != '')
{
 $test = explode('.', $_FILES["image"]["name"]);
 $ext = end($test);//getting and extracting extension of file and saving it into a variable 
 $name = rand(100, 999) . '.' . $ext;//assigning a new random name
 $location = './uploads/' . $name; //assigning location where image will be stored 
 move_uploaded_file($_FILES["image"]["tmp_name"], $location); // moving it to uploads folder
 $email = $_SESSION["email"];
 	$user_id = $_SESSION["id"];
$check_id_exists = "select user_id from user_profiles where user_id = '".$user_id."'";
$check_result = mysqli_query($conn,$check_id_exists);
if(mysqli_num_rows($check_result)>0){
 // echo $user_id;die;
 $update_image = "update user_profiles set image ='".$location."' where user_id = '".$user_id."'";
 if($conn->query($update_image)===TRUE){
echo "updated!";

 }
 else{
 	echo $conn->error;
 }	
 }
 else{
 	
 $insert_image = "insert into user_profiles (user_id,image) values('".$user_id."','".$location."')";
 if($conn->query($insert_image)===TRUE){
echo "updated!";

 }
 else{
 	echo $conn->error;
 }		
 }
 

}
else{
	echo "something wrong";
}
}
else{
	header("Location:index.php");
}

?>