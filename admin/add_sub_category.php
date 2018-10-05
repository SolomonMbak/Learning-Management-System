<?php 
session_start();
include '../class/connection.php';

$cat_msg="";
$add_cat_id="";
$add_cat_name="";
$add_cat_order="";
$top_cat_id="";

if (isset($_POST["btn_save"])) {

$text_sub_category_name=mres($conn,$_POST["text_sub_category_name"]);
$text_sub_category_order=mres($conn,$_POST["text_sub_category_order"]);
$top_cat_id=mres($conn,$_POST["top_cat_id"]);

$qry=mysqli_query($conn, "insert into table_sub_category values('','".$text_sub_category_name."','".$text_sub_category_order."','".$top_cat_id."')") or die(mysqli_error($conn));

if ($qry) {
  $cat_msg='
  <div id="Login-alert" class="alert alert-success" col-sm-12">Sub Category Added Successfully</div>';

}else{
  $cat_msg='
  <div id="Login-alert" class="alert alert-danger" col-sm-12">Sub Category NOT Added Successfully</div>';
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
            <li class="breadcrumb-item active">Add Course</li>
          </ol>
          <!-- Breadcrumbs ending-->

          <!-- Page Content -->
          <h1>ADD COURSE</h1>
          <hr>




        <!-- Start 360's bodu here -->
<div class="row">
    <div class="container">
      <div class="">
       <div class="card-header"><strong>HINT: </strong>A Department could have more than one group. .......</div>
        <div class="card-body">

          <?php echo $cat_msg; ?>
          <form id="form_sub_category" class="form-horizontal" rol="form" method="post" action='<?php echo $_SERVER["PHP_SELF"]; ?>'>

            <div class="form-group">
              <label>Sub Category Name:</label>
              <div class="form-label-group">
                <input class="form-control" type="text"  name="text_sub_category_name" id="text_sub_category_name" placeholder="Sub Category Name" required="required">
              </div>
            </div>


            <div class="form-group">
              <label>Sub Category Order:</label>
              <div class="form-label-group">
                <input class="form-control" type="number" id="text_sub_category_order"  name="text_sub_category_order" placeholder="Sub Category Order" required="required">
              </div>
            </div>

            <div class="form-group">
              <label>Choose a course</label>
              <div class="form-label-group">
                <select class="form-control" name="top_cat_id" id="top_cat_id">
                <option value="">-- Select a Category --</option>
                <?php
                $qtc=mysqli_query($conn,"select * from table_add_category order by add_cat_name desc");
                while ($row=mysqli_fetch_array($qtc,MYSQLI_ASSOC)) {
                
                  if ($row["add_cat_id"]==$add_cat_id) 
                 echo ' <option value="'.$row["add_cat_id"].'" selected>'.$row["add_cat_name"].'</option>';
               else
                 echo ' <option value="'.$row["add_cat_id"].'">'.$row["add_cat_name"].'</option>';
                }
                ?>
                </select>
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

  if ($('#text_sub_category_name').val() == "") {
      $('#text_sub_category_name').css("border-color","#DA190B");
      $('#text_sub_category_name').css("background","#F2DEDE");
        e.preventDefault();        
      }
  if ($('#text_sub_category_order').val() == "") {
      $('#text_sub_category_order').css("border-color","#DA190B");
      $('#text_sub_category_order').css("background","#F2DEDE");
        e.preventDefault();        
      }
  if ($('#top_cat_id').val() == "") {
      $('#top_cat_id').css("border-color","#DA190B");
      $('#top_cat_id').css("background","#F2DEDE");
        e.preventDefault();        
      }
      else{
        $('form_sub_category').unbind('submit').submit();
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
   