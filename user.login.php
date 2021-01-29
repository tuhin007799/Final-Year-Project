<!DOCTYPE html>
<html lang="en">

<head>
    <!-- website title -->
    <title>easySEL login</title>

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
    <!-- developer css link -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <?php include "includes/header.php";?>
    <section class="container-fluid login">
        <div class="row justify-content-center">
            <div class="col-sm-4 col-md-5 col-lg-4 col-xl-4 mx-5 my-5 text-secondary">
                <h1 class="text-center text-info font-weight-bold text-uppercase">USER SIGN IN</h1>
<?php
include 'initial/init.php';

if (isset($_POST['user_login'])) {

    $db = new Database();
    $user = new User();

    $email = $db->escape($_POST['email']);
    $password = $db->escape($_POST['password']);

    $data = array('email' => $email, 'password' => $password);

    if ($user->login('user', $data) == true) {

        $_SESSION['email'] = $email;
        header('Refresh:1; url=user.dashboard.php');

        echo "<div class='text-center alert alert-success alert-dismissible fade show' role='alert'>" .
            "<strong>Login Success!</strong>" .
            "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" .
            "<span aria-hidden='true'>&times;</span>" .
            "</button>" .
            "</div>";
        echo "<div class='text-center'>" .
            "<div class='spinner-border' role='status'>" .
            "<span class='sr-only'>Loading...</span>" .
            "</div>" .
            "</div>";
        // Redirect::to('user.dashboard.php');
    } else {
        echo "<div class='text-center alert alert-danger alert-dismissible fade show' role='alert'>" .
            "<strong>Login failed!</strong> Check your email or password." .
            "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" .
            "<span aria-hidden='true'>&times;</span>" .
            "</button>" .
            "</div>";
    }
}
?>
                <form action="user.login.php" method="POST" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="email"><strong>Email:</strong></label>
                        <input type="text" class="form-control" id="email" placeholder="Enter E-Mail" name="email" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="password"><strong>Password:</strong></label>
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember" required>
                            <strong>I am agree with all terms and conditions</strong>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Check this checkbox to continue.</div>
                        </label>
                    </div>
                    <button type="submit" name="user_login" class="btn btn-info btn-block font-weight-bold">Sign In</button>
                </form>
                <div class="row py-2">
                    <div class="col text-center">
                        <a class="text-important font-weight-bold" href="user.forgot.php">Forgot Password?</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- jquery and js CDN -->
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