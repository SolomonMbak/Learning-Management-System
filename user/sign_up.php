<?php
session_start();
include '../class/connection.php';
$msg_mail="";

if (isset($_POST["btn_register"])) {
	
	$qr= mysqli_query($conn,"select * from master_user_info where email='".mres($conn,$_POST["email"])."'");
	if (mysqli_num_rows($qr)>0) {
		$msg_mail='
  <div id="Login-alert" class="alert alert-danger" col-sm-12">Email address already exists. You can reset your password if you have forgotten it.</div>';
	}else{
		
		$qr=mysqli_query($conn,"insert into master_user_info values('','".mres($conn,$_POST["firstName"])."','".mres($conn,$_POST["otherNames"])."','".mres($conn,$_POST["gender"])."','".mres($conn,$_POST["phoneNumber"])."','".mres($conn,$_POST["email"])."','activate','".mres($conn,$_POST["dob"])."','".mres($conn,$_POST["dor"])."','".mres($conn,md5($_POST["password"]))."')");
      
      $_SESSION["user_id"]=mysqli_insert_id($conn);

			$send = mail(mres($conn,$_POST["email"]), "From 360academia.com", "Welcome ");
	
  if (($qr == true) && ($send == true)) {
    $msg_mail='
  <div id="Login-alert" class="alert alert-primary" col-sm-12">Registration Successful. Proceed to <a href="login.php">login.</a></div>';
			}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>360academia - Register Page</title>
    <link href="style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="style/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="style/css/sb-admin.css" rel="stylesheet">
  </head>
  <body class="bg-dark">
    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Create an Account</div>
        <br>
        <p class="text-center"><mark> <strong style="color: blue"><u>PLEASE NOTE:</u></strong> Your certificate will carry the same details as you have provided here. Name modifications are not allowed.</p></mark>
        <div class="card-body">
        	<?php echo $msg_mail;  ?>

         

        <form id="signup_form" rol="form" method="post" action='<?php echo $_SERVER["PHP_SELF"]; ?>'>
           
        
        


        <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="firstName" name="firstName" class="form-control" placeholder="First Name" required autofocus="autofocus">
                    <label for="firstName">First Name</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="otherNames" name="otherNames" class="form-control" placeholder="Other Names" required autofocus="autofocus">
                    <label for="otherNames">Last name</label>
                  </div>
                </div>
              </div>
        </div>




    
        <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <select type="text" id="gender" name="gender" class="form-control" >
                        <option value="">-- Gender --</option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                  </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="number" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="Phone Number" required>
                    <label for="phoneNumber">Phone Number</label>
                  </div>
                </div>
              </div>
        </div>






          <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" required autofocus="autofocus">
                    <label for="email">Email Address</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="email" id="confirmEmail" name="confirmEmail" class="form-control" placeholder="Other Names" required autofocus="autofocus">
                    <label for="confirmEmail">Confirm Email</label>
                  </div>
                </div>
              </div>
        </div>


    <div class="form-group">
      <label>       Date of Birth:</label>
      <div class="input-group">
        <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth:" required="required">
      </div>
    </div>

    <div class="form-group">
      <div class="input-group">
        <input type="hidden" class="form-control" id="dor" name="dor" value="<?php echo date("Y-m-d"); ?>" readonly="true">
        </div>
    </div>





       <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required autofocus="autofocus">
                    <label for="password">Password</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Other Names" required autofocus="autofocus">
                    <label for="confirmPassword">Confirm Password</label>
                  </div>
                </div>
              </div>
        </div>

    <div class="form-group">
      <label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="../tearms_of_use.php">Terms of Use</a> &amp; understand the <a href="../privacy_policy.php">Privacy Policy</a>.</label>
      </div>

    <div class="form-group">
            <input type="submit" id="btn_register" name="btn_register" class="btn btn-primary btn-block" value="REGISTER">
        </div>
        <span id="msg_email"></span>
          <br />
          <span id="msg_password"></span>
          </form>
          <hr>
          <div class="text-center">
            <a class="d-block small mt-3" href="login.php">Login Page</a>
          </div>
        </div>
      </div>
    </div>

    <script src="style/vendor/jquery/jquery.min.js"></script>
    <script src="style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="style/vendor/jquery-easing/jquery.easing.min.js"></script>


<script>
  $(document).ready(function(){
    $('input[class="form-control"]').focus(function(){
      $(this).removeAttr('style');
    });
  $("#btn_register").click(function(e){

  if ($('#firstName').val() == "") {
      $('#firstName').css("border-color","#DA190B");
      $('#firstName').css("background","#F2DEDE");
        e.preventDefault();        
      }
  if ($('#otherNames').val() == "") {
      $('#otherNames').css("border-color","#DA190B");
      $('#otherNames').css("background","#F2DEDE");
        e.preventDefault();        
      }
  if ($('#gender').val() == "") {
      $('#gender').css("border-color","#DA190B");
      $('#gender').css("background","#F2DEDE");
        e.preventDefault();        
      }
  if ($('#phoneNumber').val() == "") {
      $('#phoneNumber').css("border-color","#DA190B");
      $('#phoneNumber').css("background","#F2DEDE");
        e.preventDefault();        
      }
  if ($('#email').val() == "") {
      $('#email').css("border-color","#DA190B");
      $('#email').css("background","#F2DEDE");
        e.preventDefault();        
      }
  if ($('#confirmEmail').val() == "") {
      $('#confirmEmail').css("border-color","#DA190B");
      $('#confirmEmail').css("background","#F2DEDE");
         e.preventDefault();        
      }
    if ($('#email').val() != $('#confirmEmail').val()) {
      $('#msg_email').html("Email addresses do not match");
         e.preventDefault();        
      }   
  if ($('#dob').val() == "") {
      $('#dob').css("border-color","#DA190B");
      $('#dob').css("background","#F2DEDE");
        e.preventDefault();        
      }
  if ($('#dor').val() == "") {
      $('#dor').css("border-color","#DA190B");
      $('#dor').css("background","#F2DEDE");
        e.preventDefault();        
      }
  if ($('#password').val() == "") {
      $('#password').css("border-color","#DA190B");
      $('#password').css("background","#F2DEDE");
        e.preventDefault();        
      }
  if ($('#confirmPassword').val() == "") {
      $('#confirmPassword').css("border-color","#DA190B");
      $('#confirmPassword').css("background","#F2DEDE");
        e.preventDefault();        
      }
  if ($('#password').val() != $('#confirmPassword').val()) {
      $('#msg_password').html("Passwords do not match");
         e.preventDefault();        
      }   
   
      else{
        $('signup_form').unbind('submit').submit();
      }
  });
  });
</script>



  </body>
</html>