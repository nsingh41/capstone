  <div class="container-fluid footer footer-fixed">
	<div class="container">
	<div class="row">
	    <div class="col-sm-6 icons">
	  <ul class="">

	<a href="#"><i class="fab fa-facebook-square icon-color" ></i></a>

	<a href="#"> <i class="fab fa-instagram  icon-color"></i></a>
	<a href="#"> <i class="fab fa-pinterest-square  icon-color"></i></a>
	<a href="#"> <i class=" fab fa-twitter-square  icon-color"></i></a>

	    </ul>
	</div>
	<div class="col-sm-6">
	 <div class="copyright"> <span href="#">2018 copyright by Find&Meet</span>
	</div>
	</div>
	</div>
	</div>
	</div>
	<script type="text/javascript">
		// $("#icon").click(function(){
		// 	$("#icon").toggleClass("fa-instagram");
		// });
	</script>
	<?php if(isset($_SESSION["email"]))
{
	?>
	<script type="text/javascript">
function update(){
	$.ajax({
		url : "update_status.php",
		dataType:"json",
		success:function(res){
			var total_count = 0;
			$("#get_notification").html("");
			$("#request_count").html("");
			console.log(res.request);
			console.log(res.request_status);
			if(res[0]){
				// alert("moooo");
			
			
			$.each(res[0],function(index,name){
				$("#get_notification").html("");	
				total_count = total_count + name.count;
				// $("#request_count").html(name.count);
				$.each(name.data,function(a,b){
				$("#get_notification").append("<a class='dropdown-item black-color'><b>"+b+"</b></a>");
					});


			});


			}
			if(res[1]){
				$.each(res[1],function(index,name){
					// console.log(name.type);
					$("#req").html("");
					total_count = total_count + name.count;
					if(name.status==0){
						$.each(name.data,function(a,b){
							$("#req").append(b);
						});
					}
					else if(name.status==1){
					$.each(name.data,function(a,b){
							$("#req").append(b);
						});
					}
				});	
			}
			if(res[2]){
				$.each(res[2],function(index,name){
					// console.log(name.type);
					$("#get_like").html("");
					total_count = total_count + name.count;
						$.each(name.data,function(a,b){
							$("#get_like").append(b);
						});
					
					
				});	
			}
			if(res[3]){
				$.each(res[3],function(index,name){
					// console.log(name.type);
					$("#get_comments").html("");
					total_count = total_count + name.count;
						$.each(name.data,function(a,b){
							$("#get_comments").append(b);
						});
					
					
				});	
			}

			if(res[4]){
				$.each(res[4],function(index,name){
					// console.log(name.type);
					$("#get_messages").html("");
					$("#msg_count").html(name.count);
					// $("#get_messages").append(name.data);
						$.each(name.data,function(a,b){
							$("#get_messages").append(b);
						});
					
					
				});	
			}
			$("#request_count").html(total_count);
			// if(res!=""){
			// 	alert("no blank");
			// }

			// if(res.type=="notification"){
			// 	alert("yowaaaa");
			// }
		}

	})
}
update();
	setInterval(function(){ 
   update();
}, 10000);

$(document).on('click', ' .dropdown-menu', function (e) {
  e.stopPropagation();
});
function accept_req(value){
	var request_id = value.value;
	
	var data = {'accept_id':request_id};
	$.ajax({
		url:'requests_action.php',
		type:'POST',
		data:data,
		success:function(res){
		
		$("#action_"+request_id).css("display","none");
		$("#message_"+request_id).html("<p class='txt-center'>Accepted!</p>");
		
		}

	});
	// alert(value.value);

}
function cancel_req(value){
var request_id = value.value;
	var data = {'cancel_id':request_id};
	$.ajax({
		url:'requests_action.php',
		type:'POST',
		data:data,
		success:function(res){
	$("#action_"+request_id).css("display","none");
		$("#message_"+request_id).html("<p class='txt-center'>Rejected!</p>");
		}

	});

}
$(document).on('click',".delete",function(){
	
	var user_id = $(this).data("usrid");
	var not_type = $(this).data("not_type");
	var data = [];
	if(not_type =="request"){
		data = {'not_type':not_type,'user_id':user_id};
	}
	else if(not_type == "like"){
		var post_id = $(this).data("post_id");
		data = {'not_type':not_type,'user_id':user_id,'post_id':post_id};
	}
	else if(not_type=="comment"){
		var post_id = $(this).data("post_id");
		data = {'not_type':not_type,'user_id':user_id,'post_id':post_id};
	}

	// alert(not_type);
	$.ajax({
		url:"delete_request.php",
		type:"POST",
		data:data,
		success:function(res){
			if(res.status==1){
				
			}
			else{
				
			}
		}
	})
})
	</script>
	<?php
}
	?>