<?php 
session_start();
include '../class/connection.php';

$msg="";

if (isset($_POST["btn_save"])) {
  $text_lecture_order = mres($conn, $_POST["text_lecture_order"]);
  $sub_cat_id = mres($conn, $_POST["sub_cat_id"]);
  $editor = mres($conn, $_POST["editor"]);
  $qe=mysqli_query($conn, "insert into table_lecture values('','".$editor."','".$text_lecture_order."','".$sub_cat_id."')");

  if ($qe) {
      $msg='
  <div id="Login-alert" class="alert alert-success" col-sm-12">-- Lecture added successfully --</div>';
 
  }else{
    $msg='
  <div id="Login-alert" class="alert alert-danger" col-sm-12">-- Lecture not added successfully --</div>';
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
            <li class="breadcrumb-item active">Add Lecture</li>
          </ol>
          <!-- Breadcrumbs ending-->

          <!-- Page Content -->
          <h1>ADD LECTURE</h1>
          <hr>

        <!-- Start 360's bodu here -->
<div class="row">
    <div class="container">
      <div class="">
        <div class="card-header"></div>
        <div class="card-body">

      
          <?php  echo $msg; ?>
          <form id="form_lecture" class="form-horizontal" rol="form" method="post" action='<?php echo $_SERVER["PHP_SELF"]; ?>'>

            <div class="form-group">
              <label>Lecture Order:</label>
              <div class="form-label-group">
                <input class="form-control" type="number" id="text_lecture_order"  name="text_lecture_order" placeholder="Lecture Order" required="required">
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                <select class="form-control" name="sub_cat_id" id="sub_cat_id" required="required">
                <option value="">-- Select a sub category --</option>
                <?php
                $qtc=mysqli_query($conn,"select * from table_sub_category order by sub_cat_order asc");
                while ($row=mysqli_fetch_array($qtc,MYSQLI_ASSOC)) {
                
                 echo ' <option value="'.$row["sub_cat_id"].'">'.$row["sub_cat_name"].'</option>';
                }
                ?>
                </select>
                </div>
            </div>


            <div class="form-group">
              <label>Course Content</label>
              <div class="form-label-group">
                <textarea class="form-control ckeditor" name="editor" id="editor" placeholder="Course Content" required="required"></textarea>
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
  if ($('#text_lecture_order').val() == "") {
      $('#text_lecture_order').css("border-color","#DA190B");
      $('#text_lecture_order').css("background","#F2DEDE");
        e.preventDefault();        
      }
  if ($('#sub_cat_id').val() == "") {
      $('#sub_cat_id').css("border-color","#DA190B");
      $('#sub_cat_id').css("background","#F2DEDE");
        e.preventDefault();        
      }    
  else{
      $('#form_lecture').unbind('submit').submit();
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
   