<?php
session_start();
include '../class/connection.php';

$cat_msg="";
if (isset($_GET["delete_id"])) {

$qry=mysqli_query($conn, "delete from table_top_category where top_cat_id='".mres($conn,$_GET["delete_id"])."'");

if ($qry) {
  $cat_msg='
  <div id="Login-alert" class="alert alert-success" col-sm-12">Category Deleted Successfully</div>';

}else{
  $cat_msg='
  <div id="Login-alert" class="alert alert-danger" col-sm-12">Category Not deleted successfully</div>';
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
            <li class="breadcrumb-item active">Manage Faculty</li>
          </ol>
          <!-- Breadcrumbs ending-->

          <!-- Page Content -->
          <h1>MANAGE FACULTY</h1>
          <hr>




        <!-- Start 360's bodu here -->

        <div class="row">
    <div class="container">
      <div class="">
        <div class="card-header"></div>
        <div class="card-body">
      <div class="row">
    <div class="container">      
        <div class="card-body">
          <form id="form_search" class="form-horizontal" rol="form" method="post" action='<?php echo $_SERVER["PHP_SELF"]; ?>'>
             <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="text_search" name="text_search" class="form-control" placeholder="Search by Faculty Name" required="required">
                <label for="text_search">Search by Faculty Name</label>
              </div>
            </div>
              <div>
            <input type="submit" id="btn_search" name="btn_search" class="btn btn-success btn-block" value="Search">
          </div>
          </form>
          
        </div>
     
    </div>
  </div>
          <?php echo $cat_msg; ?>
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Faculty Name</th>
              <th>Faculty Order</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <?php
            if (isset($_POST["btn_search"])) {
            $qry = mysqli_query($conn,"select * from table_top_category where top_cat_name like '%".mres($conn,$_POST["text_search"])."%' order by top_cat_order asc");

            }else{
              $qry = mysqli_query($conn,"select * from table_top_category order by top_cat_order asc");
            }

            while ($row=mysqli_fetch_array($qry,MYSQLI_ASSOC)) {
              echo '<tr>';
              echo '<td>'.$row["top_cat_id"]."</td><td>".$row["top_cat_name"]."</td><td>".$row["top_cat_order"]."</td><td>
              <a href='?delete_id=".$row["top_cat_id"]."' onclick=\"return confirm('Are you sure you want to permanently delete this record?');\"'> Delete</a> </td>";
              echo '</tr>';
            }
            ?>

          </tbody>
        </table>
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
   