<?php
 date_default_timezone_set('Etc/GMT+7');
function time_elapsed_string($datetime, $full = false) {
	$now = new DateTime();
	// date_default_timezone_set('Asia/Kolkata');

	$ago = new DateTime($datetime);
	$diff = $now->diff($ago);

	$diff->w = floor($diff->d / 7);
	$diff->d -= $diff->w * 7;

	$string = array(
		'y' => 'year',
		'm' => 'month',
		'w' => 'week',
		'd' => 'day',
		'h' => 'hour',
		'i' => 'minute',
		's' => 'second',
		);
	foreach ($string as $k => &$v) {

		if ($diff->$k) {

			$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');

		} else {
			unset($string[$k]);
		}
	}

	if (!$full) $string = array_slice($string, 0, 1);
	return $string ? implode(', ', $string) . ' ago' : 'just now';
}
	include "connect.php";
	$user_id = $_SESSION["id"];
	$request_id = array();
	$requests = array();
	$arr["request"] = array();
	$arr1["request_status"] = array();
	$arr2["like_status"] = array();
	$arr3["comment_status"] = array();
	$arr4["get_messages"] = array();
	$requests_status_id = array();
	$i=0;
	$j = 0;
	$get_request = "select user_id from requests where to_user_id ='".$user_id."' and request_status='U'";
	$request_result = mysqli_query($conn,$get_request);
	if(mysqli_num_rows($request_result)>0){
		while($row = mysqli_fetch_assoc($request_result)){
			$request_id[$i] = $row["user_id"];
			$i++;
		}
		foreach($request_id as $req){

			$get_profiles = "select register.id, register.f_name,register.l_name,user_profiles.image from register left join user_profiles on register.id = user_profiles.user_id where register.id = '".$req."'";
			$profiles_result = mysqli_query($conn,$get_profiles);
			if(mysqli_num_rows($profiles_result)>0){
				while($row = mysqli_fetch_array($profiles_result)){
					$img_path = $row["image"];
					if($img_path==""){
						$img_path="img/img_avatar1.png";
					}
					$requests[$j] ="<div id='message_".$row["id"]."' style='cursor:pointer;'><div id='action_".$row["id"]."'><table><tr><td rowspan='2'><img src='".$img_path."' style='width: 50px;height: 50px;margin-right: 10px;border: 1px solid black;'></td><td style='width:100%;'>". $row["f_name"] . " " . $row["l_name"] . "</td></tr><tr><td> <button class='btn custom-sign btn-req' onClick='accept_req(this)' value='".$row["id"]."' >Confirm</button><button class='btn btn-danger btn-req' onClick='cancel_req(this)' value='".$row["id"]."'>Cancel</button></td></tr></table></div></div>";
					++$j;

				}

			}

		}
		$arr["request"] = array('type'=>'notification','count'=>$j,'data'=>$requests);
// echo json_encode($arr);	
	}
	else{
		$requests[$j] = "<div style='cursor:pointer;'>No Friend Requests!</div>";
		$arr["request"] = array('type'=>'notification','count'=>$j,'data'=>$requests);
// echo json_encode($arr);	


	}
