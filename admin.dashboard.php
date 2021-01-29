<?php include('initial/init.php'); ?>

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
                                <a class="nav-link text-white" href=""><i class='fas fa-hand-peace'></i> Welcome, <?php echo $_SESSION['email']; ?></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </nav>

             <div class="container-fluid py-1 px-1">

                <div class="row justify-content-center my-5">

                    <div class="col-sm-2 col-md-2 col-lg-2 text-center mx-4 my-2 px-2 py-4" id="student">
                       <h1 class="text-dangr"><i class='fas fa-user-graduate' style="font-size: 48px;"></i></h1>
                       <h5><strong>Total student</strong></h5>
                       <?php 
                       $student = new User();
                       $student_data = $student->get_all_user('user');
                       if (!empty($student_data)) {
                         echo count($student_data); 
                       }else{
                        echo "<div class='text-center alert alert-danger alert-dismissible fade show' role='alert'>".
                             "<strong>No student!</strong>.".
                             "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                             "<span aria-hidden='true'>&times;</span>".
                             "</button>".
                             "</div>";
                       } 
                       ?> 
                    </div>

                    <div class="col-sm-2 col-md-2 col-lg-2 text-center mx-4 my-2 px-2 py-4" id="course-bg">
                      <h1 class="text-dangr"><i class="fas fa-book" style="font-size: 48px;"></i></h1>
                       <h5><strong>Total course</strong></h5>
                       <?php
                       $course = new Course();
                       $course_data = $course->select_course("course");
                        if (!empty($course_data)) {
                            $number_of_course = count($course_data);
                            echo $number_of_course; 
                       }else{
                          echo "<div class='text-center alert alert-danger alert-dismissible fade show' role='alert'>".
                          "<strong>No result!</strong>.".
                          "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                          "<span aria-hidden='true'>&times;</span>".
                          "</button>".
                          "</div>";
                       }  
                        
                       ?> 
                    </div>

                    <div class="col-sm-2 col-md-2 col-lg-2 text-center mx-4 my-2 px-2 py-4" id="lecture">
                      <h1 class="text-dangr"><i class="fas fa-book-open" style="font-size: 48px;"></i></h1>
                       <h5><strong>Total lecture</strong></h5>
                       <?php
                       $lecture = new Lecture();
                       $lecture_data = $lecture->select_lecture("lecture");
                       if (!empty($lecture_data)) {
                         echo count($lecture_data);
                       }
                       else{
                          echo "<div class='text-center alert alert-danger alert-dismissible fade show' role='alert'>".
                          "<strong>No result!</strong>.".
                          "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                          "<span aria-hidden='true'>&times;</span>".
                          "</button>".
                          "</div>";
                       }  
                       ?> 
                    </div>

                    <div class="col-sm-2 col-md-2 col-lg-2 text-center mx-4 my-2 px-2 py-4" id="topic">
                      <h1 class="text-dangr"><i class="fas fa-sticky-note" style="font-size: 48px;"></i></h1>
                       <h5><strong>Total topic</strong></h5>
                       <?php
                       $topic = new Topic();
                       $topic_data = $topic->select_topic("topic");
                      if (!empty($topic_data)) {
                          echo count($topic_data);
                       }else{
                          echo "<div class='text-center alert alert-danger alert-dismissible fade show' role='alert'>".
                          "<strong>No result!</strong>.".
                          "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                          "<span aria-hidden='true'>&times;</span>".
                          "</button>".
                          "</div>";
                       } 
                       ?> 
                    </div>

                </div>

                <div class="row justify-content-center">

                    <?php
                    $semester = new Semester();
                    $data = $semester->select_semester('semester');

                    if(empty($data)){
                        echo "<div class='text-center alert alert-warning alert-dismissible fade show' role='alert'>".
                              "<strong>No data!</strong>"." empty.".
                              "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                              "<span aria-hidden='true'>&times;</span>".
                              "</button>".
                              "</div>";
                    }else{ 
                    foreach($data as $key => $value){ 
                    ?> 

                    <div class="col-sm-3 col-md-3 col-lg-3 text-justify mx-3 my-2 px-0" id="sem">
                          <span id="video_btn"><i class='far fa-play-circle' style='font-size:50px;color:#DC143C'></i></span>
                            <?php $image_src = "images/semesters/".$value['semester_image']; ?>
                            <img class="mx-0 px-0" src="<?php echo $image_src; ?>" alt="sem image" height="150" width="100%">
                            <h5 class="text-capitalize text-secondary text-center py-2 font-weight-bold"><i class='fas fa-chalkboard-teacher'></i> <?php echo $value['semester_title']; ?></h5>
                            <h6 class="text-center px-2">
                               <?php
                                $total_course = $semester->select_semester_data("course",$value["sem_id"]);
                                if (empty($total_course)) {
                                  echo "<div class='text-center alert alert-warning alert-dismissible fade show' role='alert'>".
                                       "<strong>No course!</strong>".
                                       "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                                       "<span aria-hidden='true'>&times;</span>".
                                       "</button>".
                                       "</div>";
                                }else{
                                  echo "<div class='text-secondary text-capitalize font-weight-bold'>"."<i class='fas fa-book-open'></i>"." Total ".count($total_course)." courses"."</div>";

                                }

                                ?>
                            </h6>

                             <h6 class="text-center px-2">
                               <?php
                                $total_lecture = $semester->select_semester_data("lecture",$value["sem_id"]);
                                if (empty($total_lecture)) {
                                  echo "<div class='text-center alert alert-warning alert-dismissible fade show' role='alert'>".
                                       "<strong>No lecture!</strong>".
                                       "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                                       "<span aria-hidden='true'>&times;</span>".
                                       "</button>".
                                       "</div>";
                                }else{
                                  echo "<div class='text-secondary text-capitalize font-weight-bold'>"."<i class='fas fa-book'></i>"." Total ".count($total_lecture)." lecture"."</div>";

                                }

                                ?>
                            </h6>

                            <div class="px-3">
                                <?php echo $value['semester_description']; ?>
                            </div>
                        <!-- </a> -->
                    </div>
                    <?php
                    } 
                    } 
                    ?>

                </div>
            </div>
            
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
</body>

</html>