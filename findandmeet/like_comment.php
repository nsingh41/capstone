<?php
session_start();
include('connect.php');
if(isset($_SESSION["id"]))
{
	$user_id = $_SESSION["id"];
	if(isset($_REQUEST["like"])){
	$get_to_user_id	 = $_REQUEST["user_id"];
	$get_post_id = $_REQUEST["post_id"];

	$check_already_liked = "select * from post_likes where post_id ='".$get_post_id."' and user_id='".$user_id."' and to_user_id = '".$get_to_user_id."'";
	$res = mysqli_query($conn,$check_already_liked);
	if(mysqli_num_rows($res)>0){
		$delete_like = "delete from post_likes where post_id ='".$get_post_id."' and user_id='".$user_id."' and to_user_id = '".$get_to_user_id."'";
		if($conn->query($delete_like)===TRUE){
					$arr =  array('status' => 0);
				echo json_encode($arr);
		}
		else{
			echo $conn->error;
		}

	}
		else{
			$add_like = "insert into post_likes(user_id,post_id,to_user_id,read_status) values('".$user_id."','".$get_post_id."','".$get_to_user_id."','U')";
			if($conn->query($add_like)===TRUE){
				$arr =  array('status' => 1);
				echo json_encode($arr);
			}
			else{
				echo $conn->error;
			}
		}
	}
	if(isset($_REQUEST["comment"])){
		$id = $_REQUEST["id"];
		$post_id = $_REQUEST["post_id"];
		$comment = $_REQUEST["comment"];
		$add_comment = "insert into post_comments (user_id,post_id,from_user_id,comment,read_status) values('".$id."','".$post_id."','".$user_id."','".$comment."','U')";
		if($conn->query($add_comment)>0){
		$arr =  array('status' => 1);
				echo json_encode($arr);	
		}
		else{
			echo $conn->error;
		}
	}



	}


else{
	header("Location: index.php");
}

?>