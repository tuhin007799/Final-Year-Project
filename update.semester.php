<?php 
include('initial/init.php');
if(isset($_GET['sem_id'])){
    $_SESSION["sem_id"] = $_GET["sem_id"];

}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Semesters</title>

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
                                    <?php echo $_SESSION['email']; ?></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </nav>
            <h4 class="text-center text-secondary text-uppercase py-2"><strong>semesters</strong></h4>

            <div class="container-fluid py-1 px-1">

                <!-- <div class="row justify-content-end mx-5">
                    <a class="btn btn-outline-secondary btn-sm" href="add.semester.php"><i class="fas fa-plus"></i> ADD SEMESTER</a>
                </div> -->

                <div class="row justify-content-center">

                    <?php 
                    $sem = new Semester();
                    $data = $sem->select_semester_data('semester',$_SESSION["sem_id"]);
                    if(empty($data)){
                        echo "<div class='text-center alert alert-warning alert-dismissible fade show' role='alert'>".
                              "<strong>No data!</strong>"." No semester added.".
                              "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                              "<span aria-hidden='true'>&times;</span>".
                              "</button>".
                              "</div>";
                    }else{ 
                    foreach($data as $key => $value){
                        $_SESSION["semester_title"]= $value["semester_title"];
                        $_SESSION["course_quantity"]=$value["course_quantity"] ;
                        $_SESSION["semester_description"]=$value["semester_description"] ;
                        $_SESSION["semester_image"]=$value["semester_image"];
                       }
                    }
                    ?>


                    <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">

                         <?php 
                  
       if(isset($_POST['submit']) && !empty($_FILES['semester_image']['name'])) {
       $semester_title = $_POST['semester_title'];
       $course_quantity = $_POST['course_quantity'];
       $semester_description = $_POST['semester_description'];

       $targetDir = "images/semesters/";
       $fileName = basename($_FILES['semester_image']['name']);
       $targetFilePath = $targetDir.$fileName;
       $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

       $allowTypes = array('JPG','jpg','png','PNG','JPEG','jpeg');

       if(is_numeric($course_quantity)){

         if(!empty($semester_description)){

           if(in_array($fileType, $allowTypes)){

                $data = array(
                      'semester_title'=>$semester_title,
                      'course_quantity'=>$course_quantity,
                      'semester_description'=>$semester_description,
                      'semester_image'=>$fileName,
                      'made_by'=>$_SESSION["email"]
                    );
                $sem = new Semester();

               if ($sem->update_semester("semester",$data,$_SESSION["sem_id"])==true && move_uploaded_file($_FILES["semester_image"]["tmp_name"], $targetFilePath)) {
                    echo "<div class='text-center alert alert-success alert-dismissible fade show' role='alert'>".
                         "<strong>Success!</strong>"." Semester update success.".
                         "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                         "<span aria-hidden='true'>&times;</span>".
                         "</button>".
                         "</div>";
               }else{
                    echo "<div class='text-center alert alert-danger alert-dismissible fade show' role='alert'>".
                         "<strong>Failed!</strong>"." Semester add failed.".
                         "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                         "<span aria-hidden='true'>&times;</span>".
                         "</button>".
                         "</div>";
                }

          }else{
              echo "<div class='text-center alert alert-warning alert-dismissible fade show' role='alert'>".
                   "<strong>Warning!</strong>"." Please enter a valid picture.".
                   "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                   "<span aria-hidden='true'>&times;</span>".
                   "</button>".
                   "</div>";
              }

        }else{
            echo "<div class='text-center alert alert-warning alert-dismissible fade show' role='alert'>".
            "<strong>Warning!</strong>"." Please enter semester description.".
            "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
            "<span aria-hidden='true'>&times;</span>".
            "</button>".
            "</div>";
            }

      }else{
            echo "<div class='text-center alert alert-warning alert-dismissible fade show' role='alert'>".
                 "<strong>Warning!</strong>"." Course quantity is numeric.".
                 "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                 "<span aria-hidden='true'>&times;</span>".
                 "</button>".
                 "</div>";
      }
    }

  ?>

                        <form action="update.semester.php" method="POST" enctype="multipart/form-data"
                            class="needs-validation" novalidate>
                            <div class="form-group">
                                <label for="semester_title"><strong>Semester Title:</strong></label>
                                <input type="text" class="form-control"
                                    value="<?php if(isset($_SESSION['semester_title'])) echo $_SESSION['semester_title']; ?>"
                                    id="semester_title" placeholder="semester title" name="semester_title" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="form-group">
                                <label for="course_quantity"><strong>Course Quantity:</strong></label>
                                <input type="text" class="form-control"
                                    value="<?php if(isset($_SESSION['course_quantity'])) echo $_SESSION['course_quantity']; ?>"
                                    id="course_quantity" placeholder="course quantity" name="course_quantity" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="form-group">
                                <label for="semester_description"><strong>Semester Description:</strong></label>
                                <textarea type="text" class="form-control"
                                    id="semester_description" name="semester_description" required></textarea>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="form-group">
                                <label for="semester_image"><strong>Semester image:</strong></label>
                                <input type="file" class="form-control-file" id="semester_image"
                                    placeholder="semester profile image" name="semester_image" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>

                            <div class="row">
                                <div class="col text-center">
                                    <button type="submit" name="submit" class="btn btn-info"><i class="fas fa-edit"></i>
                                        update Semester</button>
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
        CKEDITOR.replace('semester_description', {
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
</body>

</html>