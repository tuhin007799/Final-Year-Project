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
    <style type="text/css">
        #pass{
            padding-top: 70px;
            padding-bottom: 120px;
        }
    </style>
</head>

<body>
    <!-- include header file -->
    <?php include "includes/header.php";?>
    <div class="container-fluid p-5">
        <div class="row justify-content-center">
            <div class="col-sm-4 col-md-6 col-lg-4 col-xl-4 px-2 text-secondary" id="pass">
<?php
include 'initial/init.php';

if (isset($_POST['submit'])) {

    $db = new Database();
    $email = $db->escape($_POST['email']);
    $user = new USER();
    $data = $user->validate_user('user', $email);
    if ($data == "register") {
        function generate_password()
        {
            $today = date('dmy');
            $rand = sprintf("%04d", rand(0, 999));
            $order_number = "easy" . $today . $rand;
            return $order_number;
        }
        $password = generate_password();
        $user = new User();
        $data = array("password" => $password);
        if ($user->update_user("user", $data, $email) == true) {
            $to = $email;
            $subject = "easySEL PASSWORD UPDATE";
            $message = "Dear User,
                                 Your new password given below
                                Password: " . $password;
            $headers = "From: mohammadimran007799@gmail.com";
            if (mail($to, $subject, $message, $headers)) {
                echo "<div class='text-center alert alert-success alert-dismissible fade show' role='alert'>" .
                    "<strong>E-mail Sent!</strong> Please check your mail. Click for " . "<a href='user.login.php' class='alert-link'>login.</a>" .
                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" .
                    "<span aria-hidden='true'>&times;</span>" .
                    "</button>" .
                    "</div>";
            } else {
                echo "<div class='text-center alert alert-danger alert-dismissible fade show' role='alert'>" .
                    "<strong>Update Failed!</strong> Contact with easySEL" .
                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" .
                    "<span aria-hidden='true'>&times;</span>" .
                    "</button>" .
                    "</div>";
            }
        }
    } else {
        echo "<div class='text-center alert alert-danger alert-dismissible fade show' role='alert'>" .
            "<strong>No user!</strong>Click here for " . "<a href='register.php' class='alert-link'>register.</a>" .
            "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" .
            "<span aria-hidden='true'>&times;</span>" .
            "</button>" .
            "</div>";
    }
}
?>
                <form action="user.forgot.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="email"><strong>Enter E-Mail:</strong></label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter E-Mail.."
                            required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <input type="submit" name="submit" class="btn btn-info" value="SEND EMAIL">
                        </div>
                    </div>
                </form>
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

    <script type="text/javascript">
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>

    <?php include "includes/footer.php";?>
</body>

</html>