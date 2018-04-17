<?php
session_start();
if(isset($_SESSION["username"]))
{
    include "connect.php";
    $id = $_SESSION["id"];
    if(isset($_POST["fetch_post"])){
        $profile_query = "select register.id, register.f_name,register.l_name,register.gender,user_profiles.image,user_posts.post,user_posts.budat,user_posts.id as post_id FROM register RIGHT JOIN user_profiles ON register.id=user_profiles.user_id RIGHT JOIN message_id on message_id.user_id = register.id RIGHT JOIN user_posts on register.id=user_posts.user_id where message_id.user_id='".$id."' or message_id.to_user_id='".$id."' group by user_posts.post order by user_posts.budat DESC ";
        $result = mysqli_query($conn,$profile_query);
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
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){?>
            <div class="show_posts">
                <div class="row">
                    <table>
                        <tr>
                         <?php if($row["image"]!=""){?>
                   <td rowspan="2"><img src="<?php echo $row["image"];?>" class="all-img" style="width:50px;height:50px;margin:5px;">
                            </td>
                  <?php }
                  else{
                    ?>
                   <td rowspan="2"> <img class="card-img-top all-img" src="img/img_avatar1.png" alt="Profile Pic" border="0" style="width:50px;height:50px;margin:5px;" ></td>
                    <?php }?>
                           
                            <td><a href="user_profiles.php?id=<?php echo $row["id"];?>"><h4 class="card-title" style="margin:0px;"><?php echo $row["f_name"].' '.$row["l_name"];?></h4></a></td>


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
                    <input type="hidden"  value="<?php echo $row["post_id"];?>" id="userid">
                    <input type="hidden"  value="<?php echo $row["id"];?>" id="id">
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
                        <i class="fas fa-thumbs-up like_<?php echo $row["post_id"];?>" data-id="<?php echo $row["id"];?>" data-userid="<?php echo $row["post_id"];?>" id="like"><?php echo $count_like;?> Liked</i>

                        <?php
}
}
                    }
                    else{
                    	$get_like_count = "select count(*) as count,post_id from post_likes where to_user_id='".$id."' and post_id = '".$row["post_id"]."'";
                        $get_like_result = mysqli_query($conn,$get_like_count);
                        if(mysqli_num_rows($get_like_result)>0){
                            while($row4 = mysqli_fetch_assoc($get_like_result)){
                                $count_like = $row4["count"];
                        ?>
                        <i class="far fa-thumbs-up like_<?php echo $row["post_id"];?>"   data-id="<?php echo $row["id"];?>" data-userid="<?php echo $row["post_id"];?>" id="like"><?php echo $count_like;?> Like</i>
                        <?php
                    }
                }
            }
                    ?>
                    <i class="far fa-comment" data-id="<?php echo $row["id"];?>" data-userid="<?php echo $row["post_id"];?>" id="comment">
                        <?php 

                        $post_id = $row["post_id"];
                        $get_comments_count = "select count(*) as count from post_comments where post_id = '".$post_id."'";
                        $result_comment_count = mysqli_query($conn,$get_comments_count);
                        if(mysqli_num_rows($result_comment_count)>0){
                            while($row2 = mysqli_fetch_assoc($result_comment_count)){
                                echo 'Comment['.$row2["count"].']';
                            }
                        }
                        else{
                            ?>
                            Comment
                            <?php
                        }
                        ?>



                    </i><br>
                    <div id="comment_hide_<?php echo $row["post_id"];?>" style="display: none;"  data-id="<?php echo $row["id"];?>" data-userid="<?php echo $row["post_id"];?>">
                        <input type="text" class="comment" id="comment_<?php echo $row["post_id"];?>" name="comment" placeholder="Enter Comment......">
                        <input type="submit" class="btn btn-custom" id="comment_post" value="comment" data-id="<?php echo $row["id"];?>" data-userid="<?php echo $row["post_id"];?>">
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
                                         <p style="font-size: 10px;"><?php echo time_elapsed_string($row1["budat"]);?> </p>
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
?><h2 class="card-title font-text" style="text-align:center;padding:150px 0px">Add Friends To See Posts!</h2>
<?php
}
}
}
// else{

//     header("Location: profile.php");
// }
else{
    header("Location: index.php");
}


?>