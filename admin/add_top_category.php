<?php 
session_start();
include '../class/connection.php';

$cat_msg="";
$top_cat_id="";
$top_category_name="";
$top_category_order="";


if (isset($_POST["btn_save"])) {

$top_category_name=mres($conn,$_POST["text_top_category_name"]);
$top_category_order=mres($conn,$_POST["text_top_category_order"]);

$qry=mysqli_query($conn, "insert into table_top_category values('','".$top_category_name."','".$top_category_order."')") or die(mysqli_error($conn));

if ($qry) {
  $cat_msg='
  <div id="Login-alert" class="alert alert-success" col-sm-12">Category Added Successfully</div>';

}else{
  $cat_msg='
  <div id="Login-alert" class="alert alert-danger" col-sm-12">Category Added Successfully</div>';
}
}
?>

<?php
include 'widgets/header.php';
?>

<?php
include 'widgets/sidebar.php';
?>
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="dashboard.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add Faculty</li>
          </ol>
          <!-- Breadcrumbs ending-->

          <!-- Page Content -->
          <h1>ADD FACULTY</h1>
          <hr>
        <!-- Start 360's bodu here -->
<div class="row">
    <div class="container">
      <div class="">
        <div class="card-header"><strong>HINT: </strong>A faculty could have more than one group. .......</div>
        <div class="card-body">

          <?php echo $cat_msg; ?>
          <form id="form_add_top_category" class="form-horizontal" rol="form" method="post" action='<?php echo $_SERVER["PHP_SELF"]; ?>'>

            <div class="form-group">
              <label>Top Category Name: </label>
              <div class="form-label-group">
                <input class="form-control" type="text"  name="text_top_category_name" placeholder="Top Category Name" required="required">
              </div>
            </div>


            <div class="form-group">
              <label>Top Category Order: </label>
              <div class="form-label-group">
                <input class="form-control" type="number"  name="text_top_category_order" placeholder="Top Category Order" required="required" value="<?php echo $top_category_order; ?>">
              </div>
            </div>

           
          <div>
            <input type="submit" id="btn_save" name="btn_save" class="btn btn-primary btn-block" value="SAVE">
          </div>
             
          </form>
          
        </div>
      </div>
    </div>





</div>
</div>


<script>
  $(document).ready(function(){
    $('input[class="form-control"]').focus(function(){
      $(this).removeAttr('style');
    });
  $("#btn_save").click(function(e){

  if ($('#top_category_name').val() == "") {
      $('#top_category_name').css("border-color","#DA190B");
      $('#top_category_name').css("background","#F2DEDE");
        e.preventDefault();        
      }
  if ($('#top_category_order').val() == "") {
      $('#top_category_order').css("border-color","#DA190B");
      $('#top_category_order').css("background","#F2DEDE");
        e.preventDefault();        
      }
      else{
        $('form_add_top_category').unbind('submit').submit();
      }
  });

  });

</script>

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
   