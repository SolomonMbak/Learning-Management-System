<?php
session_start();
include '../class/connection.php';
$msg_mail="";

if (isset($_POST["btn_login"])) {
  
  $qr = mysqli_query($conn,"SELECT * FROM master_user_info WHERE email='".mres($conn,$_POST["email"])."'
    and password='".md5(mres($conn,$_POST["password"]))."'");

  if (mysqli_num_rows($qr)==0) {
    $msg_mail='
  <div id="Login-alert" class="alert alert-danger" col-sm-12">Invalid login credential(s). Please try again, <a href="password_reset.php"> reset your password </a> or <a href="sign_up.php"> create an account</a> if you dont already have one.</div>';

  }else{
    $_SESSION["email"]=mres($conn,$_POST["email"]);
    header("Location: landing.php");
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

    <title>360academia - User Login Form</title>
    <link href="style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="style/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="style/css/sb-admin.css" rel="stylesheet">
  </head>
  <body class="bg-dark">
    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Login to your cabinet</div>
        <div class="card-body">
          <?php echo $msg_mail;  ?>

          <form id="login_form" action="" rol="form" method="post"
          action='<?php echo $_SERVER["PHP_SELF"]; ?>'>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email Address">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                  </div>
                </div>
              </div>
            </div>
            
         
            <div>
            <input type="submit" id="btn_login" name="btn_login" class="btn btn-primary btn-block" value="LOGIN">
          </div>
          <span id="msg_email"></span>
          <br />
          <span id="msg_password"></span>
          </form>
          <div class="text-center">
              <li class="list-inline-item">
                <a href="reset_password.php">Reset Password</a>
              </li>
              <li class="list-inline-item">&sdot;&sdot;&sdot;</li>
              <li class="list-inline-item">
                <a href="sign_up.php">Ceate an account</a>
              </li>
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
  $("#btn_login").click(function(e){

  if ($('#email').val() == "") {
      $('#email').css("border-color","#DA190B");
      $('#email').css("background","#F2DEDE");
        e.preventDefault();        
      }
  if ($('#password').val() == "") {
      $('#password').css("border-color","#DA190B");
      $('#password').css("background","#F2DEDE");
        e.preventDefault();        
      } 
      else{
        $('login_form').unbind('submit').submit();
      }
  });
  });
</script>
  </body>
</html>