<?php
session_start();
include '../class/connection.php';
$msg_mail="";


if (isset($_POST["btn_verification"])) {
	
	$qr= mysqli_query($conn,"select * from master_user_info where user_id='".mres($conn,$_SESSION["user_id"])."' and confirm_email='".mres($conn,$_POST["verification_code"])."'");

	if (mysqli_num_rows($qr)>0) {
    $qu = mysqli_query($conn, "update master_user_info set confirm_email='-1'
      where user_id='".mres($conn,$_SESSION["user_id"])."'");

		$msg_mail='<div id="Login-alert" class="alert alert-success" col-sm-12">Confirmation successful.<a href="login.php"> You can click here to login.</a></div>';
    
    unset($_SESSION["user_id"]);
	
   }else{

		$msg_mail='
  <div id="Login-alert" class="alert alert-danger" col-sm-12">Verification code is incorrect. Please check the number and try again.</a></div>';
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

    <title>360academia - Verification Page</title>
    <link href="style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="style/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="style/css/sb-admin.css" rel="stylesheet">
  </head>
  <body class="bg-dark">
    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Verify your Account</div>
        <div class="card-body">
        	

          <form id="form_verify_email" action="" rol="form" method="post"
          action='<?php echo $_SERVER["PHP_SELF"].'?id='.$user_id; ?>'>
            <div class="form-group">
              <div class="form-row">
                <div class="form-control">
                  <div class="form-label-group">
                    <input type="number" id="verification_code" name="verification_code" class="form-control" placeholder="Verification Code">
                  </div>
                </div>
                </div>
                </div>

            <div>
            <input type="submit" id="btn_verification" name="btn_verification" class="btn btn-primary btn-block" value="VERIFY">
          </div>
          <span id="msg_password"></span>
          </form>
          <div class="text-center">
              <a class="d-block small mt-3" href="index.php">Home Page</a>
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
  $("#form_verify_email").click(function(e){

  if ($('#verification_code').val() == "") {
      $('#verification_code').css("border-color","#DA190B");
      $('#verification_code').css("background","#F2DEDE");
        e.preventDefault();        
      } 
      else{
        $('form_verify_email').unbind('submit').submit();
      }
  });
  });
</script>



  </body>
</html>