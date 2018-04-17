//Custom Scripts






//Validating Form

  //validation rules

  

  $(".error").hide();    



  var $regexname=/^([a-zA-Z]{3,16})$/;

  var $regexpassword = /^([a-zA-Z0-9]{3,16})$/;

  var $regexemail = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;

  function validation(){
var retValue = false;
  	var fname = $("input#firstname").val();

  	if (!fname.match($regexname)) {

  		$("label#fname_error").show();

  		$("input#firstname").addClass("invalid");

  		$("input#firstname").removeClass("valid");

  		retValue = false;

  	}

  	else{

  		$("input#firstname").addClass("valid");

  		$('.error').hide();
      retValue = true;
  	}

  	var lname = $("input#lastname").val();

  	if(!lname.match($regexname))

  	{

  		$("label#lname_error").show();

  		$("input#lastname").addClass("invalid");

  		
      retValue = false;

  	}

  	else{

  		$("input#lastname").addClass("valid");

  		$('.error').hide();
      retValue = true;
  	}

  	

  	var email = $("input#email").val();
     

    if (!email.match($regexemail)) {

      $("label#email_error").show();
            $("label#email_error").html("Please Enter a Valid Email!");

      $("input#email").addClass("invalid");

      $("input#email").removeClass("valid");

    
      retValue = false;

    }

    else{
     
            $.ajax({
        url:"validate_email.php",
        dataType:"json",
        data:{email:email},
        success:function(res){
          if(res.status==1)
          {
            $("label#email_error").show();
            $("label#email_error").html("Email already exists!");
      $("input#email").addClass("invalid");

      $("input#email").removeClass("valid"); 
        retValue = false; 
          }
          else if(res.status==0){
        $("input#email").addClass("valid");
      $('.error').hide();
              retValue = true;
          }
        }
      })
     

    }
 
    var gender = $("input[name=gender]:checked").val();
    
    if(!gender){
$("label#gender_error").show();

   
      $retValue = false;
    }
    else{
      $("input#gender").addClass("valid");

      $('.error').hide();
            retValue = true;
    }

  	var day = $("select#day").val();

  	if(day==""){

  		$("label#day_error").show();

  		$("select#day").addClass("invalid");

  		$("select#day").removeClass("valid");

  		

      retValue = false;
  	} 

  	else{

  		$("select#day").addClass("valid");

  		$('.error').hide();
      retValue = true;
  	}   

  	var month = $("select#month").val();

  	if(month==""){

  		$("label#month_error").show();

  		$("select#month").addClass("invalid");

  		$("select#month").removeClass("valid");

  		
      retValue = false;

  	} 

  	else{

  		$("select#month").addClass("valid");

  		$('.error').hide();
      retValue = true;
  	}   

  	var year = $("select#year").val();

  	if(year==""){

  		$("label#year_error").show();

  		$("select#year").addClass("invalid");

  		$("select#year").removeClass("valid");

  		      retValue = false;

  	} 

  	else{

  		$("select#year").addClass("valid");

  		$('.error').hide();
      retValue = true;
  	}    



  	var password = $("input#pwd").val();

  	if (!password.match($regexpassword)) {

  		$("label#pwd_error").show();

  		$("input#pwd").addClass("invalid");

  		$("input#pwd").removeClass("valid");

  		

      retValue = false;

  	}

  	else{

  		$("input#pwd").addClass("valid"); 

  		$(".error").hide();
      retValue = true;
  	}

  	

  	var password = $("input#pwd").val();

  	var confirmpassword = $("input#cpwd").val();



  	if (confirmpassword!=password || confirmpassword=="") {

  		$("label#cpwd_error").show();

  		$("input#cpwd").addClass("invalid");

  		$("input#cpwd").removeClass("valid");

  	
      retValue = false;
  	}

  	else{

  		$("input#cpwd").addClass("valid"); 
      retValue = true;
  	}


return retValue;
  } 







    //Validating on focus out

   //  $("#firstname").focusout(function(){

   //  	validation();

   //  });

   //  $("#lastname").focusout(function(){

   //  	validation();

   //  });

   //  $("#email").focusout(function(){

   // validation();

   //  });

   //  $("#pwd").focusout(function(){

   //  	validation();

   //  });

   //  $("#cpwd").focusout(function(){

   //  	validation();

   //  });

   //  $("select#day").focusout(function(){

   //  	validation();

   //  });

   //  $("select#month").focusout(function(){

   //  	validation();

   //  });

   //  $("select#year").focusout(function(){

   //  	validation();

   //  });

       //Hiding Success Registration Message   

       $("#success_register").hide();

       //Validating Form On Button Click   

       $(".button").click(function() {

       	

       	if(validation()==false){

       		// alert("Please Fill All Input Fields");

       	}



       	else{

       		$.ajax({

       			url:'register_save.php',

       			data : $('#register_data').serialize(),

       			dataType:'json',

       			success:function(res){

       				if(res.status==1){

       					$("#register_data").hide();

       					$("#success_register").show();

       					setTimeout(Redirect,5000);

       					function Redirect(){

       						window.location.href = "login_form.php";

       					}

       				}

       				else{

       					alert("something wrong");

       				}

       			}

       		})

       	}	



       	

       });