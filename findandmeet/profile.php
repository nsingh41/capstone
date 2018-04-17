<?php 
include "header.php";
if(isset($_SESSION["email"])){
 include "profile_get_data.php";
 ?>


 <!--Banner-->
 <!-- <div class="container-fluid banner" >
  <img src="img/date-1.jpg" >
</div> -->
<!--Navigation Bar Ends-->
<div class="container-fluid  div-margin">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h3 class="register-title font-head success-heading">My Profile!</h3>
      </div>

    </div>
  </div>
</div>
<div class="container ">
  <div class="row  box-shadow  card-img" id="profile">
    <div class="col-sm-12 card  profile-card">
      <?php 

      $email = $_SESSION["email"];
      $user_id = $_SESSION["id"];

      $img = "";
      $get_image = "select image from user_profiles where user_id = '".$user_id."'";
      $resq = mysqli_query($conn,$get_image);
  // echo "<pre>";print_r($resq);die;
      if(mysqli_num_rows($resq)>0){
        while($row = mysqli_fetch_assoc($resq)){
          $img =  $row["image"];
          
        }
        if($img == ""){
          echo '<img class="card-img-top mx-auto d-block profile-img all-img"  data-toggle="modal" data-target="#myModal" src="img/img_avatar1.png" alt="Card image">';               
        }
        else{
          echo '<img src="'.$img.'" class="card-img-top mx-auto d-block profile-img all-img"  data-toggle="modal" data-target="#myModal" alt="Card image"/>';        
        }   
      }
      else{
       echo '<img class="card-img-top mx-auto d-block profile-img all-img"  data-toggle="modal" data-target="#myModal" src="img/img_avatar1.png" alt="Card image">';               
     }





     ?>
     <!--=================Modals======================-->
     <!--=================Image update Modal======================-->
     <style type="text/css">
       .clickable {
     cursor:pointer;
  }
     </style>
     <div class="modal clickable" id="myModal" data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Update Image</h4>
            <button type="button" class="close" id="close" data-dismiss="modal" >&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">

           <input type="file" name="image" id="image">
           <span id="uploaded_image"></span>

         </div>

         <!-- Modal footer -->
         <div class="modal-footer">
          <button type="button" id="close" class="btn btn-custom" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
  <!--=================Image Update Modal Closed======================-->
   <!--=================Hobbies Update Modal======================-->
  <div class="modal " id="hobbies" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update Hobbies</h4>
          <button type="button" class="close" id="close" data-dismiss="modal" >&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <label>Hobby</label>
          <form id="update_hobby" method="post" onsubmit="return false">
            <div class="form-group ">


              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input type="checkbox" name="hobby[]" class="form-check-input" value="Dancing">Dancing
                </label>
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input type="checkbox" name="hobby[]" class="form-check-input" value="Music">Music
                </label>
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input type="checkbox"  name="hobby[]" class="form-check-input" value="Photography">Photography
                </label>
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input type="checkbox" name="hobby[]" class="form-check-input" value="Sports">Sports
                </label>
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input type="checkbox" name="hobby[]" class="form-check-input" value="Cooking">Cooking
                </label>
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input type="checkbox" name="hobby[]" class="form-check-input" value="Reading">Reading
                </label>
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input type="checkbox" name="hobby[]" class="form-check-input" value="Shopping">Shopping
                </label>
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input type="checkbox" name="hobby[]" class="form-check-input" value="Travel">Travel
                </label>
              </div>

            </div>

            <input type="submit" class="btn btn-custom" value="Update">

          </form>
          <span id="uploading_hobbies"></span>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" id="close" class="btn btn-custom" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
  <!--=================Hobbies Update Modal Closed======================-->

  <!--=================Looking For Modal======================-->
  <div class="modal " id="looking" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update Looking For</h4>
          <button type="button" class="close" id="close" data-dismiss="modal" >&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

          <label>Looking For</label>
          <form id="update_looking" method="post" onsubmit="return false">
            <div class="form-group">
             <select class="form-control" name="looking_for">
              <option>Looking For</option>
              <option>Male</option>
              <option>Female</option>


            </select>
          </div>

          <input type="submit" class="btn btn-custom" value="Update">

        </form>
        <span id="uploading_looking"></span>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" id="close" class="btn btn-custom" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!--=================Looking FOr Modal Closed======================-->
<!--=================Interest Modal======================-->
<div class="modal " id="interest" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Interested In</h4>
        <button type="button" class="close" id="close" data-dismiss="modal" >&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <label>Interested In</label>
        <form id="update_interest" method="post" onsubmit="return false">
          <div class="form-group">
            <select class="form-control" name="interest" id="sel1">
              <option>I'm Intrested In</option>
              <option>Hang OUt</option>
              <option>Dating</option>
              <option>Long Term Relationship</option>
              <option>Friends</option>
              <option>Other Relationship</option>
            </select>

          </div>

          <input type="submit" class="btn btn-custom" value="Update">

        </form>
        <span id="uploading_interest"></span>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" id="close" class="btn btn-custom" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!--=================Interest Modal Closed======================-->
<!--=================Status Modal======================-->
<div class="modal " id="status" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Status</h4>
        <button type="button" class="close" id="close" data-dismiss="modal" >&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <label>Status</label>
        <form id="update_status" method="post" onsubmit="return false">
         <div class="form-group">
          <select class="form-control" name="status" id="sel1">
            <option>Status</option>
            <option>Single</option>
            <option>Married</option>
            <option>Divorced</option>
            <option>Widowed</option>
          </select>

        </div>

        <input type="submit" class="btn btn-custom" value="Update">

      </form>
      <span id="uploading_status"></span>

    </div>

    <!-- Modal footer -->
    <div class="modal-footer">
      <button type="button" id="close" class="btn btn-custom" data-dismiss="modal">Close</button>
    </div>

  </div>
</div>
</div>
<!--=================Status Modal Closed======================-->
<!--=================Modals Closed======================-->

<div class="row">
<div class="col-sm-12 font-profile gold-color"> 

    <div class="card profile card-back ">

      <div class="card-body " >
        <div class="row" id="" >
          <div class="col-sm-6" >
            <div class="container" >
              <h3 style="color:white" class="font-head">Basic Details</h3><hr>
                <h5 class="font-profile">Username</h5>

              <p> <?php echo $username?></p><hr style="margin: 5px;">
                <h5 class="font-profile">Age</h5>

              <p>

                <?php
# object oriented
                $from = new DateTime($age);
                $to   = new DateTime();
                $age = $from->diff($to)->y;

# procedural

                echo $age;?> Years</p><hr style="margin: 5px;">
                <h5 class="font-profile">Email</h5>
                <p> <?php echo $email;?></p><hr style="margin: 5px;">
                <h5 class="font-profile">Gender</h5>
                <p> <?php echo $gender;?></p><hr style="margin: 5px;">
              </div>
            </div>
            <div class="col-sm-6" id="user_profile">
              
             <!--  <p>Hobbies: <?php echo $row["hobby"];?></p>
              <p>Looking For: <?php echo $row["looking_for"];?></p>
              <p>Interested In: <?php echo $row["interest"];?></p>
              <p>Relationship Status: <?php echo $row["status"];?></p> -->
            </div>
              <div class="col-sm-6" >
      <form enctype="multipart/form-data" id="profile_data" method="post" class="input-margin row" >
<!-- <div class="form-group">
<input type="file" name="image">
</div> -->

<div class="col-sm-12"><h3 style="color:white" class="font-head">Personal Details</h3><hr>
<div class="alert alert-success alert-dismissible" id="alert">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Profile Added Successfully!</strong>
</div>
<div class="alert alert-danger alert-dismissible" id="danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Maximum Three Hobbies Allowed!</strong>
</div>
<div class="alert alert-danger alert-dismissible" id="validation_msg">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong></strong>
</div>
</div>

<div class="form-group col-sm-12">

 <label class="">Add Hobbies</label><br>
  <div class="form-check form-check-inline">
   <label class="form-check-label">
      <input type="checkbox" name="hobby[]" class="form-check-input" value="Dancing">Dancing
    </label>
  </div>
  <div class="form-check form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" name="hobby[]" class="form-check-input" value="Music">Music
    </label>
  </div>
  <div class="form-check form-check-inline">
    <label class="form-check-label">
      <input type="checkbox"  name="hobby[]" class="form-check-input" value="Photography">Photography
    </label>
  </div>
  <div class="form-check form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" name="hobby[]" class="form-check-input" value="Sports">Sports
    </label>
  </div>
  <div class="form-check form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" name="hobby[]" class="form-check-input" value="Cooking">Cooking
    </label>
  </div>
  <div class="form-check form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" name="hobby[]" class="form-check-input" value="Reading">Reading
    </label>
  </div>
  <div class="form-check form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" name="hobby[]" class="form-check-input" value="Shopping">Shopping
    </label>
  </div>
  <div class="form-check form-check-inline">
    <label class="form-check-label">
      <input type="checkbox" name="hobby[]" class="form-check-input" value="Travel">Travel
    </label>
  </div>

</div>

<div class="form-group col-sm-6">
  <select class="form-control" name="looking"  id="sel1">
    <option value="0">Looking For</option>
    <option>Male</option>
    <option>Female</option>


  </select>
</div>
<div class="form-group col-sm-6">
  <select class="form-control" name="interest" id="sel1">
    <option value="0">I'm Intrested In</option>
    <option>Hang OUt</option>
    <option>Dating</option>
    <option>Long Term Relationship</option>
    <option>Friends</option>
    <option>Other Relationship</option>
  </select>

</div>

<div class="form-group col-sm-12">
  <select class="form-control" name="status" id="sel1">
    <option value="0">Status</option>
    <option>Single</option>
    <option>Married</option>
    <option>Divorced</option>
    <option>Widowed</option>
  </select>

</div>
<button type="button" class="btn btn-dark  mx-auto  button-update" id="submit">Update</button>

</form>








</div>
          </div>







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

  $(document).ready(function(){
    $("#user_profile").css('display','none');
    $("#alert").hide();
    $("#danger").hide();
    $("#validation_msg").hide();
    $.ajax({
      url:"check_profile_status.php",
      dataType:"json",
      success:function(result){
        if(result){
         var html = '<h3 style="color:white" class="font-head">Personal Details</h3><hr><h5 class="font-profile">Hobbies <i class="fas fa-edit clickable" data-toggle="modal" data-target="#hobbies"></i></h5>'+'<p>'+result.hobby+'</p><hr style="margin:5px">'
         +'<h5 class="font-profile">Looking For <i class="fas fa-edit clickable" data-toggle="modal" data-target="#looking"></i></h5>'+'<p>'+result.looking+'</p><hr style="margin:5px">'+
         '<h5 class="font-profile">Interested In <i class="fas fa-edit clickable" data-toggle="modal" data-target="#interest"></i></h5>'+'<p>'+result.interest+'</p><hr style="margin:5px">'+
         '<h5 class="font-profile">Relationship Status <i class="fas fa-edit clickable" data-toggle="modal" data-target="#status"></i></h5>'+'<p>'+result.status+'</p><hr style="margin:5px">';
         ;


         $("#profile_data").css('display','none');
         $("#user_profile").css('display','block');
         $("button#submit").css('display','none');
         $("#user_profile").html(html);
       }
       else{
        $("#profile_data").css('display','block');
      }
    }
  })

//updating image
$(document).on('change','#image',function(){
  var name = document.getElementById("image").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
 }
 var oFReader = new FileReader();
 oFReader.readAsDataURL(document.getElementById("image").files[0]);
 var f = document.getElementById("image").files[0];
 var fsize = f.size||f.fileSize;
 if(fsize > 2000000)
 {
   alert("Image File Size is very big");
 }
 else{
  form_data.append("image",document.getElementById("image").files[0]);
  $.ajax({
    url : "update_image.php",
    method : "POST",
    data : form_data,
    contentType:false,
    cache:false,
    processData:false,
    beforeSend:function(){
     $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
   },
   success:function(res){
    $('#uploaded_image').html(res);
  }


})
}
})

$(document).on("click","#close",function(){

  location.reload();
})
//updating image section closed




$(document).on("click","#submit",function(){
  value="true";
  var status =  $("#profile_data select[name='status']").val();
    if(status=="Status"){
        $("#validation_msg").show();
       $("#validation_msg").html("<button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Select Status!</strong>");
       setTimeout(function(){
        $("#validation_msg").hide();
       },2000)
       value="false";
    }
    var interest =  $("#profile_data select[name='interest']").val();
    if(interest=="I'm Intrested In"){
       $("#validation_msg").show();
       $("#validation_msg").html("<button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Select Interest!</strong>");
       setTimeout(function(){
        $("#validation_msg").hide();
       },2000)
       value="false";
    } 
    var looking_for =  $("#profile_data select[name='looking']").val();
    if(looking_for=="Looking For"){
        $("#validation_msg").show();
       $("#validation_msg").html("<button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Select Looking For!</strong>");
       setTimeout(function(){
        $("#validation_msg").hide();
       },2000)
       value="false";
    }
    var checked = $("#profile_data input[name='hobby[]']:checked").length;
    if(checked==0){
       $("#validation_msg").show();
       $("#validation_msg").html("<button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Select Hobbies!</strong>");
       setTimeout(function(){
        $("#validation_msg").hide();
       },2000)
       value="false";
    }
  
   if(value=="true"){
    // alert("fdfd");
    $.ajax({
    url:"profile_save_data.php",
    dataType:"json",
    contentType: false,
    cache: false, 
    processData:false,
    data:$("#profile_data").serialize(),
    success:function(res)
    {

      if(res.status==1)
      {
        $("#alert").show();
        setTimeout(function(){
          location.reload();
        },2000);

      }
      else if(res.status==0)
      {
        alert("something wrong");
      }

    }


  });
   }
  
});
//updating Profile 
$('#update_hobby').submit(function(){
// formdata = new FormData("#update_hobby");
$.ajax({
  url:'profile_update.php',
  type:'POST',
  dataType:'json',
  data : $('#update_hobby').serialize(),
  beforeSend:function(){
    $("#uploading_hobbies").html("Updating......");
  },
  success:function(res){
    if(res.status==1)
    {
      $("#uploading_hobbies").html("Updated!");
    }
    else if(res.status==0){
      $("#uploading_hobbies").html("Somethin Wrong!"); 
    }
  }

})

});
$('#update_looking').submit(function(){
// formdata = new FormData("#update_hobby");
$.ajax({
  url:'profile_update.php',
  type:'POST',
  dataType:'json',
  data : $('#update_looking').serialize(),
  beforeSend:function(){
    $("#uploading_looking").html("Updating......");
  },
  success:function(res){
    if(res.status==1)
    {
      $("#uploading_looking").html("Updated!");
    }
    else if(res.status==0){
      $("#uploading_looking").html("Somethin Wrong!"); 
    }
  }

})

});
$('#update_interest').submit(function(){
// formdata = new FormData("#update_hobby");
$.ajax({
  url:'profile_update.php',
  type:'POST',
  dataType:'json',
  data : $('#update_interest').serialize(),
  beforeSend:function(){
    $("#uploading_interest").html("Updating......");
  },
  success:function(res){
    if(res.status==1)
    {
      $("#uploading_interest").html("Updated!");
    }
    else if(res.status==0){
      $("#uploading_interest").html("Somethin Wrong!"); 
    }
  }

})

});
$('#update_status').submit(function(){
// formdata = new FormData("#update_hobby");
$.ajax({
  url:'profile_update.php',
  type:'POST',
  dataType:'json',
  data : $('#update_status').serialize(),
  beforeSend:function(){
    $("#uploading_status").html("Updating......");
  },
  success:function(res){
    if(res.status==1)
    {
      $("#uploading_status").html("Updated!");
    }
    else if(res.status==0){
      $("#uploading_status").html("Somethin Wrong!"); 
    }
  }

})

});
//updating Profile 

});
$('input[type=checkbox]').on('change', function (e) {
    if ($('input[type=checkbox]:checked').length > 3) {
        $(this).prop('checked', false);
        $("#danger").show();
    }
});
</script>

</html>
<?php

}
else{
  header("Location:index.php");
}
?>

