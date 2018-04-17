<?php

if(isset($_REQUEST["email"])){
	$email = $_REQUEST["email"];
	$name = $_REQUEST["name"];
	$lname = $_REQUEST["lname"];
	$phno = $_REQUEST["phno"];
	$msg = $_REQUEST["msg"];
	
$message = "From:" .$email ."<br>Name:".$name ." " .$lname ."<br>Contact Info:".$phno."<br>Message:".$msg;


$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);
if(!mail("rajatsharma1201@gmail.com", "Enquiry" ,$msg))
{
	echo "error";
}
else{
	echo "working";
}

 

}
else{
$res = array('status'=>0);
echo json_encode($res);
	
}

?>