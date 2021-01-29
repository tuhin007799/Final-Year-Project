<!DOCTYPE html>
<html lang="en">

<head>
    <!-- website title -->
    <title>easySEL</title>

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
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>
    <!-- include header file -->
    <?php include "includes/header.php";?>
    <!-- end header file -->
    <!-- image slider -->
    <div id="imageSlider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#imageSlider" data-slide-to="0" class="active"></li>
            <li data-target="#imageSlider" data-slide-to="1"></li>
            <li data-target="#imageSlider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="images/bg/unimas-sunset.jpg" alt="pic of unimas sunset" height="400">
                <div class="carousel-caption title-background" id="sliderCaption">
                    <h1 id="title" class="text-center text-white">UNIMAS SOFTWARE ENGINEERING LEARNING
                        MONITORING SYSTEM
                    </h1>
                    <h2 id="title1" class="text-center text-warning">WORK LESS, LEARN MORE</h2>
                    <h3 class="timestamp"></h3>
                    <a class="btn btn-outline-light font-weight-bold" href="register.php">Join us now...</a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/bg/world.jpg" alt="world map pic" height="400">
                <div class="carousel-caption title-background" id="sliderCaption">
                    <h1 id="title" class="text-center text-white">UNIMAS SOFTWARE ENGINEERING LEARNING
                        MONITORING SYSTEM
                    </h1>
                    <h2 id="title1" class="text-center text-warning">WORK LESS, LEARN MORE</h2>
                    <h3 class="timestamp"></h3>
                    <a class="btn btn-outline-light font-weight-bold" href="register.php">Join us now...</a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/bg/code.jpg" alt="sample coding pic" height="400">
                <div class="carousel-caption title-background" id="sliderCaption">
                    <h1 id="title" class="text-center text-white">UNIMAS SOFTWARE ENGINEERING LEARNING
                        MONITORING SYSTEM
                    </h1>
                    <h2 id="title1" class="text-center text-warning">WORK LESS, LEARN MORE</h2>
                    <h3 class="timestamp"></h3>
                    <a class="btn btn-outline-light font-weight-bold" href="register.php">Join us now...</a>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#imageSlider" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#imageSlider" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- end image slider -->
    <!-- website features -->
    <div class="container-fluid my-4">
        <h3 class="text-center font-weight-bold features"><span class="text-muted">WELCOME TO FEATURES OF</span>
            <span class="text-primary">easy</span><span class="text-warning">S</span><span class="text-danger">EL</span>
        </h3>

        <div class="row justify-content-center">
            <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                <div class="text-center">
                    <h4 class="text-uppercase features"><i class="fas fa-play-circle"></i> Videos</h4>
                    <p class="text-center text-muted">
                        This website has contained the serious of videos for student to reread the video after class and
                        which can help the student to get clear understanding of topic.
                    </p>
                </div>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                <div class="text-center">
                    <h4 class="text-uppercase features"><i class="fas fa-pencil-alt"></i> Description</h4>
                    <p class="text-center text-muted">
                        Moreover, this website has contained topic description of the class lectures and allowed student
                        to follow the explanation to reduce understanding difficulty.
                    </p>
                </div>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                <div class="text-center">
                    <h4 class="text-uppercase features"><i class="fas fa-microscope"></i> Example</h4>
                    <p class="text-center text-muted">
                        Additionally, it will help the student to trace the proper example of the study topic and it can
                        make the topic say to them and also help them to remember the topic easily.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- end website features -->
    <!-- up counter -->
    <div>
        <div id="counter" class="row justify-content-center py-5">
            <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 text-center text-white py-3 m-2 upCounter">
                <h2><i class="fas fa-graduation-cap"></i></h2>
                <div class="counter-value display-4" data-count="8">0</div>
                <h2 class="text-uppercase">Semesters</h2>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 text-center text-white py-3 m-2 upCounter">
                <h2><i class="fas fa-book"></i></h2>
                <div class="counter-value display-4" data-count="42">0</div>
                <h2 class="text-uppercase">Courses</h2>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 text-center text-white py-3 m-2 upCounter">
                <h2><i class="fas fa-credit-card"></i></h2>
                <div class="counter-value display-4" data-count="132">0</div>
                <h2 class="text-uppercase">Credits</h2>
            </div>
        </div>
    </div>
    <!-- up counter -->
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
    <!-- number increment jquery event -->
    <script>
        $(document).ready(function () {
            var value = 0;
            $(window).scroll(function () {
                var oTop = $('#counter').offset().top - window.innerHeight;
                if (value == 0 && $(window).scrollTop() > oTop) {
                    $('.counter-value').each(function () {
                        var $this = $(this), countTo = $this.attr('data-count');
                        $({
                            countNum: $this.text()
                        }).animate({
                            countNum: countTo
                        },
                            {
                                duration: 1000,
                                easing: 'swing',
                                step: function () {
                                    $this.text(Math.floor(this.countNum));
                                },
                                complete: function () {
                                    $this.text(this.countNum);
                                }
                            });
                    });
                    value = 1;
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            setInterval(timestamp, 1000);
        });

        function timestamp() {
            $.ajax({
                url: 'http://localhost/59412/timestamp.php',
                success: function (data) {
                    $('.timestamp').html(data);
                },
            });
        }
    </script>
    <!-- end jquery event -->
    <!-- include footer -->
    <?php include "includes/footer.php";?>
    <!-- end footer -->
</body>

</html>