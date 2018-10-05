<?php 
session_start();
include '../class/connection.php';

$cat_msg="";
$cat_image_msg="";
$add_cat_id="";
$add_cat_name="";
$add_cat_order="";
$add_cat_image="";
$top_cat_id="";


function GetImageExtension($imagetype){
  if (empty($imagetype))
    return false;
  switch ($imagetype) {
    case 'image/jpeg':
      return '.jpg';
    case 'image/png':
      return '.png';
      case 'image/bmp':
      return '.bmp';
    case 'image/gif':
      return '.gif';

    default:
      return false;
  }
}


if (isset($_POST["btn_save"])) {

$text_add_category_name=mres($conn,$_POST["text_add_category_name"]);
$text_add_category_order=mres($conn,$_POST["text_add_category_order"]);
$top_cat_id=mres($conn,$_POST["top_cat_id"]);

$qry=mysqli_query($conn, "insert into table_add_category values('','".$text_add_category_name."','".$text_add_category_order."','','".$top_cat_id."')");

  $add_cat_id = mysqli_insert_id($conn);


if ($qry) {
  $cat_msg='
  <div id="Login-alert" class="alert alert-success" col-sm-12">Category added successfully</div>';

  $file_name=$_FILES["text_add_category_image"]["name"];
  $temp_name=$_FILES["text_add_category_image"]["tmp_name"];
  $imgtype=$_FILES["text_add_category_image"]["type"];
  $ext = GetImageExtension($imgtype);

  if ($ext !=false) {
    
  $imagename=date('Y-m-d_h-i-s').rand(1111,9999).rand(1111,9999).$ext;
  $target_path = "../images/cat_images/".$imagename;
  
  if (move_uploaded_file($temp_name, $target_path)){
  $qry_update=mysqli_query($conn,"update table_add_category set add_cat_image='".$imagename."' where add_cat_id='".$add_cat_id."'");

  $cat_image_msg='
  <div id="Login-alert" class="alert alert-success" col-sm-12">Image also added Successfully</div>';

  }else{
    $cat_image_msg='
  <div id="Login-alert" class="alert alert-danger" col-sm-12">Image not added successfully</div>';
  }

  }else{
    $cat_image_msg='
  <div id="Login-alert" class="alert alert-danger" col-sm-12">File not added successfully. A picture format is expected.</div>';

  }




}else{
  $cat_msg='
  <div id="Login-alert" class="alert alert-danger" col-sm-12">Category not added successfully</div>';
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
            <li class="breadcrumb-item active">Add Department</li>
          </ol>
          <!-- Breadcrumbs ending-->

          <!-- Page Content -->
          <h1>ADD DEPARTMENT</h1>
          <hr>




        <!-- Start 360's bodu here -->

        <div class="row">
    <div class="container">
      <div class="">
         <div class="card-header"><strong>HINT: </strong>A Department could have more than one group. .......</div>
        <div class="card-body">

          <?php echo $cat_msg;
          echo $cat_image_msg ?>
          <form id="form_add_category" class="form-horizontal" rol="form" method="post" action='<?php echo $_SERVER["PHP_SELF"]; ?>' enctype="multipart/form-data">

            <div class="form-group">
              <label>Enter Category Name:</label>
              <div class="form-label-group">
                <input class="form-control" type="text" name="text_add_category_name" id="text_add_category_name" placeholder="Enter Category Name">
              </div>
            </div>


            <div class="form-group">
              <label>Enter Category Order:</label>
              <div class="form-label-group">
                <input class="form-control" type="number" name="text_add_category_order" id="text_add_category_order" placeholder="Enter Category Order">
              </div>
            </div>

           <div class="form-group">
              <div class="form-label-group">
                <select class="form-control" name="top_cat_id" id="top_cat_id">
                <option value="">-- Select a top category --</option>
                <?php
                $qtc=mysqli_query($conn,"select * from table_top_category order by top_cat_order desc");
                while ($row=mysqli_fetch_array($qtc,MYSQLI_ASSOC)) {
                  echo '<option value="'.$row["top_cat_id"].'">'.$row["top_cat_name"].'</option>';
                }
                ?>
                </select>
                </div>
            </div>


            <div class="form-group">
              <div class="form-label-group">
                Select an image for this Category
                <input class="form-control" type="file" name="text_add_category_image" id="text_add_category_image">
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

  if ($('#text_add_category_name').val() == "") {
      $('#text_add_category_name').css("border-color","#DA190B");
      $('#text_add_category_name').css("background","#F2DEDE");
        e.preventDefault();        
      }
  if ($('#text_add_category_order').val() == "") {
      $('#text_add_category_order').css("border-color","#DA190B");
      $('#text_add_category_order').css("background","#F2DEDE");
        e.preventDefault();        
      }
  if ($('#top_cat_id').val() == "") {
      $('#top_cat_id').css("border-color","#DA190B");
      $('#top_cat_id').css("background","#F2DEDE");
        e.preventDefault();        
      }
  if ($('#text_add_category_image').val() == "") {
      $('#text_add_category_image').css("border-color","#DA190B");
      $('#text_add_category_image').css("background","#F2DEDE");
        e.preventDefault();        
      }
      else{
        $('form_add_category').unbind('submit').submit();
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
   