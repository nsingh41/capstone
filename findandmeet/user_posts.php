		<?php 
include "header.php";
if(isset($_SESSION["username"]))
{

include "connect.php";

// include "get_profiles.php";
?>
 <!-- <div class="container-fluid banner" >
      <img src="img/date-1.jpg" >
      </div> -->
      <div class="container div-margin">
<div class="row">
	      <div class="col-sm-12 gold-color font-head ">
	      <h2 class="success-heading" style="font-size: 40px">Add Posts
	      </h2>
	      
	      </div>
	      </div>
</div>
 <div class="container">
 <div class="form-group">

 </div>
</div>
  <div class="card match-background " id="user_login_status" >
    <div class="card-body">
    <div class="container">
    <div class="row" id="">
 <form id="adding_post" onSubmit="return false" class="form-group">
<div class="alert alert-success alert-dismissible" id="success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Post Added Successfully!</strong>
</div>
<div class="alert alert-danger alert-dismissible" id="danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Please Add Some Text Into Your Post!</strong>
</div>
 <div class="form-group ">
  
  <textarea class="form-control custom-form" rows="5" id="post_data"></textarea>
</div> 
<!-- <textarea id="add_post" name="post"></textarea> -->
 <input type="submit" class="btn btn-custom mx-auto d-block" value="Add Post"> 
</form>
</div>
</div>
</div>
</div>
<div class="container">
<div class="row about-heading">
	      <div class="col-sm-12 gold-color font-head ">
	      <h2 class="success-heading" style="font-size: 40px">My Posts
	      </h2>
	      
	      </div>
	      </div>
	      </div>
		    <div class="card match-background" id="" >
    <div class="card-body">
    <div class="container" id="show_posts">


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
// tinymce.init({ selector:'textarea#add_post'});
$("#success").hide();
$("#danger").hide();
//adding posts
$("#adding_post").submit(function(){
// var post = tinyMCE.activeEditor.getContent();
var post = $("#post_data").val();

$.ajax({
url:"add_posts.php",
type : "POST",
dataType:"json",
data:{post:post},
success:function(res){
if(res.status==0){
$("#danger").show();
$("#post_data").val(""); 
setTimeout(hide,5000);
function hide(){
$("#danger").hide();
}
}
else if(res.status==1){
var content = 'add_post';
$("#success").show();
$("#post_data").val(""); 
setTimeout(hide,5000);
function hide(){
$("#success").hide();
location.reload();

}

}
else{

}
}

})



})
//getting posts
$.ajax({
url:"add_posts.php",
type:'POST',
data:{get_post:'get_post'},
success:function(res){
$("#show_posts").html(res);
}

})

$(document).on('click','#like',function(){
var user_id = $(this).data("userid");
var id =$(this).data("id");
var count_like = $(this).data("count_like");
// alert(count_like);
// alert(id);
$.ajax({
	url:'like_comment.php',
	dataType:'json',
	type:'POST',
	data:{'like':'like','post_id':user_id,'user_id':id},
	success:function(res){
		if(res.status==1){
			// alert(".like_"+user_id);
			count_like+=1;
			$(".like_"+user_id).removeClass("far");
			$(".like_"+user_id).addClass("fas");
			$(".like_"+user_id).html(" Liked");
		}
		if(res.status==0){
			// alert(".like_"+user_id);
			count_like-=1;
			$(".like_"+user_id).removeClass("fas");
			$(".like_"+user_id).addClass("far");
			$(".like_"+user_id).html(" Like");
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
      ?>