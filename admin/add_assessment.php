<?php 
session_start();
include '../class/connection.php';

$msg="";

if (isset($_POST["btn_save"])) {
  $top_cat_id = mres($conn, $_POST["top_cat_id"]);
  $assessment_content = mres($conn, $_POST["assessment_content"]);
  $option_a = mres($conn, $_POST["option_a"]);
  $option_b = mres($conn, $_POST["option_b"]);
  $option_c = mres($conn, $_POST["option_c"]);
  $option_d = mres($conn, $_POST["option_d"]);
  $answer = mres($conn, $_POST["answer"]);
  $qe=mysqli_query($conn, "insert into table_assessment values('','".$top_cat_id."','".$assessment_content."','".$option_a."','".$option_b."','".$option_c."','".$option_d."','".$answer."')");

  if ($qe) {
      $msg='
  <div id="Login-alert" class="alert alert-success" align="center" col-sm-12">-- Assessment added successfully --</div>';
 
  }else{
    $msg='
  <div id="Login-alert" class="alert alert-danger" align="center" col-sm-12">-- Assessment not added successfully --</div>';
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
            <li class="breadcrumb-item active">Add Assessment</li>
          </ol>
          <!-- Breadcrumbs ending-->
          <!-- Page Content -->
          <h1>ADD ASSESSMENT</h1>
          <hr>




        <!-- Start 360's bodu here -->
<div class="row">
    <div class="container">
      <div class="">
        <div class="card-header"></div>
        <div class="card-body">

      
          <?php  echo $msg; ?>
          <form id="assessment_form" class="form-horizontal" rol="form" method="post" action='<?php echo $_SERVER["PHP_SELF"]; ?>'>


            <div class="form-group">
              <div class="form-label-group">
                <select class="form-control" name="top_cat_id" id="top_cat_id" required="required">
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
            
            <div class="form-group">
              <label>Type question below: </label>
              <div class="form-label-group">
                <textarea class="form-control ckeditor" name="assessment_content" id="assessment_content" required="required"></textarea>
              </div>
            </div>


            <div class="form-group">
              <label>Option A:</label>
              <div class="form-label-group">
                <input class="form-control" type="text" id="option_a"  name="option_a" placeholder="Option A" required="required">
              </div>
            </div>

             <div class="form-group">
              <label>Option B:</label>
              <div class="form-label-group">
                <input class="form-control" type="text" id="option_b"  name="option_b" placeholder="Option B" required="required">
              </div>
            </div>

             <div class="form-group">
              <label>Option C:</label>
              <div class="form-label-group">
                <input class="form-control" type="text" id="option_c"  name="option_c" placeholder="Option C" required="required">
              </div>
            </div>

             <div class="form-group">
              <label>Option D:</label>
              <div class="form-label-group">
                <input class="form-control" type="text" id="option_d"  name="option_d" placeholder="Option D" required="required">
              </div>
            </div>


             <div class="form-group">
              <div class="form-label-group">
                <select class="form-control" name="answer" id="answer">
                <option value="">-- Select the Correct Answer --</option>
                <option value="a">Option A</option>';
                <option value="b">Option B</option>';
                <option value="c">Option C</option>';
                <option value="d">Option D</option>';
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
  if ($('#top_cat_id').val() == "") {
      $('#top_cat_id').css("border-color","#DA190B");
      $('#top_cat_id').css("background","#F2DEDE");
        e.preventDefault();        
      }
  if ($('#assessment_content').val() == "") {
      $('#assessment_content').css("border-color","#DA190B");
      $('#assessment_content').css("background","#F2DEDE");
        e.preventDefault();        
      }    
  if ($('#option_a').val() == "") {
      $('#option_a').css("border-color","#DA190B");
      $('#option_a').css("background","#F2DEDE");
        e.preventDefault();        
      }    
  if ($('#option_b').val() == "") {
      $('#option_b').css("border-color","#DA190B");
      $('#option_b').css("background","#F2DEDE");
        e.preventDefault();        
      }    
  if ($('#option_c').val() == "") {
      $('#option_c').css("border-color","#DA190B");
      $('#option_c').css("background","#F2DEDE");
        e.preventDefault();        
      }    
  if ($('#option_d').val() == "") {
      $('#option_d').css("border-color","#DA190B");
      $('#option_d').css("background","#F2DEDE");
        e.preventDefault();        
      }    
  if ($('#answer').val() == "") {
      $('#answer').css("border-color","#DA190B");
      $('#answer').css("background","#F2DEDE");
        e.preventDefault();        
      }                
  else{
      $('#assessment_form').unbind('submit').submit();
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
   