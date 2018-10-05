<?php
session_start();
include '../class/connection.php';

include 'widgets/header.php';
$msg="";

if (isset($_POST["btn_name_modify"])) {
  
  $qr = mysqli_query($conn, "update master_user_info set 
        gender = '".mres($conn,$_POST["gender"])."',
        phone = '".mres($conn,$_POST["phoneNumber"])."',
        email = '".mres($conn,$_POST["email"])."'

        where user_id = '".mres($conn,$_SESSION["user_id"])."'");
  
  if ($qr) {
    $msg='
      <div id="Login-alert" class="alert alert-success" col-sm-12">Profile Modified Successfully.</div>';
  }else{
     $msg='
      <div id="Login-alert" class="alert alert-danger" col-sm-12">Profile not modified successfully. Please cross-check the information you provided.</div>';
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
            <li class="breadcrumb-item active">Change your details</li>
          </ol>
          <!-- Breadcrumbs ending-->

          <!-- Page Content -->
          <h1>Change you Name</h1>
          <hr>




        <!-- Start 360's bodu here -->

        <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Modify your information</div>

        <div class="card-body">
          <?php echo $msg;  ?>

    <form id="modify_profile_form" name="modify_profile_form" rol="form" method="post" action='<?php echo $_SERVER["PHP_SELF"]; ?>'>
            
            

          <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <select type="text" id="gender" name="gender" class="form-control" >
                      <option value="">-- Gender --</option>
                      <option value="female">Female</option>
                      <option value="male">Male</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="number" id="phoneNumber" class="form-control" placeholder="Phone Number" required="required">
                    <label for="phoneNumber">Phone Number</label>
                  </div>
                </div>
              </div>
            </div>



            
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="email" id="email" class="form-control" placeholder="Email Address" required="required" autofocus="autofocus">
                    <label for="email">Email Address</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="email" id="confirmEmail" class="form-control" placeholder="Confirm Email" required="required">
                    <label for="confirmEmail">Confirm Email</label>
                  </div>
                </div>
              </div>
            </div>


           <hr>

            <div>
            <input type="submit" id="btn_name_modify" name="btn_name_modify" class="btn btn-primary btn-block" value="UPDATE">
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
  $("#btn_name_modify").click(function(e){
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
      else{
        $('form_sub_category').unbind('submit').submit();
      }
  });
  });
</script>