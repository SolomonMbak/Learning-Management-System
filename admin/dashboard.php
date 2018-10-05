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
            <li class="breadcrumb-item active"></li>
          </ol>
          <!-- Breadcrumbs ending-->

          <!-- Page Content -->
          <h1>SUMMARY</h1>
          <hr>


        <!-- Start 360's bodu here -->
 <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                  </div>
                  <?php
                  $qu=mysqli_query($conn, "select count(*) from master_user_info");
                  $row = $qu -> fetch_row();
                  ?>
                  <div class="mr-5"><h2><?php echo $row[0]; ?></h2> Registered Users</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="manage_users.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>


            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <?php
                  $qc=mysqli_query($conn, "select count(*) from table_top_category");
                  $row = $qc -> fetch_row();

                  ?>
                  <div class="mr-5"><h2><?php echo $row[0]; ?></h2> Faculties</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="manage_top_category.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>


            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  
                  <?php
                  $qd=mysqli_query($conn, "select count(*) from table_add_category");
                  $row = $qd -> fetch_row();

                  ?>
                  <div class="mr-5"><h2><?php echo $row[0]; ?></h2> Departments</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="manage_category.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>


            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-life-ring"></i>
                  </div>
                  <?php
                  $qc=mysqli_query($conn, "select count(*) from table_sub_category");
                  $row = $qc -> fetch_row();

                  ?>
                  <div class="mr-5"><h2><?php echo $row[0]; ?></h2> Available Courses</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="manage_sub_category.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>

          <!-- Area Chart Example
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-chart-area"></i>
              Area Chart Example</div>
            <div class="card-body">
              <canvas id="myAreaChart" width="100%" height="30"></canvas>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div> -->

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Table Example</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th>Name</th>
              <th>gender</th>
              <th>Phone Number</th>
              <th>Email</th>
              <th>Registered Date</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <?php
            if (isset($_POST["btn_search"])) {
            $qry = mysqli_query($conn,"select * from master_user_info where first_name like '%".mres($conn,$_POST["text_search"])."%' order by user_id asc");

            }else{
              $qry = mysqli_query($conn,"select * from master_user_info order by dor desc");
            }

            while ($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)) {
              echo '<tr>';
              echo '<td>'.$row["first_name"]." ".$row["other_names"]."</td><td>".$row["gender"]."</td><td>".$row["phone"]."</td><td>".$row["email"]."</td><td>".$row["dor"]."</td><td>
              <a href='?delete_id=".$row["user_id"]."' onclick=\"return confirm('Are you sure you want to permanently delete this record?');\"'> Delete</a> </td>";
              echo '</tr>';
            }
            ?>
          </tbody>
        </table>
              </div>
            </div>
            <div class="card-footer small text-muted">UPDATED: <?php  echo date("Y-m-d");  ?>   AT: <?php  echo date("h-i-s");  ?></div>
          </div>

        </div>
        <!-- /.container-fluid -->


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
   