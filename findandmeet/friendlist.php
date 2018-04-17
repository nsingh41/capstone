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
	      <h2 class="success-heading" style="font-size: 40px">Friends List
	      </h2>
	      
	      </div>
	      </div>
        </div>

 <div class="container profile-margin">
 <div class="form-group">

 <input type="text" class="form-control custom-form" placeholder="Search Users" id="search" onkeyup="myFunction()">
 </div>
</div>
  <div class="card match-background " id="user_login_status" >
    <div class="card-body">
    <div class="container">
    <div class="row" id="profiles">
    

  <!--2nd row-->

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
  function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myULi");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("h4")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
}
$(document).ready(function(){

//   $("#search").on("keyup", function() {
//     var value = $(this).val().toLowerCase();
//     $("#myDIV").filter(function() {
//       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
//     });
//   });
// });



$.ajax({
url : "get_profiles.php",
dataType : "html",
data:{friend:"friends"},
success:function(res){
$("#profiles").html(res);
}

})




});

  <?php
  if(isset($_GET["id"])){
    $id = $_GET["id"];
    $username = "";
    $get_data = "select f_name,l_name from register where id='".$id."'";
    $result = mysqli_query($conn,$get_data);
    if(mysqli_num_rows($result)>0){
      while($row = mysqli_fetch_assoc($result)){
        $username = $row["f_name"] . " " . $row["l_name"];
      }
    }
?>
var id = <?php echo $_GET["id"];?>;
var status = <?php echo $_GET["status"];?>;
var username = "<?php echo $username;?>";
if(status==0){
  alert("request already sent to <?php echo $username;?>");
}
else{
  alert("request sent to <?php echo $username;?>");
}

<?php
  }

  ?>
	</script>

	    </html>
      <?php
}
else{
  header("Location:index.php");
}
      ?>