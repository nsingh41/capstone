<?php
session_start();
include "connect.php";
 date_default_timezone_set('Etc/GMT+7');
if(isset($_SESSION["email"]))
{
	   function time_elapsed_string($datetime, $full = false) {
            $now = new DateTime();
            // date_default_timezone_set('Canada/Central');

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
		$get_id = $_GET["id"];

	$email = $_SESSION["email"];
	$reciever_id = "";
	$user_id = "select id from register where email = '".$email."'";
	$result = mysqli_query($conn,$user_id);
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){
			$reciever_id = $row ["id"];
		}
			$recieve = "select send,sent_time from chat where user_id ='".$get_id."' and to_user_id = '".$reciever_id."' and read_status='U'";
	$msg_result = mysqli_query($conn,$recieve);
	// echo "<pre>";print_r($msg_result);die;
	if(mysqli_num_rows($msg_result)>0){
		while($row = mysqli_fetch_assoc($msg_result)){
			?><div class="row message-body">
          <div class="col-sm-12 message-main-receiver">
            <div class="receiver chat-box">
              <div class="message-text">

               <?php echo $row["send"];?>
              </div>
              <span class="message-time pull-right">
                <?php
                $time = $row["sent_time"];
                 echo date('H:m A',strtotime($time));?>
              </span>
            </div>
          </div>
        </div>
        <?php
		}
		 $update = "update chat set read_status = 'S' where user_id='".$get_id."' and to_user_id ='".$reciever_id."'";
	  if($conn->query($update)===TRUE){
	  // echo "updated!";
	  }
	  else{
		echo $conn->error;
	  }
	}
	}
	else{
		echo "";
	}

}


?>