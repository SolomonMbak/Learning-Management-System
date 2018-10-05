<?php
session_start();
include '../class/connection.php';

$id="";

if(isset($_GET["id"])){
  $id=mres($conn,$_GET["id"]);
}else{
  header("Location: landing.php");
}
if (isset($_GET["id"]) && isset($_GET["sub_cat_id"])) {
  $qs=mysqli_query($conn,"select * from table_study where add_cat_id='".mres($conn,$_GET["id"])."' and sub_cat_id='".mres($conn,$_GET["sub_cat_id"])."'");

  if (mysqli_num_rows($qs)==0) {
      $qi=mysqli_query($conn,"insert into table_study values('','".mres($conn,$_SESSION["user_id"])."','".mres($conn,$_GET["id"])."','".mres($conn,$_GET["sub_cat_id"])."') ");
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
              <a href="landing.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Study</li>
          </ol>
          <!-- Breadcrumbs ending-->

          <!-- Page Content -->
          <h1>Study</h1>
          <hr>




        <!-- Start 360's bodu here -->

          <div class="container">

      <div class="row">

        <div class="col-lg-3">

          <h2 class="my-4"></h2>
          <div class="list-group">
            <a href="#" class="list-group-item active">
            <?php
            $qc=mysqli_query($conn,"select add_cat_name from table_add_category where add_cat_id='".$id."'");
            $rc=mysqli_fetch_array($qc,MYSQLI_NUM);
            echo "<h3>".$rc[0]."</h3>";
            ?>

            </a>
    <?php
    $ql=mysqli_query($conn,"select * from table_sub_category where cat_id='".$id."' order by sub_cat_id asc");
    while($rl=mysqli_fetch_array($ql,MYSQLI_ASSOC)){
    echo '<a href="?id='.$id.'&sub_cat_id='.$rl["sub_cat_id"].'" class="list-group-item">'.$rl["sub_cat_name"].'</a>';
            }
            echo '<a href="assessment.php?assessment_id='.$id.'" class="list-group-item">Assessment</a>';
            ?>
          
          </div>
        </div>

        <div class="col-lg-9">
        <!-- The work area -->
        <div class="container">
          <br><br><br><br>
       
        <?php
        $ql = "";
        if (isset($_GET["sub_cat_id"])) {
          $ql=mysqli_query($conn, "select * from table_lecture where sub_cat_id='".$_GET["sub_cat_id"]."'");
        }else{
          $ql=mysqli_query($conn, "select * from table_lecture inner join table_sub_category on table_lecture.sub_cat_id = table_sub_category.sub_cat_id where table_sub_category.cat_id='".$id."' and table_sub_category.sub_cat_order=1 ");
        }
          while($row=mysqli_fetch_array($ql,MYSQLI_ASSOC)){
            echo $row["lecture_content"];
          }
        
        ?>
      
      </div>
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
   