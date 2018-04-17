

<?php

include"connect.php";

$firstname = $lastname = $email = $day = $month = $gender = $year = $password = $confirm_password = "";

  

    $firstname = $_REQUEST['firstname'];

    $lastname = $_REQUEST['lastname'];

    $email = $_REQUEST['email'];

    $gender = $_REQUEST['gender'];
    if($gender="M")
    {
        $gender = "Male";
    }
    else
    {
        $gender = "Female";
    }

    $day = $_REQUEST['day'];


    $month = $_REQUEST['month'];

    $year = $_REQUEST['year'];

    $dob = $year . "-" . $month . "-" .$day;

    $password = $_REQUEST['password'];

    $confirm_password = $_REQUEST['confirm_password'];

    $insert = "insert into register(f_name,l_name,email,gender,dob,pwd) values('".$firstname."','".$lastname."','".$email."','".$gender."','".$dob."','".$password."') ";



if ($conn->query($insert) === TRUE) {

    $resp =  array("status"=>1);

    echo json_encode($resp);

} else {

    $resp = array("status"=>0);

    echo json_encode($resp);

}



  



?>