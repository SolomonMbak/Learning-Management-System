<?php
session_start();


include '../class/connection.php';
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
            <li class="breadcrumb-item active">Landing Page</li>
          </ol>
          <!-- Breadcrumbs ending-->

          <!-- Page Content -->
          <h1>Dashboard</h1>
          <hr>




        <!-- Start 360's bodu here -->

        <?php
          $query ="select * from add_courses order by rand()";
          $result = mysqli_query($conn, $query);
          if (mysqli_fetch_array($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
          ?>
      <div class="card bg-light mb-2 d-inline-block" style="max-width: 18rem;">
        <div class="card-header"><?php echo $row["course_type"];  ?></div>
        <div class="card-body">
          <h4 class="card-title"><?php echo '<a href="lecture.php?id='.$row["id"].'">'.$row["course_title"].'</a>';  ?></h4>
          <p class="card-text">Approximately:<strong> <?php echo $row["duration"];  ?></strong>hours</p>
        
       
          </div>
      
      </div>

         <?php
            }
            
          }

          ?>




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
   