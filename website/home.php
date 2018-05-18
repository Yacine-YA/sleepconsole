<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login/login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login/login.php");
}

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Transafe - <? echo $_SESSION['username'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Transafe - Your Personal Travel Safety Manager" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico">

    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600,400italic,700' rel='stylesheet' type='text/css'>

    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Simple Line Icons -->
    <link rel="stylesheet" href="css/simple-line-icons.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" href="css/style.css">

    <!-- Styleswitcher ( This style is for demo purposes only, you may delete this anytime. ) -->
    <link rel="stylesheet" id="theme-switch" href="css/style.css">
    <!-- End demo purposes only -->


    <style>
        /* For demo purpose only */

        /* For Demo Purposes Only ( You can delete this anytime :-) */
        #colour-variations {
            padding: 10px;
            -webkit-transition: 0.5s;
            -o-transition: 0.5s;
            transition: 0.5s;
            width: 140px;
            position: fixed;
            left: 0;
            top: 100px;
            z-index: 999999;
            background: #fff;
            /*border-radius: 4px;*/
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
            -webkit-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
            -moz-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
            -ms-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
            box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
        }
        #colour-variations.sleep {
            margin-left: -140px;
        }
        #colour-variations h3 {
            text-align: center;;
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #777;
            margin: 0 0 10px 0;
            padding: 0;;
        }
        #colour-variations ul,
        #colour-variations ul li {
            padding: 0;
            margin: 0;
        }
        #colour-variations li {
            list-style: none;
            display: inline;
        }
        #colour-variations li a {
            width: 20px;
            height: 20px;
            position: relative;
            float: left;
            margin: 5px;
        }
        #colour-variations li a[data-theme="style"] {
            background: #6173f4;
        }
        #colour-variations li a[data-theme="pink"] {
            background: #f64662;
        }
        #colour-variations li a[data-theme="blue"] {
            background: #2185d5;
        }
        #colour-variations li a[data-theme="turquoise"] {
            background: #00b8a9;
        }
        #colour-variations li a[data-theme="orange"] {
            background: #ff6600;
        }
        #colour-variations li a[data-theme="lightblue"] {
            background: #5585b5;
        }
        #colour-variations li a[data-theme="brown"] {
            background: #a03232;
        }
        #colour-variations li a[data-theme="green"] {
            background: #65d269;
        }

        .option-toggle {
            position: absolute;
            right: 0;
            top: 0;
            margin-top: 5px;
            margin-right: -30px;
            width: 30px;
            height: 30px;
            background: #f64662;
            text-align: center;
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
            color: #fff;
            cursor: pointer;
            -webkit-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
            -moz-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
            -ms-box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
            box-shadow: 0 0 9px 0 rgba(0,0,0,.1);
        }
        .option-toggle i {
            top: 2px;
            position: relative;
        }
        .option-toggle:hover, .option-toggle:focus, .option-toggle:active {
            color:  #fff;
            text-decoration: none;
            outline: none;
        }
    </style>
    <!-- End demo purposes only -->


    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<header role="banner" id="fh5co-header">
    <div class="container">
        <!-- <div class="row"> -->
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <!-- Mobile Toggle Menu Button -->
                <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
                <a class="navbar-brand" href="home.php">Transafe</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#" data-nav-section="home"><span>Home</span></a></li>
                    <li><a href="#" data-nav-section="about"><span>Team</span></a></li>
                    <li><a href="#" data-nav-section="features"><span>Features</span></a></li>
                    <li><a href="quiz.php"><span>Practice</span></a></li>
                    <li><a href="profile.php"><?php echo $_SESSION['username']; ?></a></li>
                    <li><a href="home.php?logout='1'">Sign out</a></li>
                </ul>
            </div>
        </nav>
        <!-- </div> -->
    </div>
</header>

