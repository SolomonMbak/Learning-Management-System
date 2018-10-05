<?php
session_start();
include '../class/connection.php';

$assessment_id="";
$sub_cat_id="";
$user_id = mres($conn, $_SESSION["user_id"]);
/*$add_cat_id = mres($conn, $_GET["add_cat_id"]); */


if(isset($_GET["assessment_id"])){
  $assessment_id=mres($conn,$_GET["assessment_id"]);
}else{
  header("Location: landing.php");
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
              <a href="landing.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Assessment</li>
          </ol>
          <!-- Breadcrumbs ending-->
          <!-- Page Content -->
          <h1>Assessment</h1>
          <hr>


     <!-- Start 360's bodu here -->

          <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <h2 class="my-4"></h2>
         
          <div class="list-group">
            <a href="#" class="list-group-item active">
            <?php
            $qc=mysqli_query($conn,"select add_cat_name from table_add_category where add_cat_id='".$assessment_id."'");
            $rc=mysqli_fetch_array($qc,MYSQLI_NUM);
            echo "<h3>".$rc[0]."</h3>";
            ?>
            Assessment
            </a>
    
          
          </div>
        </div>


<div class="col-lg-9">
        <!-- The work area -->
        <div class="container">
          
<?php
    if (isset($_POST["btn_assessment"])) {
      $total=0;
    echo "<h3>Assessment Result</h3>";
  $count=0;
  $qa=mysqli_query($conn,"select * from table_assessment where cat_id='".$_GET["assessment_id"]."'");

  echo '<table class="table table-bordered">';
  echo '<thead><tr><td>#</td><td>Your Option</td><td>Correct Answer</td><td>Remark</td></tr></thead>';

  while ($row=mysqli_fetch_array($qa,MYSQLI_ASSOC)) {
  $count++;
  $result="";
  $score = (($total*100)/($count));

  
  if ($_POST["r_".$count]==$row["answer"]) {
  
    $total++;

  echo "<tr class='success'><td>".$count."</td><td>".$_POST["r_".$count]."</td><td>".$row["answer"]."<td>
  <span class='glyphicon glyphicon-ok text-success' aria-hidden='true'></span> </td></tr>";
    }
    if ($_POST["r_".$count]!=$row["answer"]) {
  echo "<tr class='danger'><td>".$count."</td><td>".$_POST["r_".$count]."</td><td>".$row["answer"]."<td>
  <span class='glyphicon glyphicon-remove text-success' aria-hidden='true'></span> </td></tr>";
    }
    }
    echo '</thead></table>';
    echo "You scored: ".$total;
    echo '<br />';
    echo $score."%";

    if (($score)>=80) {
      echo '<div class="alert alert-success"><stong>Congratulations.</strong> You have passed this course. You can re-write the examination if you wish.</div>';
      $qt=mysqli_query($conn, "insert into table_scores values('','".mres($conn,$_SESSION["user_id"])."','".mres($conn, $_GET["assessment_id"])."','".$score."')");

    }else{
      echo '<div class="alert alert-danger"><strong>You failed.</strong> You must score up to 80% to pass this examination.</div>';
    }
  }
?>


    <form id="form_assessment" rol="form" method="post" action='<?php echo $_SERVER["PHP_SELF"]."?assessment_id=".$assessment_id; ?>'>
        <?php
        $ql=mysqli_query($conn, "select * from table_assessment where cat_id ='".$assessment_id."'");
        $count=0;
          while($row=mysqli_fetch_array($ql,MYSQLI_ASSOC)){
            $count++;
            echo "<p>".$row["assessment_content"]."</p>";
            echo "<ul style='list-style-type:none; required'>";
            
            echo '<li><input type="radio" name="r_'.$count.'" value="a"/> '.$row["option_a"].'</li>';
            echo '<li><input type="radio" name="r_'.$count.'" value="b"/> '.$row["option_b"].'</li>';
            echo '<li><input type="radio" name="r_'.$count.'" value="c"/> '.$row["option_c"].'</li>';
            echo '<li><input type="radio" name="r_'.$count.'" value="d"/> '.$row["option_d"].'</li>';
            
            echo "</ul>";
          }
        
        ?>

         <div>
            <input type="submit" id="btn_assessment" name="btn_assessment" class="btn btn-success" value="FINISH">
          </div>

      </form>
      
      </div>
    </div>
  </div>
</div>
        </div>
        <!-- end the body here  /.container-fluid -->
</div>
      <!-- /.content-wrapper -->
<?php
include 'widgets/footer.php';
?>
   