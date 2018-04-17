<?php
if(isset($_GET["id"])){
    // echo $_GET["id"];
include "connect.php";
$id = $_GET["id"];

$get_data = "select * from register left join user_profiles on register.id = user_profiles.user_id where register.id='".$id."'";
$get_result = mysqli_query($conn,$get_data);
$get_posts = "select *,user_posts.id as post_id from register left join user_posts on register.id=user_posts.user_id where user_posts.user_id='".$id."' order by budat DESC";
$get_post_result = mysqli_query($conn,$get_posts);

}
else{
$id = "";
}


?>