<div id="slider" data-section="home">
    <div class="owl-carousel owl-carousel-fullwidth">
        <!-- You may change the background color here. -->
        <div class="item" style="background: #352f44;">
            <div class="container" style="position: relative;">
                <div class="row">
                    <div class="col-md-7 col-sm-7">
                        <div class="fh5co-owl-text-wrap">
                            <div class="fh5co-owl-text">
                                <h1 class="fh5co-lead to-animate">Travel with assurance</h1>
                                <h2 class="fh5co-sub-lead to-animate">Associate your emergency information like allergies, previous medical data, insurance details and emergency contact accessible only to registered professionals and medical staff in case of accidents.</h3>
                                    <p class="to-animate-2"><a href="profile.php" class="btn btn-primary btn-lg">Go to your profile</a></p>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- You may change the background color here.  -->
        <div class="item" style="background: #38569f;">
            <div class="container" style="position: relative;">
                <div class="row">
                    <div class="col-md-7 col-md-push-1 col-md-push-5 col-sm-7 col-sm-push-1 col-sm-push-5">
                        <div class="fh5co-owl-text-wrap">
                            <div class="fh5co-owl-text">
                                <h1 class="fh5co-lead to-animate">Online Verification</h1>
                                <h2 class="fh5co-sub-lead to-animate">Link and verify your registration, license and AADHAR all from the comfort of your home.</h3>
                                    <p class="to-animate-2"><a href="profile.php" class="btn btn-primary btn-lg">Go to your profile</a></p>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="item" style="background-image:url(images/slide_5.jpg)">
            <div class="overlay"></div>
            <div class="container" style="position: relative;">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="fh5co-owl-text-wrap">
                            <div class="fh5co-owl-text">
                                <h1 class="fh5co-lead to-animate">Practice</h1>
                                <h2 class="fh5co-sub-lead to-animate">Too tired to go to your nearest RTO, practice with mock tests online or schedule a test if you're feeling confident.</h3>
                                    <p class="to-animate-2"><a href="quiz.php" target="_blank" class="btn btn-primary btn-lg">Take a test</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div id="fh5co-about-us" data-section="about">
    <div class="container">

        <div class="row" id="team">
            <div class="col-md-12 section-heading text-center to-animate">
                <h2>Team</h2>
            </div>
            <div class="col-md-12">
                <div class="row row-bottom-padded-lg">
                    <div class="col-md-2 text-center to-animate">
                        <div class="person">
                            <img src="images/t1.jpg" class="img-responsive img-rounded" alt="Person">
                            <h3 class="name">Richa</h3>
                            <div class="position">Web Developer</div>
                            <ul class="social social-circle">
                                <li><a href="#"><i class="icon-twitter"></i></a></li>
                                <li><a href="#"><i class="icon-linkedin"></i></a></li>
                                <li><a href="#"><i class="icon-instagram"></i></a></li>
                                <li><a href="#"><i class="icon-github"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 text-center to-animate">
                        <div class="person">
                            <img src="images/t2.jpg" class="img-responsive img-rounded" alt="Person">
                            <h3 class="name">Saad</h3>
                            <div class="position">Web Developer</div>
                            <ul class="social social-circle">
                                <li><a href="#"><i class="icon-twitter"></i></a></li>
                                <li><a href="#"><i class="icon-linkedin"></i></a></li>
                                <li><a href="#"><i class="icon-instagram"></i></a></li>
                                <li><a href="#"><i class="icon-github"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 text-center to-animate">
                        <div class="person">
                            <img src="images/t3.jpg" class="img-responsive img-rounded" alt="Person">
                            <h3 class="name">Bhoomika</h3>
                            <div class="position">Web Designer</div>
                            <ul class="social social-circle">
                                <li><a href="#"><i class="icon-twitter"></i></a></li>
                                <li><a href="#"><i class="icon-linkedin"></i></a></li>
                                <li><a href="#"><i class="icon-instagram"></i></a></li>
                                <li><a href="#"><i class="icon-dribbble"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 text-center to-animate">
                        <div class="person">
                            <img src="images/t5.jpg" class="img-responsive img-rounded" alt="Person">
                            <h3 class="name">Astha</h3>
                            <div class="position">Web Designer</div>
                            <ul class="social social-circle">
                                <li><a href="#"><i class="icon-twitter"></i></a></li>
                                <li><a href="#"><i class="icon-linkedin"></i></a></li>
                                <li><a href="#"><i class="icon-instagram"></i></a></li>
                                <li><a href="#"><i class="icon-dribbble"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 text-center to-animate">
                        <div class="person">
                            <img src="images/t6.jpg" class="img-responsive img-rounded" alt="Person">
                            <h3 class="name">Disha</h3>
                            <div class="position">Web Designer</div>
                            <ul class="social social-circle">
                                <li><a href="#"><i class="icon-twitter"></i></a></li>
                                <li><a href="#"><i class="icon-linkedin"></i></a></li>
                                <li><a href="#"><i class="icon-instagram"></i></a></li>
                                <li><a href="#"><i class="icon-dribbble"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 text-center to-animate">
                        <div class="person">
                            <img src="images/t4.jpg" class="img-responsive img-rounded" alt="Person">
                            <h3 class="name">Megha</h3>
                            <div class="position">Photographer</div>
                            <ul class="social social-circle">
                                <li><a href="#"><i class="icon-twitter"></i></a></li>
                                <li><a href="#"><i class="icon-linkedin"></i></a></li>
                                <li><a href="#"><i class="icon-instagram"></i></a></li>
                                <li><a href="#"><i class="icon-github"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="fh5co-features" data-section="features">
    <div class="container">
        <div class="row">
            <div class="col-md-12 section-heading text-center">
                <h2 class="single-animate animate-features-1">Features</h2>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 single-animate animate-features-2">
                        <h3>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-bottom-padded-sm">
            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-service to-animate">
                <div class="fh5co-icon"><i class="icon-present"></i></div>
                <div class="fh5co-desc">
                    <h3>100% Free</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-service to-animate">
                <div class="fh5co-icon"><i class="icon-eye"></i></div>
                <div class="fh5co-desc">
                    <h3>Retina Ready</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                </div>
            </div>
            <div class="clearfix visible-sm-block visible-xs-block"></div>
            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-service to-animate">
                <div class="fh5co-icon"><i class="icon-crop"></i></div>
                <div class="fh5co-desc">
                    <h3>Fully Responsive</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-service to-animate">
                <div class="fh5co-icon"><i class="icon-speedometer"></i></div>
                <div class="fh5co-desc">
                    <h3>Lightweight</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                </div>
            </div>
            <div class="clearfix visible-sm-block visible-xs-block"></div>
            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-service to-animate">
                <div class="fh5co-icon"><i class="icon-heart"></i></div>
                <div class="fh5co-desc">
                    <h3>Made with Love</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-service to-animate">
                <div class="fh5co-icon"><i class="icon-umbrella"></i></div>
                <div class="fh5co-desc">
                    <h3>Eco Friendly</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                </div>
            </div>
            <div class="clearfix visible-sm-block visible-xs-block"></div>
        </div>
    </div>