//Get Request Status
	$k = 0;
	$m=0;
	$request_status = "select * from requests where user_id ='".$user_id."' and request_status!='U'";
	$res = mysqli_query($conn,$request_status);
	if(mysqli_num_rows($res)>0){
		while($row = mysqli_fetch_assoc($res)){
			$requests_status_id[$k] = $row["to_user_id"];
			$k++;
		}
		
		foreach ($requests_status_id as $key => $value) {

			$check_status = "select requests.request_status,register.f_name,register.l_name,register.id from requests left join register on requests.to_user_id = register.id where requests.user_id = '".$user_id."' and requests.to_user_id='".$value."'";
			$res = mysqli_query($conn,$check_status);
			if(mysqli_num_rows($res)>0){
				while($row = mysqli_fetch_assoc($res)){
					if($row["request_status"] == "R")
					{
						$data[$m] = "<div class='alert alert-danger alert-dismissible' ><input type='hidden' value='".$row['id']."' id='usrid'><a type='' style='cursor:pointer;' class='close delete' data-not_type='request'  data-usrid='".$row["id"]."' data-dismiss='alert'>&times;</a> Request Rejected by ".$row["f_name"]." ".$row["l_name"]."</div>";
// $arr1["request_status"] = array("type"=>'request_status','data'=>$data,'status'=>0);
						$m++;
// echo json_encode($arr1);
					} 
					else if($row["request_status"] == "A"){
						$data[$m] = "<div class='alert alert-success alert-dismissible' ><input type='hidden' value='".$row['id']."' id='usrid'><a type='' style='cursor:pointer;' class='close delete' data-not_type='request'  data-usrid='".$row["id"]."' data-dismiss='alert'>&times;</a> Request Accepted by ".$row["f_name"]. " " .$row["l_name"] ."</div>";
// $arr1["request_status"] = array("type"=>'request_status','data'=>$data,'status'=>1);
						$m++;
// echo json_encode($arr1);

					}
				}
			}
		}
		$arr1["request_status"] = array("type"=>'request_status','data'=>$data,'count'=>$m,'status'=>1);
	}
	else{
		$arr1["request_status"] = array("type"=>'request_status','count'=>$m,'status'=>0);
	}

//Request Status Closed!
//Get Post Status
	$l = 0;
	$o=0;
	$post_status_id=array();
// $post_id
	$post_status = "select * from post_likes where to_user_id='".$user_id."' and read_status='U' and user_id!='".$user_id."'";
	$post_result = mysqli_query($conn,$post_status);
	if(mysqli_num_rows($post_result)>0){
		while($row = mysqli_fetch_assoc($post_result)){
			$post_status_id[$l]["post_user_id"]=$row["user_id"];
			$post_status_id[$l]["post_id"]=$row["post_id"];
			$post_status_id[$l]["time"]=$row["budat"];
			$l++;
		}
		
		foreach($post_status_id as $id){
			$get_user_data = "select id,f_name,l_name from register where id = '".$id["post_user_id"]."'";
			$get_result = mysqli_query($conn,$get_user_data);
			if(mysqli_num_rows($get_result)>0){
				while($row = mysqli_fetch_assoc($get_result)){
					$data2[$o] = "<div class='alert alert-success alert-dismissible' >
					<input type='hidden'  value='" .$row["id"]."' id='usrid'>
					<a type='' style='cursor:pointer;' class='close delete' data-not_type='like' data-post_id='".$id["post_id"]."' data-usrid='".$row["id"]."' data-dismiss='alert'>&times;</a>
					". $row['f_name']. " ". $row['l_name'] . " Liked Your Post.
					<p style='font-size: 10px'>" .time_elapsed_string($id['time']) ."</p>
				</div>";
				$o++;
			}
		}
	}
	$arr2["like_status"] = array("type"=>'like_status','count'=>$o,'data'=>$data2);		
}
else{
$arr2["like_status"] = array("type"=>'like_status','count'=>$o);	

}



//Post Status Closed
//Get Post comments
$m = 0;
$p=0;
$post_comment_id=array();
$post_comment = "select * from post_comments where user_id='".$user_id."' and read_status='U' and from_user_id!='".$user_id."'";
$comment_result = mysqli_query($conn,$post_comment);

if(mysqli_num_rows($comment_result)>0){
	while($row = mysqli_fetch_assoc($comment_result)){
		$post_comment_id[$m]["comment_user_id"]=$row["from_user_id"];
		$post_comment_id[$m]["post_id"]=$row["post_id"];
		$post_comment_id[$m]["time"]=$row["budat"];
		$m++;
	}

	
	foreach($post_comment_id as $id){
		$get_user_data = "select id,f_name,l_name from register where id = '".$id["comment_user_id"]."'";
		$get_result = mysqli_query($conn,$get_user_data);
		if(mysqli_num_rows($get_result)>0){
			while($row = mysqli_fetch_assoc($get_result)){

				$data3[$p] =  "<div class='alert alert-success alert-dismissible'>
				<input type='hidden' value='".$row["id"]."' id='usrid'>

				<a type='' style='cursor:pointer;' class='close delete' data-not_type='comment' data-post_id='".$id["post_id"]."' data-usrid='".$row["id"]."' data-dismiss='alert'>&times;</a>
				".$row["f_name"]. " ". $row["l_name"]. " Commented on Your Post.
				<p style='font-size: 10px'>" .time_elapsed_string($id['time']) ."</p>
			</div>";
			$p++;
		}
	}
}

$arr3["comment_status"]=array("type"=>'comment_status','count'=>$p,'data'=>$data3);

}
else{
$arr3["comment_status"]=array("type"=>'comment_status','count'=>$p);

}



