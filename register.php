<!DOCTYPE html>
<html lang="en">

<head>
    <!-- website title -->
    <title>easySEL Registration</title>

    <!-- meta data of easySEL -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="UNIMAS easySELL is e-learning platform which is builded as requirements for completing graduation of UNIMAS.">
    <meta name="keywords"
        content="easySELL, UNIMAS SOFTWARE ENGINEERING LEARNING MONITORING SYSTEM, easysel, unimas software engineering learning monitoring system">
    <meta name="author" content="Mohammad Imran Hasan Tuhin ##59412##">
    <!-- font awesome icon link -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- bootstrap CSS CDN -->
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
    <!-- developer css link -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <!-- include header file -->
    <?php include "includes/header.php";?>
    <div class="container-fluid p-5">
        <div class="row">
            <!-- registration of user -->
            <div class="col-sm-5 col-md-12 col-lg-5 col-xl-5 px-2 text-secondary">
<?php
include 'initial/init.php';

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
                        "<strong>Registration success!</strong> Click here for." . "<a href='user.login.php' class='alert-link'>login</a>" .
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
                <form action="register.php" name="RegForm" onsubmit="return validate()" method="POST"
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
                        <input type="submit" name="submit" class="btn btn-info btn-block" value="SIGN UP">
                </form>
            </div>
            <!-- end of registration form -->

            <div class="col-sm-7 col-md-12 col-lg-7 col-xl-7 pt-2">
                <h4 class="text-center text-info font-weight-bold px-5" id="login-link">
                    Already member, Please follow the link
                </h4>
                <div class="container py-2">
                    <div class="row">
                        <div class="col text-center">
                            <a class="btn btn-outline-info text-uppercase" href="user.login.php">Click for sign in</a>
                        </div>
                    </div>
                </div>
                <img class="mx-auto d-block my-4" src="images/bg/register1.png" alt="student pic" height="240px"
                    width="70%">
                <h1 class="text-center" id="registration-title">UNIMAS SOFTWARE ENGINEERING LEARNING MONITORING SYSTEM
                </h1>
            </div>
        </div>
    </div>
    <!-- jquery and js CDN -->
    <script type="text/javascript" src="js/validation.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

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

    <?php include "includes/footer.php";?>
</body>

</html>