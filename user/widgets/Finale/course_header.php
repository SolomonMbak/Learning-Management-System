
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>360academia - Free online certifiaction</title>
    <!-- Bootstrap core CSS -->
    <link href="../style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../style/css/shop-homepage.css" rel="stylesheet">
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">360academia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <span class="sr-only"></span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="landing.php">Home</a>
            </li>       
            <?php
              if (!isset($_SESSION["user_id"])) {
              
             echo   '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
             echo   '<li class="nav-item"><a class="nav-link" href="sign-up.php">Sign-Up</a></li>';
            }
            else{
              
             echo   '<li><a class="nav-link" data-toggle="dropdown" href="#">Hello '.$_SESSION["first_name"].' 
                    <span clas="caret"></span> </a>';
             echo '
            <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="faq.php">FAQ</a>
            <a class="dropdown-item" href="change_info.php">Modify Contact Info</a>
            <a class="dropdown-item" href="change_password.php">Change Password</a>
            <a class="dropdown-item" href="change_email.php">Change Email</a>
            <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
        </li>
             ';
            }
            ?>

          </ul>
        </div>
      </div>
    </nav>