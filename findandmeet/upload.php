<?php
session_start();
include"connect.php";
$uploaddir = 'uploads/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
$email = $_SESSION["email"];
echo "<p>";

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
  echo "File is valid, and was successfully uploaded.\n";
  $check = "select email from user_profiles where email = '".$email."'";
  $result = mysqli_query($conn,$check);

  if(mysqli_num_rows($result)>0){
  	$update = "update user_profiles set img='".$uploadfile."' where email = '".$email."'";
  	
if ($conn->query($update) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

  }
  else{
  $query = "insert into user_profiles email,img values('".$email.",'".$uploadfile."')";  	
  }

} else {
   echo "Upload failed";
}



?> 