//Post comments Closed
//post messages 
$id = $_SESSION["id"];
$q = 0;
$count = 0;
$data1 = array();
                    $get_count = "SELECT count(*) as total FROM chat WHERE to_user_id='".$id."' and read_status='U'";
                    $results = mysqli_query($conn,$get_count);
                    if(mysqli_num_rows($results)>0){
                        while($row = mysqli_fetch_assoc($results)){
                            $count = $row["total"];
                        }
                    }


$per_count="";
$latest_msg="";
$message_query = "select max(ud) as latest,id,count(sent_time) as count,f_name,l_name,send,to_user_id,read_status,sent_time from(select register.id, register.f_name,register.l_name,register.gender,chat.send,chat.to_user_id,chat.sent_time,chat.send as latest,chat.read_status,chat.id as ud FROM register RIGHT JOIN chat on register.id=chat.user_id where chat.to_user_id='".$id."' and chat.read_status='U' order by sent_time desc) as a GROUP by a.id  ";
                        $get_res = mysqli_query($conn,$message_query);
                        if(mysqli_num_rows($get_res)>0){
                        while($row = mysqli_fetch_assoc($get_res)){
                        
                        		$u_name = "";
                        		$get_id = $row["id"];
                        		$get_latest = $row["latest"];
                       	$get_id_data = "select * from register where id ='".$get_id."'";
                       	$get_id_res = mysqli_query($conn,$get_id_data);
                       	if(mysqli_num_rows($get_id_res)>0){
                       		while($row_id = mysqli_fetch_assoc($get_id_res)){
                       			$u_name = $row_id["f_name"]. " " . $row_id["l_name"];
                       		}
                       	}
                       	$get_id_message_count = "SELECT count(*) as total FROM chat WHERE to_user_id='".$id."' and user_id='".$get_id."' and read_status='U'";
                       	$get_id_message_count_res = mysqli_query($conn,$get_id_message_count);
                       	if(mysqli_num_rows($get_id_message_count_res)>0){
                       		while($row_count = mysqli_fetch_assoc($get_id_message_count_res)){
                       			$per_count = $row_count["total"];
                       		}
                       	}
                       	$latest_msg_q = "select send from chat where id='".$get_latest."'";
                       	$latest_msg_res = mysqli_query($conn,$latest_msg_q);
                       	if(mysqli_num_rows($latest_msg_res)>0){
                       		while($row_msg = mysqli_fetch_assoc($latest_msg_res)){
                       			$latest_msg = $row_msg["send"];
                       		}
                       	}
                        $data1[$q] =" <a class='dropdown-item black-color' href='chatbox.php?id=".$row["id"]."' style='cursor:pointer;'>
                        <h6 style='font-size:1.1rem;'><b>".$u_name."(".$per_count.")</b></h6>
                        <p>".$row["f_name"] ." ".$row["l_name"]." - ". mb_strimwidth($latest_msg, 0, 15, "...")."</p>
                        </a><hr>";
                        $q++;
                        
                        
                        }
                        $arr4["get_messages"]= array('type'=>'get_messages','data'=>$data1,'count'=>$count);
                        }
                        else{
                        	$data1[0]="<div style='cursor:pointer;'>No New Messages!</div>";

                        $arr4["get_messages"]= array('type'=>'get_messages','data'=>$data1,'count'=>0);
                        
                        }
                        

echo json_encode(array($arr,$arr1,$arr2,$arr3,$arr4));

?>