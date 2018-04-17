<ul id="myULi" class="row" style="width:100%;">
  <?php
  session_start();
  include "connect.php";
  $id = $_SESSION["id"];
  $profile_ids = "";
  if(isset($_REQUEST["match"])){
    $get_profile_ids = "select user_id from user_profiles where user_id!='".$id."' and user_id not in (select message_id.to_user_id from message_id left join user_profiles on message_id.user_id = user_profiles.user_id left join requests on requests.user_id = user_profiles.user_id where message_id.user_id='".$id."')";
    $get_results = mysqli_query($conn,$get_profile_ids);
    if(mysqli_num_rows($get_results)>0){
      while($row = mysqli_fetch_assoc($get_results)){
        $profile_ids = $row["user_id"];


    // echo $profile_ids;
    //$email = $_SESSION["email"];
//joining table register, user_profile and online to get all the required fields
        $profile_query = "select register.id, register.f_name,register.l_name,register.gender,user_profiles.email,user_profiles.hobby,user_profiles.looking_for,user_profiles.interest,user_profiles.image,user_profiles.status,online.last_activity FROM register RIGHT JOIN user_profiles ON register.id=user_profiles.user_id RIGHT JOIN online ON register.id = online.user_id where register.id ='".$profile_ids."'";
// $get_activity = "select register.id,online.last_activity from register RIGHT JOIN online ON register.id = online.user_id where register.email !='".$email."'";
// $activity_result = mysqli_query($conn,$get_activity);
// echo "<pre>";print_r($activity_result);die;



        $result = mysqli_query($conn,$profile_query);
// echo "<pre>";print_r($result);die;
        if(mysqli_num_rows($result)>0)
        {
          while($row = mysqli_fetch_assoc($result))
          {
           ?>

           <li style="list-style-type: none;" class="col-md-6 col-lg-4 col-sm-6 match-col">
            <div class="">
            <div class="row">
              <div class="col-xs-12 col-md-12 ">
                <div class="match-card ">
                  <?php if($row["image"]!=""){?>
                  <img src="<?php echo $row['image'];?>" alt="bieber_main" class="match-img img-thumbnail all-img">
                  <?php }
                  else{
                    ?>
                    <img class="card-img-top match-img img-thumbnail all-img" src="img/img_avatar1.png" alt="Profile Pic" border="0" >
                    <?php }?>
                    <div style="margin: 24px 0;" class="font-head">
                      <h4 class="card-title"><?php echo $row["f_name"] . "   " .$row["l_name"];?>
                      <?php
                        date_default_timezone_set('Etc/GMT+7');
                        $date_logged =  $row['last_activity'];
                        $current = date('Y-m-d H:i:s');
                        $c = strtotime($current);
                        $d = strtotime($date_logged);
                        $minutes = round(abs($c-$d)/60,2);
// echo $minutes;

                        if($minutes>1){
                          echo " <i class='fas fa-circle' style='color:red;font-size:15px;'></i> ";
                        }
                        else{
                          echo" <i class='fas fa-circle' style='color:green;font-size:15px;'></i> ";
                        }
                        ?></h4>
                      </div>
                      <div style="margin: 24px 0;" class="font-profile">
                        <div class="row">
                          <div class="col-sm-6">

                            <h4 class="match-p">Hobbies</h4>
                            <p ><?php echo $row["hobby"];?></p>
                            <hr>
                            <h4 class="match-p">Looking For</h4>
                            <p ><?php echo $row["looking_for"];?></p>
                             <hr>
                          </div>
                          <div class="col-sm-6">
                            <h4 class="match-p">Interested In</h4>
                            <p ><?php echo $row["interest"];?></p>
                             <hr>
                            <h4 class="match-p">Status</h4>
                            <p ><?php echo $row["status"];?></p>
                             <hr class="custom-hr">
                          </div>
                        </div>

                      </div>

                        <?php
                      //Check Already sent
                       $check_req_id = $row["id"];
                      $check_req_exists = "select * from requests where user_id = '".$id."' and to_user_id = '".$check_req_id."' and request_status='U'";
                      $check_req_status = mysqli_query($conn,$check_req_exists);
                      if(mysqli_num_rows($check_req_status)>0){
                        ?>
                        <a href="#" class="btn match-button btn-custom" style="left: 50%;
                        transform: translate(-50%);">Request Already Sent </a>
                     
                     <?php
                      }
else{
                      ?>
                      <a href="request.php?id=<?php echo $row["id"];?>" class="btn match-button btn-custom" style="left: 50%;
                        transform: translate(-50%);">Add Friend </a>
                        <?php
                        }?>
                      </div>
                      
                    </div>
                  </div>
                  </div>
                </li>

                <?php
              }
            }

          }


        }
        else{
          ?>
          <div class="card-body  match-card-body" >
            <h4 class="card-title txt-center">Nothing Found!</h4>
            <p class="card-text txt-center">No New Profiles are added!</p>

          </div>
          <?php
        }
      }
      if(isset($_REQUEST["friend"])){

        $profile_query = "select register.id, register.f_name,register.l_name,register.gender,user_profiles.email,user_profiles.hobby,user_profiles.looking_for,user_profiles.interest,user_profiles.image,user_profiles.status,online.last_activity,message_id.message_id,message_id.user_id FROM register RIGHT JOIN user_profiles ON register.id=user_profiles.user_id RIGHT JOIN online ON register.id = online.user_id RIGHT JOIN message_id on message_id.user_id = register.id where message_id.to_user_id='".$id."' ";
        $result = mysqli_query($conn,$profile_query);
// echo "<pre>";print_r($result);die;
        if(mysqli_num_rows($result)>0)
        {
          while($row = mysqli_fetch_assoc($result))
          {
           ?>

          <li style="list-style-type: none;" class="col-md-6 col-lg-4 col-sm-6">

            <div class="row">
              <div class="col-xs-12 col-md-12">
                <div class="match-card ">
                  <?php if($row["image"]!=""){?>
                  <img src="<?php echo $row['image'];?>" alt="bieber_main" class="match-img img-thumbnail all-img">
                  <?php }
                  else{
                    ?>
                    <img class="card-img-top match-img img-thumbnail all-img" src="img/img_avatar1.png" alt="Profile Pic" border="0" >
                    <?php }?>
                    <div style="margin: 24px 0;" class="font-head">
 <a href="user_profiles.php?id=<?php echo $row["id"];?>"><h4 class="card-title"><?php echo $row["f_name"] . "   " .$row["l_name"];?>
                     <?php
                        date_default_timezone_set('Etc/GMT+7');
                        $date_logged =  $row['last_activity'];
                        $current = date('Y-m-d H:i:s');
                        $c = strtotime($current);
                        $d = strtotime($date_logged);
                        $minutes = round(abs($c-$d)/60,2);
// echo $minutes;

                        if($minutes>1){
                          echo " <i class='fas fa-circle' style='color:red;font-size:15px;'></i>";
                        }
                        else{
                          echo" <i class='fas fa-circle' style='color:green;font-size:15px;'></i>";
                        }
                        ?></h4></a>
                      </div>
                      <div style="margin: 24px 0;" class="font-head font-profile">
                        <div class="row">
                          <div class="col-sm-6">

                            <h4 class="match-p">Hobbies</h4>
                            <p><?php echo $row["hobby"];?></p>
                             <hr>
                            <h4 class="match-p">Looking For</h4>
                            <p ><?php echo $row["looking_for"];?></p>
                             <hr>
                          </div>
                          <div class="col-sm-6">
                            <h4 class="match-p">Interested In</h4>
                            <p ><?php echo $row["interest"];?></p>
                             <hr>
                            <h4 class="match-p">Status</h4>
                            <p ><?php echo $row["status"];?></p>
                             <hr class="custom-hr">
                          </div>
                        </div>

                      </div>

                      <a href="chatbox.php?id=<?php echo $row["id"];?>" class="btn match-button btn-custom" style="left: 50%;
                        transform: translate(-50%);">Send Message</a>
                      </div>
                      
                    </div>
                  </div>
                </li>

              <?php
            }
          }
          else{
?><h2 class="card-title" style="text-align:center;height: 295px;">No Friends Yet!</h2>
<?php
} 
        }
        ?>
<!-- //echo strtotime($user['last_activity']) > time() - 300 ? 'Online' : 'Offline' ?>
-->

<!-- <?php if(strtotime($user['last_activity']) > time() - 300): ?>
  <span class="online" style="color:green;">Online</span>
<?php else: ?>
  <span class="offline" style="color:red;">Offline</span>
<?php endif; ?>
?>
-->


</ul>