</div>

<div id="fh5co-testimonials" data-section="practice">
    <div class="container">
        <div class="row">
            <div class="col-md-12 section-heading text-center">
                <h2 class="to-animate">Practice...</h2>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 subtext to-animate">
                        <h3>Too tired to go to your nearest RTO, practice with mock tests online record your score and compare how you are preparing, access the library to learn more or schedule a test if you're feeling confident. </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer id="footer" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <ul class="social social-circle">
                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                    <li><a href="#"><i class="icon-youtube"></i></a></li>
                    <li><a href="#"><i class="icon-pinterest"></i></a></li>
                    <li><a href="#"><i class="icon-linkedin"></i></a></li>
                    <li><a href="#"><i class="icon-instagram"></i></a></li>
                    <li><a href="#"><i class="icon-dribbble"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>


<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Owl Carousel -->
<script src="js/owl.carousel.min.js"></script>

<!-- For demo purposes only styleswitcher ( You may delete this anytime ) -->
<script src="js/jquery.style.switcher.js"></script>
<script>
    $(function(){
        $('#colour-variations ul').styleSwitcher({
            defaultThemeId: 'theme-switch',
            hasPreview: false,
            cookie: {
                expires: 30,
                isManagingLoad: true
            }
        });
        $('.option-toggle').click(function() {
            $('#colour-variations').toggleClass('sleep');
        });
    });
</script>
<!-- End demo purposes only -->

<!-- Main JS (Do not remove) -->
<script src="js/main.js"></script>

</body>
</html>

