<?php
session_start();
include "../class/connection.php";

$form_email="";
$form_password="";
$msg_email="";
$admin_name="";
$msg_password="";


if (isset($_POST["btn_email"])) {
  $qry = mysqli_query($conn,"SELECT admin_email FROM master_admin_info WHERE admin_email='".mres($conn,$_POST["email"])."'") or die(mysqli_error($conn));

  if (mysqli_num_rows($qry) > 0) {

  $admin_name=$_POST["email"];
  $form_email="none";
  $form_password="block";
  }else{
    $msg_email='
    <div id="login-alert" class="alert alert-danger" col-sm-12">Incorrect Email Address</div>
    ';
    $form_email="block";
    $form_password="none";
  }

}

else if (isset($_POST["btn_password"])) {
  $qry = mysqli_query($conn,"SELECT * FROM master_admin_info WHERE admin_email='".mres($conn,$_POST["admin_name"])."' AND admin_password='".md5(mres($conn,$_POST["password"]))."'" ) or die(mysqli_error($conn));

  if (mysqli_num_rows($qry) > 0) {
  $_SESSION["email"]=$_POST["admin_name"];
  header("Location: landing.php");
  }else{
    $msg_password='
    <div id="login-alert" class="alert alert-danger" col-sm-12">Incorrect Password</div>
    ';
    $form_email="none";
    $form_password="block";
  }


}else{
  $form_email="block";
  $form_password="none";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>360academia - Free Web Certification</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../style/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../style/vendor/bootstrap/css/custom.css">
	<script src="../style/vendor/jquery/jquery.min.js"></script>
	<script src="../style/vendor/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

	<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-4">
		<h3></h3>

	</div>
	<div class="col-lg-8 col-md-8 col-sm-12 col-xs-8">
		<h3><br><br></h3>
	</div>
	</div>




	<div class="row">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">360academia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="true" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
         <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact
              </a>
            </li>
          </ul> 
        </div>
      </div>
    </nav>

	</div>



<!-- Email Section -->
	<div class="row">
		<div class="container">
      <div class="card card-login mx-auto mt-5" style='display: <?php echo $form_email; ?>'>
        <div class="card-header">ADMIN USERNAME</div>
        <div class="card-body">

          <?php echo $msg_email; ?>
          <form id="form_email" class="form-horizontal" rol="form" method="post" action='<?php echo $_SERVER["PHP_SELF"]; ?>'>

            <div class="form-group">
              <div class="form-label-group">
                <input class="form-control" type="email"  name="email" placeholder="Email address" required="required">
              </div>
            </div>
            <div>
            <input type="submit" id="btn_email" name="btn_email" class="btn btn-primary btn-block" value="Next">
          </div>
          </form>
          
        </div>
      </div>
    </div>


<!-- Password Section -->

    <div class="container">
      <div class="card card-login mx-auto mt-5" style='display:<?php echo $form_password;?>'>
        <div class="card-header">ADMIN PASSWORD</div>
        <div class="card-body">

          <?php echo $msg_password; ?>
          <form id="form_password" class="form-horizontal" rol="form" method="post" action='<?php echo $_SERVER["PHP_SELF"]; ?>'>
          <input type="hidden" name="admin_name" value='<?php echo $admin_name; ?>' >

            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required" autofocus="autofocus">
                
              </div>
            </div>
            
            
            <div>
            <input type="submit" id="btn_password" name="btn_password" class="btn btn-primary btn-block" value="Login">
          </div>
          </form>
          
        </div>
      </div>
    </div>

	</div>

</div>




<script>
  $(document).ready(function(){
  $("#btn_email").click(function(e){


      if ($('#email').val() == "") {
      $('#email').css("border-color","#DA190B");
      $('#email').css("background","#F2DEDE");
        e.preventDefault();        

      }
      else{
        $('form_email').unbind('submit').submit();
      }
  });



  $("#btn_password").click(function(e){


      if ($('#password').val() == "") {
      $('#password').css("border-color","#DA190B");
      $('#password').css("background","#F2DEDE");
        e.preventDefault();        

      }
      else{
        $('form_email').unbind('submit').submit();
      }  
  });


  });

</script>



</body>
</html>