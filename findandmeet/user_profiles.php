<?php 


if($_GET["id"]!="")
{
include "header.php";
include "user_profile_data.php";
if(isset($_SESSION["username"])){
	$user_id = $_SESSION["id"];
?>
<!--  <div class="container-fluid banner" >
      <img src="img/date-1.jpg" >
      </div> -->
	  <div class="container div-margin">
<div class="row ">
	      <div class="col-sm-12 gold-color">
		  <?php
		  if(mysqli_num_rows($get_result)>0){
			while($row = mysqli_fetch_assoc($get_result)){
				$img_path = $row["image"];

				if($img_path!=""){
					?>
<img src="<?php echo $img_path;?>" style="width:150px;height:150px;border-radius:4px;border:1px solid black" class="mx-auto d-block all-img user-img">
					<?php
				}
				else{
					?>
				<img src="img/img_avatar1.png" style="width:150px;height:150px;border-radius:4px;border:1px solid black" class="mx-auto d-block all-img user-img">	
				<?php
			}
				?>

					
	      <h2 class="success-heading font-head" style="font-size: 40px">
			<?php echo $row["f_name"] . ' ' . $row["l_name"];?>

	      </h2>
			<?php if($id==$user_id){

			}
else{?>
			<a href="chatbox.php?id=<?php echo $id;?>" class="btn btn-custom mx-auto d-block btn-width">Send Message </a>	
<?php }
			?>
		  
				  <div class="card match-background " id="user_login_status" >
    <div class="card-body">
    
    <div class="row" id="" >
	<div class="col-sm-6" >
	<div class="container" >
	<h3 class="font-head">Basic Details</h3><hr>
	<h5 class="font-profile">Username </h5>
	<p><?php echo $row["f_name"] . '  ' . $row["l_name"];?></p>
	<hr>
	<h5 class="font-profile">Age:</h5>
	<p>

	<?php
	# object oriented
$from = new DateTime($row["dob"]);
$to   = new DateTime();
$age = $from->diff($to)->y;


# procedural

	echo $age;?> Years</p>
	<hr>
	<h5 class="font-profile">Email</h5>
	<p><?php echo $row["email"];?></p>
	<hr>
	<h5 class="font-profile">Gender</h5>
	<p><?php echo $row["gender"];?></p>
	</div>
	</div>
	<div class="col-sm-6" >
	<h3 class="font-head">Personal Details</h3><hr>
	<h5 class="font-profile">Hobbies</h5>
	<p><?php echo $row["hobby"];?></p>
	<hr>
	<h5 class="font-profile">Looking For</h5>
		<p> <?php echo $row["looking_for"];?></p>
		<hr>
		<h5 class="font-profile">Interested In</h5>
		<p> <?php echo $row["interest"];?></p>
		<hr>
		<h5 class="font-profile">Relationship Status</h5>
			<p> <?php echo $row["status"];?></p>
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
		  ?>
	      
	      </div>
	      </div>
</div>
<div class="row about-heading">
	      <div class="col-sm-12 gold-color font-head ">
	      <h2 class="success-heading" style="font-size: 40px">My Posts
	      </h2>
	      
	      </div>
	      </div>
		<div class="row">
<div class="col-sm-12">
		    <div class="card match-background" id="" >
    <div class="card-body">
    <div class="container" id="show_posts">
<?php if(mysqli_num_rows($get_post_result)>0){
while($row = mysqli_fetch_assoc($get_post_result)){
?>
<div class="show_posts">
    <div class="row">
<h4 class="card-title"><?php echo $row["f_name"].' '.$row["l_name"];?></h4>
<p style="font-size:12px;margin:5px;"><?php echo time_elapsed_string($row["budat"]);?></p>
</div>

    <div class="row">
<hr style="margin:0px;">
                <div style="width:100%;text-align: left;">
                    <p><?php echo $row["post"];?></p>
                    <hr style="margin:0px;">
                    <input type="hidden"  value="<?php echo $row["post_id"];?>" id="userid">
                    <input type="hidden"  value="<?php echo $row["user_id"];?>" id="id">
                    <?php 

                    $check_already_liked = "select * from post_likes where user_id ='".$user_id."' and post_id='".$row["post_id"]."' and to_user_id='".$id."'";
                    $check_res = mysqli_query($conn,$check_already_liked);
                    if(mysqli_num_rows($check_res)>0){
                    	$get_like_count = "select count(*) as count,post_id from post_likes where to_user_id='".$id."' and post_id = '".$row["post_id"]."'";
                        $get_like_result = mysqli_query($conn,$get_like_count);
                        if(mysqli_num_rows($get_like_result)>0){
                            while($row4 = mysqli_fetch_assoc($get_like_result)){
                                $count_like = $row4["count"];
                        ?>
                        <i class="fas fa-thumbs-up like_<?php echo $row["post_id"];?>" data-id="<?php echo $row["user_id"];?>" data-userid="<?php echo $row["post_id"];?>" id="like"><?php echo $count_like;?> Liked</i>

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
                        <i class="far fa-thumbs-up like_<?php echo $row["post_id"];?>" data-id="<?php echo $row["user_id"];?>" data-userid="<?php echo $row["post_id"];?>" id="like"><?php echo $count_like;?> Like</i>

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
                    <div id="comment_hide_<?php echo $row["post_id"];?>" style="display: none;"  data-id="<?php echo $row["user_id"];?>" data-userid="<?php echo $row["post_id"];?>">
                        <input type="text" class="comment" id="comment_<?php echo $row["post_id"];?>" name="comment" placeholder="Enter Comment......">
                        <input type="submit" class="btn btn-custom" id="comment_post" value="comment" data-id="<?php echo $row["user_id"];?>" data-userid="<?php echo $row["post_id"];?>">
                        <!--Fetching Comments-->
                        <div class="comment-section">
                            <?php
                            $post_id = $row["post_id"];
                            $get_comments = "select register.f_name,register.l_name,post_comments.user_id,post_comments.comment,post_comments.from_user_id from post_comments LEFT join register on register.id = post_comments.from_user_id where post_id = '".$post_id."' ";
                            $result_comment = mysqli_query($conn,$get_comments);
                            if(mysqli_num_rows($result_comment)>0){
                                while($row1 = mysqli_fetch_assoc($result_comment)){
                                    ?>
                                    <div class="show_comments">
                                        <h5><?php echo $row1["f_name"]. " " . $row1["l_name"];?></h5>
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
</div>
<?php
}
}
else{
?>

	<h4 class="card-title txt-center">No Posts Yet!</h4>

<?php
}

?>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
	       <!--Footer-->
	   <?php
    include "footer.php";
    ?>
	<!--Footer Ends-->
	    </body>
	    <script type="text/javascript" src="js/custom.js"></script>
	<script>
$(document).on('click','#like',function(){
var user_id = $(this).data("userid");
var id =$(this).data("id");

// alert(id);
$.ajax({
	url:'like_comment.php',
	dataType:'json',
	type:'POST',
	data:{'like':'like','post_id':user_id,'user_id':id},
	success:function(res){
		if(res.status==1){
			// alert(".like_"+user_id);
			$(".like_"+user_id).removeClass("far");
			$(".like_"+user_id).addClass("fas");
			$(".like_"+user_id).html("Liked");
		}
		if(res.status==0){
			// alert(".like_"+user_id);
			$(".like_"+user_id).removeClass("fas");
			$(".like_"+user_id).addClass("far");
			$(".like_"+user_id).html("Like");
		}
	}

})
})
//on click comment section event
// $("#comment_hide").hide();	
$(document).on("click","#comment",function(){
	var user_id = $(this).data("userid");
var id =$(this).data("id");	
var comm = document.getElementById("comment_hide_"+user_id);
if(comm.style.display==="none"){
$("#comment_hide_"+user_id).css('display','block');
}
else{
$("#comment_hide_"+user_id).css('display','none');	
}


})




$(document).on("click","#comment_post",function(){

	var user_id = $(this).data("userid");
var id =$(this).data("id");
// alert("#comment_hide_"+id);
// $("#comment_hide_"+user_id).css('display','block');
// alert(user_id);	
var comment = $("#comment_"+user_id).val();
var name = '<?php echo $_SESSION["username"];?>';
if(comment==""){
	$("#comment_"+user_id).focus();
	$("#comment_"+user_id).attr("placeholder","Comment Must Not Be Blank.......");
}
else{
	$.ajax({
		url:"like_comment.php",
		type:"POST",
		dataType:"json",
		data:{comment:comment,'post_id':user_id,'id':id},
		success:function(res){
			if(res.status==1){
				$("#comment_"+user_id).val("");
				$("#no_comments_"+user_id).hide("");
				$("#user_comments_"+user_id).append(
				' <div class="show_comments"><h5>'+name+'</h5><p>'+comment+'</p></div>'
					);

			}
		}

	})

}
})


	</script>

	    </html>
      <?php
}
else{
header("Location:index.php");
}
}

else{
header("Location:profile.php");
}
      ?>