<?php
include 'initial/init.php';
?>

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

            <h4 class="text-center text-secondary text-uppercase my-2"><strong>Add easySEL users</strong></h4>

            <div class="container-fluid py-2 px-1" id="user-view">

                <div class="row justify-content-center my-3 mx-5">
                    <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 text-secondary">

<?php

if (isset($_POST['submit']) && !empty($_FILES['profile_picture']['name'])) {

    $db = new Database();

    $email = $db->escape($_POST['email']);
    $password = $db->escape($_POST['password']);
    $name = $db->escape($_POST['name']);
    $address = $db->escape($_POST['address']);
    $phone = $db->escape($_POST['phone']);
    $study_session = $db->escape($_POST['study_session']);
    $study_program = $db->escape($_POST['study_program']);
    $phone = "+60" . $phone;

    // $md = new Validation();
    // $password = $db->escape($md->make_hash($pass));

    $targetDir = "images/userProfile/";
    $fileName = basename($_FILES['profile_picture']['name']);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $allowTypes = array('JPG', 'jpg', 'png', 'PNG', 'JPEG', 'jpeg');

    $user = new USER();
    $data = $user->validate_user('user', $email);
    if ($data == false) {
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFilePath)) {
                $data = array(
                    'email' => $email,
                    'password' => $password,
                    'name' => $name,
                    'address' => $address,
                    'phone' => $phone,
                    'study_session' => $study_session,
                    'study_program' => $study_program,
                    'image' => $fileName,
                );

                if ($user->registration('user', $data) == true) {
                    echo "<div class='text-center alert alert-success alert-dismissible fade show' role='alert'>" .
                        "<strong>Add success!</strong>" . "" .
                        "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" .
                        "<span aria-hidden='true'>&times;</span>" .
                        "</button>" .
                        "</div>";
                } else {
                    echo "<div class='text-center alert alert-danger alert-dismissible fade show' role='alert'>" .
                        "<strong>Failed!</strong> your registration has been failed." .
                        "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" .
                        "<span aria-hidden='true'>&times;</span>" .
                        "</button>" .
                        "</div>";
                }
            }
        }
    } else {
        echo "<div class='text-center alert alert-danger alert-dismissible fade show' role='alert'>" .
            "<strong>Already register!</strong> Click here for." . "<a href='user.login.php' class='alert-link'>login</a>" .
            "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" .
            "<span aria-hidden='true'>&times;</span>" .
            "</button>" .
            "</div>";
    }
}
?>
                <form action="add.user.php" name="RegForm" onsubmit="return validate()" method="POST"
                    enctype="multipart/form-data" class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                            <label for="inputEmail"><strong>Email:</strong></label>
                            <input type="email" name="email" class="form-control" id="inputEmail"
                                placeholder="abc@xyz.com" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group col-sm-6 col-md-6 col-lg-6">
                            <label for="inputPassword"><strong>Password:</strong></label>
                            <input type="password" name="password" class="form-control" id="inputPassword"
                                placeholder="Password..." required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName"><strong>Name:</strong></label>
                        <input type="text" name="name" class="form-control" id="inputName" placeholder="Full Name.."
                            required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress"><strong>Address:</strong></label>
                        <input type="text" name="address" class="form-control" id="inputAddress"
                            placeholder="55, Lorong Uni-Graden 10, 94300, Kota Samarahan" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="inputPhone"><strong>Phone:</strong></label>
                            <input type="text" name="phone" class="form-control" id="inputPhone"
                                placeholder="1124104432" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputSession"><strong>Study Session:</strong></label>
                            <input type="text" name="study_session" class="form-control" id="inputSession"
                                placeholder="2016/2017" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputProgram"><strong>Program:</strong></label>
                            <select name="study_program" id="inputProgram" class="form-control">
                                <option value="SE" selected>SE</option>
                                <option value="MC">MC</option>
                                <option value="NC">NC</option>
                                <option value="CS">CS</option>
                                <option value="IS">IS</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputImage"><strong>Profile pricture:</strong></label>
                        <input type="file" name="profile_picture" class="form-control-file" id="inputImage" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please select your profile picture. Note: size < 20mb</div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck" required="required">
                                <label class="form-check-label" for="gridCheck">
                                    <strong>I am agree with all terms and conditions</strong>
                                </label>
                            </div>
                        </div>
                        <input type="submit" name="submit" class="btn btn-info btn-block" value="ADD NEW">
                </form>

                    </div>
                </div>
            </div>

            <?php include 'includes/footer.php';?>
        </div>
    </div>

     <script type="text/javascript" src="js/validation.js"></script>

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
        $(document).ready(function () {
            $("#myInput").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
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

</body>

</html>