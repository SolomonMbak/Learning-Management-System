<?php
session_start();
include 'widgets/header.php';
$msg="";

if (isset($_POST["btn_password_modify"])) {
  
  $qr = mysqli_query($conn, "update master_user_info set 
        password = '".mres($conn,md5($_POST["password"]))."'

        where user_id = '".mres($conn,$_SESSION["user_id"])."'");
  
  if ($qr) {
    $msg='
      <div id="Login-alert" class="alert alert-success" col-sm-12">Password chanage was successful.</div>';
  }else{
     $msg='
      <div id="Login-alert" class="alert alert-danger" col-sm-12">Password change was unsucessful. Please try again.</div>';
  }
}
?>

<?php
include 'widgets/sidebar.php';
?>


      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="landing.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Change Password</li>
          </ol>
          <!-- Breadcrumbs ending-->

          <!-- Page Content -->
          <h1>Change Password</h1>
          <hr>




        <!-- Start 360's bodu here -->

        
      <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Modify your password</div>

        <div class="card-body">
          <?php echo $msg;  ?>

    <form id="modify_password" name="modify_profile_form" rol="form" method="post" action='<?php echo $_SERVER["PHP_SELF"]; ?>'>
            
            


            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required" autofocus="autofocus">
                    <label for="password">Password</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirm Password" required="required">
                    <label for="confirmPassword">Confirm Password</label>
                  </div>
                </div>
              </div>
            </div>


            <div>
            <input type="submit" id="btn_password_modify" name="btn_password_modify" class="btn btn-primary btn-block" value="UPDATE">
          </div>
          </form>
        </div>
      </div>
    </div>











        </div>
        <!-- end the body here  /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © <a href="http://study.360academia.com"> 360academia</a> 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->
<?php
include 'widgets/footer.php';
?>
   
<script>
  $(document).ready(function(){
    $('input[class="form-control"]').focus(function(){
      $(this).removeAttr('style');
    });
  $("#btn_password_modify").click(function(e){
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
        $('modify_password').unbind('submit').submit();
      }
  });
  });
</script>