<?php 
include('initial/init.php');
?>
<!DOCTYPE html>
<html>

<head>
  <title>User Dashboard</title>

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
  <link rel="stylesheet" type="text/css" href="css/popup.css">
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
                <a class="nav-link text-white" href=""><i class='fas fa-hand-peace'></i> Welcome,
                  <?php echo $_SESSION['email']; ?></a>
              </li>
            </ul>
          </div>

        </div>
      </nav>

      <div class="container-fluid" id="main-content">

        <div class="row justify-content-center">
          <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9">
          <h4 class="text-center text-uppercase text-secondary py-3"><strong>Latest Post</strong></h4>

          <!-- update user -->

          <?php
          if(isset($_POST['user_profile_update']) && !empty($_FILES['profile_picture']['name'])) {

             $db = new Database();
                        $name = $db->escape($_POST['name']);
                        $address = $db->escape($_POST['address']);
                        $phone = $db->escape($_POST['phone']);
                        $study_session = $db->escape($_POST['study_session']);
                        $study_program = $db->escape($_POST['study_program']);


                        $targetDir = "images/userProfile/";
                        $fileName = basename($_FILES['profile_picture']['name']);
                        $targetFilePath = $targetDir.$fileName;
                        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

                        $allowTypes = array('JPG','jpg','png','PNG','JPEG','jpeg');
                        
                        $user = new USER();

                        if(in_array($fileType, $allowTypes)){
                                if(move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFilePath)){
                                    $data = array(
                                        'name'=>$name,
                                        'address'=>$address,
                                        'phone'=>$phone,
                                        'study_session'=>$study_session,
                                        'study_program'=>$study_program,
                                        'image'=>$fileName 
                                    );

                                    if ($user->update_user("user",$data,$_SESSION["email"])==true) {
                                        echo "<div class='text-center alert alert-success alert-dismissible fade show' role='alert'>".
                                             "<strong>Update success!</strong>".
                                             "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                                             "<span aria-hidden='true'>&times;</span>".
                                             "</button>".
                                             "</div>";
                                    }else{
                                        echo "<div class='text-center alert alert-danger alert-dismissible fade show' role='alert'>".
                                             "<strong>Update failed!</strong>".
                                             "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                                             "<span aria-hidden='true'>&times;</span>".
                                             "</button>".
                                             "</div>";
                                    }
                                }
                            }
          }

          if(isset($_POST['user_password_update'])) {

             $db = new Database();
                $password = $db->escape($_POST['password']);
                $confirm_pass = $db->escape($_POST['confirm_pass']);

                if ($password==$confirm_pass) {
                     $user = new USER();

                        $data = array('password'=>$password);

                        if ($user->update_user("user",$data,$_SESSION["email"])==true) {

                        echo "<div class='text-center alert alert-success alert-dismissible fade show' role='alert'>".
                             "<strong>Update success!</strong>".
                             "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                             "<span aria-hidden='true'>&times;</span>".
                             "</button>".
                             "</div>";
                        }else{
                        echo "<div class='text-center alert alert-danger alert-dismissible fade show' role='alert'>".
                             "<strong>Update failed!</strong>".
                             "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                             "<span aria-hidden='true'>&times;</span>".
                             "</button>".
                             "</div>";
                        }
                }else{
                  echo "<div class='text-center alert alert-danger alert-dismissible fade show' role='alert'>".
                             "<strong>Update failed!</strong> Confirm password".
                             "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                             "<span aria-hidden='true'>&times;</span>".
                             "</button>".
                             "</div>";
                }                   
          }

          ?>

          <!-- end update -->

            <?php
                    $email = $_SESSION['email'];
                    $question = new Question();
                    $data = $question->last_question("question",$email);
                    if(!empty($data)){
                    foreach($data as $key => $value){ ?>
                    <p><strong><?php echo $value["user_question"]; ?></strong></p>
                    <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                      <?php
                        $reply = new Reply();
                        $info = $reply->get_answer_by_id("reply",$value["question_id"]);
                        if (!empty($info)) {
                        foreach($info as $key1 => $value1){ 
                      ?>

                        <h3 class="text-left bg-dark text-white px-2 py-2">Reply by <span class="text-capitalize text-danger"><?php echo $value1["u_name"]; ?></span> <small><span class="text-muted font-italic">on <?php echo $value1["date_and_time"]; ?></span></small></h3>
                          <div class="px-0 py-2">
                             <strong><span class="text-info">Answer: </span></strong><?php echo $value1["user_reply"]; ?>
                          </div>
                             <?php
                              }
                            }else{
                              echo "<div class='text-center alert alert-warning alert-dismissible fade show' role='alert'>".
                                   "<strong>No result!</strong> No answer added yet.".
                                   "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                                   "<span aria-hidden='true'>&times;</span>".
                                   "</button>".
                                   "</div>";
                            }
                            ?>
                   </div>
                   </div>
                  <?php
                    }
                  }else{
                    echo "<div class='text-center alert alert-warning alert-dismissible fade show' role='alert'>".
                         "<strong>No result!</strong> No question added.".
                         "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                         "<span aria-hidden='true'>&times;</span>".
                         "</button>".
                         "</div>";
                  }
                    ?>
          </div>

          <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 text-secondary">

            <?php
            $user = new User();
            $profile = $user->specific_user("user",$_SESSION["email"]);
            foreach ($profile as $key => $value) {

              $_SESSION["name"] = $value["name"];
                          $_SESSION["address"] = $value["address"];
                          $_SESSION["phone"] = $value["phone"];
                          $_SESSION["study_session"] = $value["study_session"];
                          $_SESSION["study_program"] = $value["study_program"];

            ?>
            <div class="profile" id="profile">
              <div class="row pb-4">
                <div class="col text-center">
                  <button type="button" onclick="document.getElementById('id01').style.display='block'"
                    class="btn btn-secondary btn-sm btn-block"><i class="fa fa-edit"></i> Update Profile</button>
                </div>
              </div>
              <?php $image_src = "images/userProfile/".$value['image']; ?>
              <img src="<?php echo $image_src; ?>" class="card-img-top" alt="user profile" height="200" width="120">
              <div class="text-left text-dark mx-2 my-1">
                <h5 class="pt-4"><i class="fa fa-user"></i> <?php echo $value["name"];?></h5>
                <h5 class=""><i class="fa fa-envelope"></i> <?php echo $value["email"];?></h5>
                <h5 class=""><i class="fa fa-phone"></i> +60<?php echo $value["phone"];?></h5>
                <h5 class=""><i class="fa fa-calendar"></i> <?php echo $value["study_session"];?></h5>
                <h5 class=""><i class="fa fa-home"></i> <?php echo $value["address"];?> </h5>
              </div>
            </div>

            <div class="row pt-4">
              <div class="col">
                <button type="button" onclick="document.getElementById('id02').style.display='block'"
                    class="btn btn-secondary btn-sm btn-block mb-2"><i class="fas fa-cogs"></i> Change
                  Password</button>
              </div>
            </div>
            <?php
                }
            ?>

          </div>

        </div>

      </div>
      <!--  update section -->

      <div id="id01" class="modal">

        <form class="modal-content animate" action="user.dashboard.php" method="POST" enctype="multipart/form-data">
          <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close"
              title="Close Modal">&times;</span>
          </div>

          <div class="form_container">
            <label for="name"><b class="text-info">Name:</b></label>
            <input type="text" value = "<?php if(isset($_SESSION['name'])) echo $_SESSION['name']; ?>" placeholder="Enter name" name="name" required>

            <label for="address"><b class="text-info">Address:</b></label>
            <input type="text" value = "<?php if(isset($_SESSION['address'])) echo $_SESSION['address']; ?>" placeholder="Enter address" name="address" required>

            <label for="phone"><b class="text-info">Phone:</b></label>
            <input type="text" value = "<?php if(isset($_SESSION['phone'])) echo $_SESSION['phone']; ?>" placeholder="Enter phone number" name="phone" required>

            <label for="study_session"><b class="text-info">Study Session:</b></label>
            <input type="text" value = "<?php if(isset($_SESSION['study_session'])) echo $_SESSION['study_session']; ?>" placeholder="Enter study session" name="study_session" required>

            <label for="program"><b class="text-info">Program: </b></label>
            <select name="study_program" id="program" required>
              <option value="SE" selected>SE</option>
              <option value="MC">MC</option>
              <option value="NC">NC</option>
              <option value="CS">CS</option>
              <option value="IS">IS</option>
            </select><br/><br/>

            <label for="profile_picture"><b class="text-info">Profile Picture:</b></label>
            <input type="file" name="profile_picture" required>

            <input type="submit" name="user_profile_update" class="btn btn-info btn-block mt-2" value="Update Profile">

          </div>

          <div class="form_container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'"
              class="btn btn-danger">Cancel</button>
          </div>
        </form>
      </div>

      <div id="id02" class="modal">

        <form class="modal-content animate" action="user.dashboard.php" method="POST">
          <div class="imgcontainer">
            <span onclick="document.getElementById('id02').style.display='none'" class="close"
              title="Close Modal">&times;</span>
          </div>

          <div class="form_container">

            <label for="password"><b class="text-info">Password:</b></label>
            <input type="password" placeholder="Enter password" name="password" required>

            <label for="confirm_pass"><b class="text-info">Confirm Pass:</b></label>
            <input type="password" placeholder="Confirm password" name="confirm_pass" required>

            <input type="submit" name="user_password_update" class="btn btn-info btn-block mt-2" value="Change Password">

          </div>

          <div class="form_container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id02').style.display='none'"
              class="btn btn-danger">Cancel</button>
          </div>
        </form>
      </div>
      <!--  update section -->

      <?php include('includes/footer.php'); ?>
    </div>
  </div>

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

  <script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>

  <script>
    // Get the modal
    var modal2 = document.getElementById('id02');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event2) {
      if (event2.target == modal2) {
        modal2.style.display = "none";
      }
    }
  </script>

</body>

</html>