<?php
session_start();
include 'class/connection.php';
$msg="";

if (isset($_POST["btn_contact"])) {
    $qr=mysqli_query($conn,"insert into contact_us values('','".mres($conn,$_POST["name"])."','".mres($conn,$_POST["email"])."','".mres($conn,$_POST["msg_subject"])."','".mres($conn,$_POST["message"])."','".mres($conn,$_POST["date"])."')");

    if ($qr) {
      $msg='
        <div id="Login-alert" class="alert alert-success" col-sm-12">Message sent successfully. You will get a response as soon as possible.</div>';

    }else{
       $msg='
        <div id="Login-alert" class="alert alert-danger" col-sm-12">Message not sent. Please try again.</div>';
    }
  }
?>

<?php
include 'widgets/header.php';
?>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">360academia</a>
        <a class="btn btn-primary" href="user/login.php">Sign In</a>
      </div>
    </nav>

    <!-- Masthead -->
    <header class="masthead text-white text-center">
      <div class="overlay"></div>
      <div class="overlay"></div>
      <div class="overlay"></div>
      <div class="overlay"></div>
      <div class="overlay"></div>
      <div class="container">
        <div class="row">



          <section id="contact" class="section">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-9 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">
            <div class="contact-block">
              <div class="section-header">
                <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Contact <span>Us</span></h2>
                <hr class="lines wow zoomIn" data-wow-delay="0.3s">
              </div>
        <center><strong><p>For suggestions, complements, complains, to request for questions or/and supply us with questions, please type a message below or mail us @  <a href="mailto:info@360academia.com?Subject=Hello%20again" target="_top"> info@360academia.com</p></strong></center>



       <form id="form_contact" name="form_contact" rol="form" method="post" action='<?php echo $_SERVER["PHP_SELF"]; ?>'>
         <?php echo $msg;  ?>
        <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" placeholder="Your Name" id="name" class="form-control"  name="name"  required data-error="Please enter your Fulname">
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" placeholder="Your Email" id="email" class="form-control" name="email" required data-error="Please enter your email">
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" placeholder="Subject" id="msg_subject" class="form-control" name="msg_subject" required data-error="Please enter your subject">
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea class="form-control" name="message" placeholder="Please type your Message" id="message" required data-error="Please write your message" required></textarea>
                      <div class="help-block with-errors"></div>
                    </div>

                    <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="hidden" id="date" value="<?php  echo date("Y-m-d_h-i-s");  ?>" name="date" class="form-control" readonly="true">
                  </div>
                </div>

                    <div class="submit-button text-center">
                      <button class="btn btn-common" id="btn_contact" name="btn_contact" type="submit">Send Message</button>
                      <div id="msgSubmit" class="h3 text-center hidden"></div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
      </div>
      </div>
    </header>

    <!-- Footer -->
<?php
include 'widgets/footer.php';
?>