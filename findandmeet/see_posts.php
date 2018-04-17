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
      <div class="container-fluid">
<div class="row div-margin">
	      <div class="col-sm-12 gold-color font-head head-match">
	      <h2 class="success-heading" style="font-size: 40px">Latest Posts!
	      </h2>
	      
	      </div>
	      </div>
</div>

  <div class="card match-background  div-margin" id="user_login_status" style="margin-top: 100px;">
    <div class="card-body">
    <div class="container post-div">
    <div class="" id="see_posts">

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
	

//getting posts
$.ajax({
url:"fetch_posts.php",
type:'POST',
data:{fetch_post:'fetch_post'},
success:function(res){
$("#see_posts").html(res);
}

})

			

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
      ?>