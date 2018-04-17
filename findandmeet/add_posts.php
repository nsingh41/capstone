<?php
//echo $_POST['post'];
session_start();
if(isset($_SESSION["id"])){
include "connect.php";
$id = $_SESSION["id"];
$count_like = 0;
$count_comment = 0;
if(isset($_POST["post"])){
$post_data = $_POST["post"];
if($post_data==""){
$res = array('status'=>'0');
echo json_encode($res);

}
else{
    // $post_data = mysql_real_escape_string($post_data);
    // echo htmlentities($post_data);die;
    
$query = "insert into user_posts (user_id,post) values('".$id."','".$post_data."')";
if($conn->query($query)===TRUE){
    $get_post_id = "select max(id) as max_id from user_posts";
    $max_post_id = "";
    $get_post_id_result = mysqli_query($conn,$get_post_id);
    if(mysqli_num_rows($get_post_id_result)>0){
        while($row = mysqli_fetch_assoc($get_post_id_result)){
            $max_post_id = $row["max_id"];
        }
    }
    $max_post_data = "";
    $send_post_id_data = "select *,user_posts.id as post_id,user_posts.user_id as my_id from user_posts left join register on user_posts.user_id = register.id left join user_profiles on user_profiles.user_id = user_posts.user_id where user_posts.id = '".$max_post_id."'";
    $send_post_id_data_result = mysqli_query($conn,$send_post_id_data);
    if(mysqli_num_rows($send_post_id_data_result)>0){
        while($row = mysqli_fetch_assoc($send_post_id_data_result)){
            $max_post_data = "abc";
        }
    }
$res = array('status'=>'1','post_id'=>$max_post_data);
echo json_encode($res);
}
else{
$res = array('status'=>'2');
echo json_encode($res);
}
}
}
else if($_POST["get_post"]){
$get_posts = "select *,user_posts.id as post_id,user_posts.user_id as my_id from user_posts left join register on user_posts.user_id=register.id left join user_profiles on user_posts.user_id = user_profiles.user_id where user_posts.user_id = '".$id."' order by budat DESC";
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime();
	date_default_timezone_set('Etc/GMT+7');
	
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
$result = mysqli_query($conn,$get_posts);
if(mysqli_num_rows($result)>0){
while($row = mysqli_fetch_assoc($result)){
?>
<div class="show_posts">
    <div class="row">
<table>
                        <tr>
                            <td rowspan="2"><img src="<?php echo $row["image"];?>" class="all-img" style="width:50px;height:50px;margin:5px;">
                            </td>
                            <td><a href="user_profiles.php?id=<?php echo $row["my_id"];?>"><h4 class="card-title" style="margin:0px;"><?php echo $row["f_name"].' '.$row["l_name"];?></h4></a></td>


                        </tr>
                        <tr>
                            <td><p style="font-size:12px;"><?php echo time_elapsed_string($row["budat"]);?></p>
                            </td>



                        </tr>

                    </table>
</div>
<hr style="margin:0px;">
    <div class="">
                    <h4><?php echo $row["post"];?></h4>
                    <hr style="margin:0px;">
                    <input type="hidden"  value="<?php echo $row["my_id"];?>" id="userid">
                    <input type="hidden"  value="<?php echo $row["post_id"];?>" id="id">
                    <?php 

                    $check_already_liked = "select * from post_likes where user_id ='".$id."' and post_id='".$row["post_id"]."'";
                    $check_res = mysqli_query($conn,$check_already_liked);
                    if(mysqli_num_rows($check_res)>0){
                        $get_like_count = "select count(*) as count,post_id from post_likes where to_user_id='".$id."' and post_id = '".$row["post_id"]."'";
                        $get_like_result = mysqli_query($conn,$get_like_count);
                        if(mysqli_num_rows($get_like_result)>0){
                            while($row4 = mysqli_fetch_assoc($get_like_result)){
                                $count_like = $row4["count"];
                                ?>
                                <i class="fas fa-thumbs-up like_<?php echo $row["post_id"];?>" data-id="<?php echo $row["my_id"];?>" data-userid="<?php echo $row["post_id"];?>" data-count_like="<?php echo $count_like;?>" id="like"><?php echo $count_like;?> Liked</i>
                                <?php
                            // echo $row4["count"];
                            }
                        }
                        ?>


                        <?php

                    }
                    else{
                          $get_like_count = "select count(*) as count,post_id from post_likes where to_user_id='".$id."' and post_id = '".$row["post_id"]."'";
                        $get_like_result = mysqli_query($conn,$get_like_count);
                        if(mysqli_num_rows($get_like_result)>0){
                            while($row4 = mysqli_fetch_assoc($get_like_result)){
                                $count_like = $row4["count"];
                            ?>
                        <i class="far fa-thumbs-up like_<?php echo $row["post_id"];?>" data-id="<?php echo $row["my_id"];?>" data-userid="<?php echo $row["post_id"];?>" data-count_like="<?php echo $count_like;?>" id="like"><?php echo $count_like;?> Likes</i>
                            <?php
                            }
                        }
                        ?>
                        

                        <?php
                    }
                    ?>
                    <i class="far fa-comment" data-id="<?php echo $row["my_id"];?>" data-userid="<?php echo $row["post_id"];?>" id="comment">
                        <?php 

                        $post_id = $row["post_id"];
                        $get_comments_count = "select count(*) as count from post_comments where post_id = '".$post_id."'";
                        $result_comment_count = mysqli_query($conn,$get_comments_count);
                        if(mysqli_num_rows($result_comment_count)>0){
                            while($row2 = mysqli_fetch_assoc($result_comment_count)){
                                $count_comment = $row2["count"];
                                echo '<span>Comment['.$count_comment.']</span>';
                            }
                        }
                        else{
                            ?>
                            Comment
                            <?php
                        }
                        ?>



                    </i><br>
                    <div id="comment_hide_<?php echo $row["post_id"];?>" style="display: none;"  data-id="<?php echo $row["my_id"];?>" data-userid="<?php echo $row["post_id"];?>">
                        <input type="text" class="comment" id="comment_<?php echo $row["post_id"];?>" name="comment" placeholder="Enter Comment......">
                        <input type="submit" class="btn btn-custom" id="comment_post" value="comment" data-id="<?php echo $row["my_id"];?>" data-userid="<?php echo $row["post_id"];?>">
                        <!--Fetching Comments-->
                        <div class="comment-section">
                            <?php
                            $post_id = $row["post_id"];
                            $get_comments = "select register.f_name,register.l_name,post_comments.user_id,post_comments.comment,post_comments.from_user_id,post_comments.budat from post_comments LEFT join register on register.id = post_comments.from_user_id where post_id = '".$post_id."' ";
                            $result_comment = mysqli_query($conn,$get_comments);
                            if(mysqli_num_rows($result)>0){
                                while($row1 = mysqli_fetch_assoc($result_comment)){
                                    ?>
                                    <div class="show_comments">
                                        <h5><?php echo $row1["f_name"]. " " . $row1["l_name"];?></h5>
                                         <p style="font-size: 10px;"><?php echo time_elapsed_string($row1["budat"]);?></p>
                                        <p><?php echo $row1["comment"]?> </p>
                                    </div>
                                    <?php
                                }
                            }
                            else{
                                ?>
                                <p id="no_comments_<?php echo $row["post_id"];?>">No Comments </p>    
                                <?php
                            }

                            ?>
                        </div>
                        <!--Fetching Comments Closed-->

                        <div id="user_comments_<?php echo $row["post_id"];?>"></div>
                    </div>
                </div>
</div>
<?php
}

}
else{
?><h4 class="card-title" style="text-align:center;">No Posts Yet!</h4>
<?php
} 
}
}

else{
header("Location:index.php");
}




?>