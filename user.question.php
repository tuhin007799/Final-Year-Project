<?php 
include('initial/init.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start(); 
    }
?>
<!DOCTYPE html>
<html>

<head>
  <title>Post User Question</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description"
    content="UNIMAS easySELL is e-learning platform which is builded as requirements for completing graduation of UNIMAS.">
  <meta name="keywords"
    content="easySELL, UNIMAS SOFTWARE ENGINEERING LEARNING MONITORING SYSTEM, easysel, unimas software engineering learning monitoring system">
  <meta name="author" content="Mohammad Imran Hasan Tuhin ##59412##">

  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="css/dashboard.css">
  <link rel="stylesheet" type="text/css" href="css/user.css">
  <link rel="stylesheet" type="text/css" href="css/semester.css">
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

  <!-- Font Awesome JS -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
    integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
    crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
    integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
    crossorigin="anonymous"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>

</head>

<body>

  <div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <img src="images/logo/logo.easysel.png" alt="easySEL logo" width="160" height="30">
      </div>

      <ul class="list-unstyled components">
          <li><a href="user.dashboard.php"><i class="fas fa-home"></i> My Home</a></li>
          <li><a href="user.semester.php"><i class="fas fa-book"></i> My Courses</a></li>
          <li><a href="user.question.solution.php"><i class="fa fa-user"></i> My Solution</a></li>
          <li><a href="user.question.php"><i class="fas fa-question-circle"></i> My Question</a></li>
          <li><a href="user.all.question.php"><i class="fas fa-hands-helping"></i> Co-Operation</a></li>
          <li><a href="user.logout.php"><i class="fas fa-power-off"></i> Sign Out</a></li>
      </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">

      <nav class="navbar navbar-expand-sm navbar-dark py-1" id="easySELNavigation">
        <div class="container-fluid">

          <button type="button" id="sidebarCollapse" class="btn btn-danger">
            <i class='far fa-hand-point-left' style='font-size:20px'></i>
            <span> MENU</span>
          </button>

          <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
          </button>

          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link"><i class="fas fa-phone"></i> Emergency: +601124104432</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href=""><i class='fas fa-hand-peace'></i> Welcome, <?php echo $_SESSION['email']; ?></a>
              </li>
            </ul>
          </div>

        </div>
      </nav>

      <div class="container-fluid my-3">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                <h4 class="text-secondary text-center"><strong>UPLOAD YOUR QUESTION</strong></h4>
                <?php
                $db = new Database();
                $conn = $db->get_connection();

                date_default_timezone_set('Asia/Kuching');

                if(isset($_POST['ask'])){
                    $name = $_POST['name']; 
                    $question = $_POST['question'];
                    $email = $_SESSION['email'];
                    $date = date("Y/m/d H:i:s"); 
                    $sql = "INSERT INTO question (u_name,user_question,post_by,date_and_time) VALUES ('$name','$question','$email','$date')";
                    if ($conn->query($sql)) {
                      echo "<div class='text-center alert alert-success alert-dismissible fade show' role='alert'>".
                           "<strong>Added success!</strong> question uploaded.".
                           "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                           "<span aria-hidden='true'>&times;</span>".
                           "</button>".
                           "</div>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->connect_error;
                    }
                }
                ?>
                    <form action="user.question.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        <div class="form-group">
                            <label for="name">
                            <strong><i class="fas fa-user"></i> Enter Name:</strong>
                             </label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name.." required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <label for="question">
                            <strong><i class="fas fa-question-circle"></i> Enter Question:</strong>
                             </label>
                            <textarea type="text" class="form-control" id="question" name="question" required></textarea>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                            <button type="submit" name="ask" class="btn btn-secondary"><i class="fas fa-edit"></i><strong>Post your question</strong></button>
                            </div>
                        </div>
                    </form>
                </div>    
            </div>
      </div>

      <?php include('includes/footer.php'); ?>
    </div>
  </div>

  <script>
    CKEDITOR.replace('question',{
      filebrowserUploadUrl:"upload.php",
      filebrowserUploadMethod: "form"
    });
  </script>

  <!-- jQuery CDN - Slim version (=without AJAX) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <!-- Popper.JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
    integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
    crossorigin="anonymous"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
    integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
    crossorigin="anonymous"></script>
  <!-- jQuery Custom Scroller CDN -->
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      $("#sidebar").mCustomScrollbar({
        theme: "minimal"
      });

      $('#sidebarCollapse').on('click', function () {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
      });
    });
  </script>

<script>
        // Disable form submissions if there are invalid fields
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Get the forms we want to add validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

</body>

</html>