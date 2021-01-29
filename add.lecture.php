<?php include 'initial/init.php';?>
<!DOCTYPE html>
<html>

<head>
  <title>Admin Dashboard</title>

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
  <link rel="stylesheet" type="text/css" href="css/semester.css">
  <link rel="stylesheet" type="text/css" href="css/admin.css">

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
        <li><a href="admin.add.php"><i class='fas fa-plus'></i> Add New</a></li>
        <li><a href="admin.dashboard.php"><i class="fas fa-home"></i> My Home</a></li>
        <li><a href="admin.profile.php"><i class="fas fa-user-tie"></i> My Profile</a></li>
        <li><a href="admin.change.password.php"><i class="fas fa-cogs"></i> Password</a></li>
        <li><a href="manage.user.php"><i class='fas fa-user-graduate'></i> Students</a></li>
        <li><a href="admin.sem.view.php"><i class='fas fa-chalkboard-teacher'></i> Semesters</a></li>
        <li><a href="admin.logout.php"><i class="fas fa-power-off"></i> Sign Out</a></li>
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
                <a class="nav-link text-white" href=""><i class='fas fa-hand-peace'></i> Welcome,
<?php
if (!isset($_SESSION["email"])) {
    header("Location:index.php");
} else {
    echo $_SESSION['email'];
}
?>
                  </a>
              </li>
            </ul>
          </div>

        </div>
      </nav>

      <h4 class="text-center text-secondary py-2 text-uppercase"><strong>Add lecture</strong></h4>

      <div class="container my-2">
        <div class="row justify-content-center">
          <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 text-secondary">


<?php

if (isset($_POST['submit']) && !empty($_FILES['lecture_image']['name'])) {
    $lecture_number = $_POST["lecture_number"];
    $lecture_title = $_POST["lecture_title"];
    $lecture_description = $_POST["lecture_description"];

    $targetDir = "images/lectures/";
    $fileName = basename($_FILES['lecture_image']['name']);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $allowTypes = array('JPG', 'jpg', 'png', 'PNG', 'JPEG', 'jpeg');

    if (is_numeric($lecture_number)) {

        if (!empty($lecture_description)) {

            if (in_array($fileType, $allowTypes)) {

                $data = array(
                    'lecture_number' => $lecture_number,
                    'lecture_title' => $lecture_title,
                    'lecture_description' => $lecture_description,
                    'lecture_image' => $fileName,
                    'course_id' => $_SESSION["course_id"],
                    'sem_id' => $_SESSION["sem_id"],
                    'made_by' => $_SESSION["email"],
                );
                $add_lecture = new Lecture();

                if ($add_lecture->add_lecture("lecture", $data) == true && move_uploaded_file($_FILES["lecture_image"]["tmp_name"], $targetFilePath)) {
                    echo "<div class='text-center alert alert-success alert-dismissible fade show' role='alert'>" .
                        "<strong>Success!</strong>" . " Add success." .
                        "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" .
                        "<span aria-hidden='true'>&times;</span>" .
                        "</button>" .
                        "</div>";
                } else {
                    echo "<div class='text-center alert alert-danger alert-dismissible fade show' role='alert'>" .
                        "<strong>Failed!</strong>" . " Add failed." .
                        "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" .
                        "<span aria-hidden='true'>&times;</span>" .
                        "</button>" .
                        "</div>";
                }

            } else {
                echo "<div class='text-center alert alert-warning alert-dismissible fade show' role='alert'>" .
                    "<strong>Warning!</strong>" . " Please enter a valid picture." .
                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" .
                    "<span aria-hidden='true'>&times;</span>" .
                    "</button>" .
                    "</div>";
            }

        } else {
            echo "<div class='text-center alert alert-warning alert-dismissible fade show' role='alert'>" .
                "<strong>Warning!</strong>" . " Please enter description." .
                "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" .
                "<span aria-hidden='true'>&times;</span>" .
                "</button>" .
                "</div>";
        }

    } else {
        echo "<div class='text-center alert alert-warning alert-dismissible fade show' role='alert'>" .
            "<strong>Warning!</strong>" . " Quantity is numeric." .
            "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" .
            "<span aria-hidden='true'>&times;</span>" .
            "</button>" .
            "</div>";
    }
}

?>


        <form action="add.lecture.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
          <div class="form-group">
            <label for="lecture_number"><strong>Lecture Number:</strong></label>
            <input type="text" class="form-control" id="lecture_number" placeholder="Enter lecture number"
              name="lecture_number" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="form-group">
            <label for="lecture_title"><strong>Lecture Title:</strong></label>
            <input type="text" class="form-control" id="lecture_title" placeholder="Enter lecture title"
              name="lecture_title" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="form-group">
            <label for="lecture_description"><strong>Lecture Description:</strong></label>
            <textarea type="text" class="form-control" id="lecture_description" name="lecture_description"
              required></textarea>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="form-group">
            <label for="lecture_image"><strong>Lecture Image:</strong></label>
            <input type="file" class="form-control-file" id="lecture_image" placeholder="lecture profile image"
              name="lecture_image" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
          <div class="form-group form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" name="remember" required> <strong>I am agree with all
                terms and conditions</strong>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Check this checkbox to continue.</div>
            </label>
          </div>

          <div class="row">
            <div class="col text-center">
              <button type="submit" name="submit" class="btn btn-info"><i class="fas fa-plus"></i> Add Lecture</button>
            </div>
          </div>
        </form>

        </div>

       </div>

      </div>

      <!--  <script type="text/javascript" src="js/semester.js"></script> -->
      <script>
        CKEDITOR.replace('lecture_description', {
          filebrowserUploadUrl: "upload.php",
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

      <script type="text/javascript">
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
      </script>

      <?php include 'includes/footer.php';?>
    </div>
  </div>

</body>

</html>