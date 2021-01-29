<?php
include('initial/init.php'); 
if(isset($_GET['lecture_id'])){
    $_SESSION["lecture_id"] = $_GET['lecture_id'];
} 
?>
<!DOCTYPE html>
<html>

<head>
    <title>Lecture</title>

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

            <h4 class="text-center text-secondary text-uppercase mt-2"><strong>Topics</strong></h4>

            <div class="container-fluid py-1 px-1">

                <div class="row justify-content-end mx-5 my-2">
                    <a class="btn btn-outline-secondary btn-sm" href="add.topic.php"><i class="fas fa-plus"></i> ADD TOPIC</a>
                </div>

                <div class="row justify-content-center">
                      <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                          
                           <?php

                    if(isset($_GET['topic_id'])){
                         $topic_id = $_GET["topic_id"];

                         $topic = new Topic();
                        if ($topic->delete_topic("topic",$topic_id)==true) {

                            echo "<div class='text-center alert alert-success alert-dismissible fade show' role='alert'>".
                             "<strong> Delete success!</strong>.".
                             "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                             "<span aria-hidden='true'>&times;</span>".
                             "</button>".
                             "</div>";

                        }else{
                            echo "<div class='text-center alert alert-warning alert-dismissible fade show' role='alert'>".
                             "<strong> Delete failed!</strong>.".
                             "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                             "<span aria-hidden='true'>&times;</span>".
                             "</button>".
                             "</div>";
                        }
                        }


                    ?>
                    
                      </div>
                  </div>


                <div class="row justify-content-center" id="course">
                    <div class="col-sm-11 col-md-11 col-lg-11 col-xl-11">

                        <?php 
                        $topic = new Topic();
                        $data = $topic->select_topic_by_lecture('topic',$_SESSION["lecture_id"]);
                        if(empty($data)){
                            echo "<div class='text-center alert alert-warning alert-dismissible fade show' role='alert'>".
                              "<strong>No data!</strong>"." No topic added.".
                              "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                              "<span aria-hidden='true'>&times;</span>".
                              "</button>".
                              "</div>";
                        }else{ 
                        foreach($data as $key => $value){ 
                        ?>

                        <a class="btn btn-sm btn-outline-danger" href="admin.topic.view.php?topic_id=<?php echo $value['topic_id'];?>"><i class="fas fa-trash-alt"></i> Delete</a>
                        <a class="btn btn-sm btn-outline-info my-2" href="update.topic.php?topic_id=<?php echo $value['topic_id'];?>"><i class='fas fa-edit'></i> Edit</a> 

                        <h4 class="text-center text-info bg-dark py-2">
                            <?php
                                echo $value["topic_title"];
                            ?>
                        </h4>
                        <?php
                        $video_src = "videos/".$value['topic_video'];
                        ?>
                            <div class="row">
                                <div class="col text-center">
                                    <video width="80%" height="auto" controls>
                                    <source src="" type="video/mp4">
                                    <source src="<?php echo $video_src; ?>" type="video/ogg">
                                    Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>
                            <p>
                            <?php
                                if (!empty($value["topic_description"])) {
                                    echo $value["topic_description"];
                                }else{
                                    echo "<div class='text-center alert alert-warning alert-dismissible fade show' role='alert'>".
                                         "<strong>No description!</strong>"."".
                                         "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                                         "<span aria-hidden='true'>&times;</span>".
                                         "</button>".
                                         "</div>";
                                }
                            ?>
                            </p>
                            <p>
                            <?php
                               if (!empty($value["topic_example"])) {
                                    echo $value["topic_example"];
                               }else{
                                    echo "<div class='text-center alert alert-warning alert-dismissible fade show' role='alert'>".
                                         "<strong>No example!</strong>"."".
                                         "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                                         "<span aria-hidden='true'>&times;</span>".
                                         "</button>".
                                         "</div>";
                                }
                            ?>
                            </p>
                   
                        <?php
                         } 
                        } 
                        ?>
                    </div>
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

    <script type="text/javascript">
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>

</html>