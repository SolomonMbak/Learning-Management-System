<?php
session_start();
include '../class/connection.php';

if (isset($_SESSION["email"])) {
  $qu = mysqli_query($conn, "select * from master_user_info where email='".mres($conn,$_SESSION["email"])."'");
  $row=mysqli_fetch_array($qu,MYSQLI_ASSOC);
  $_SESSION["user_id"]=$row["user_id"];
  $_SESSION["first_name"]=$row["first_name"];
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
            <li class="breadcrumb-item active">Landing</li>
          </ol>
          <!-- Breadcrumbs ending-->

          <!-- Page Content -->
          <h1>Available Courses</h1>
          <hr>
        <!-- Start 360's bodu here -->

          <div class="panel panel-default" align="center">
    <div class="">
    <br>
  </div>

        <?php
          $query ="select * from table_add_category order by rand()";
          $result = mysqli_query($conn, $query);
          if (mysqli_fetch_array($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
          ?>
      <div class="card bg-light mb-2 d-inline-block" style="max-width: 18rem;">
        <div class="card-header"> <?php echo $row["add_cat_name"];  ?></div>
        <div class="card-body">
          <h4 class="card-title"><?php echo '<a href="study.php?id='.$row["add_cat_id"].'">'.$row["add_cat_name"].'</a>';  ?></h4>
          <p class="card-text">Approximately: <?php echo $row["add_cat_id"];  ?>hours</p>
        
       
          </div>
      
      </div>

         <?php
            }
            
          }

          ?>
          </div>
          <!-- /.row -->
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
   