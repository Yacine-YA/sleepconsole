<?
include('login/server.php');
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login/login.php');

}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login/login.php");
}

if(isset($_POST['score'])) {
    $sc=$_POST['score'];
    $uid=$_SESSION['r']['uid'];
    $q="UPDATE user SET score_4w ='$sc' WHERE uid='$uid'";
    mysqli_query($db,$q);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Transafe - <?php echo $_SESSION['r']['name']?></title>

    <style>
        /* Always set the map height explicitly to define the size of the div

        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;

        }
    </style>
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
    <script src="js/jquery.min.js"></script>
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



    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- banner -->
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
                    <li><a href="home.php"><span>Home</span></a></li>
                    <li><a href="quiz.php"><span>Practice</span></a></li>
                    <li class="active" data-nav-section="home"><a href="profile.php"><?php echo $_SESSION['username']; ?></a></li>
                    <li><a href="profile.php?logout='1'">Sign out</a></li>
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

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <ul style="list-style: none">
        <li>
            <h3>1. You are approaching a narrow bridge, another vehicle is about to enter the bridge from opposite side, you</h3>
            <input type="radio" name="question0" value="A">A. Increase the speed and try to cross the bridge as fast as possible <br>
            <input type="radio" name="question0" value="B">B. Put on the headlight and pass the bridge <br>
            <input type="radio" name="question0" value="C">C. Wait till the other vehicle crosses the bridge and then proceed<br>
        </li>
        <li>
            <h3>2. Near a pedestrian crossing, when the pedestrians are waiting to cross the road, you should</h3>
            <input type="radio" name="question1" value="A">Sound horn and proceed. <br>
            <input type="radio" name="question1" value="B">Slow down, sound horn and pass.<br>
            <input type="radio" name="question1" value="C">Stop the vehicle and wait till the pedestrians cross the road and then proceed.<br>
        </li>
        <li>
            <h3>3. In case of an accident to seek a medical help, you should dial.</h3>
            <input type="radio" name="question2" value="A">A. 108 or 102.<br>
            <input type="radio" name="question2" value="B">B. 101. <br>
            <input type="radio" name="question2" value="C">C. Any of these.<br>
        </li>
        <li>
            <h3>4. What does following sign represent?</h3>
            <img class="size-full wp-image-11" src="http://licencetest.in/question-bank/wp-content/uploads/sites/2/2015/03/q3.jpg" alt="q3" width="75" height="75"><br>
            <input type="radio" name="question3" value="A">A. Keep left.<br>
            <input type="radio" name="question3" value="B">B. There is no road on the left.<br>
            <input type="radio" name="question3" value="C">C. Compulsory keep left.<br>
        </li>
        <li>
            <h3>5. What does following sign represent?</h3>
            <img class="size-full wp-image-15" src="http://licencetest.in/question-bank/wp-content/uploads/sites/2/2015/03/q6.jpg" alt="q6" width="75" height="65"><br>
            <input type="radio" name="question4" value="A">A. Loose gravel. <br>
            <input type="radio" name="question4" value="B">B. Wet road. <br>
            <input type="radio" name="question4" value="C">C. Slippery road.<br>
        </li>

    </ul>

    <button class="btn btn-primary btn-lg " onclick="returnScore()">Submit</button>
</div>

<footer id="footer" role="contentinfo">

</footer>
<!-- //footer -->
<script src="js/jarallax.js"></script>
<script type="text/javascript">

    var answers = ["C","C","A","C","C"],
        tot = answers.length;

    function getCheckedValue( radioName ){
        var radios = document.getElementsByName( radioName ); // Get radio group by-name
        for(var y=0; y<radios.length; y++)
            if(radios[y].checked) return radios[y].value; // return the checked value
    }

    function getScore(){
        var score = 0;
        for (var i=0; i<tot; i++)
            if(getCheckedValue("question"+i)===answers[i]) score += 1; // increment only
        $.ajax({
            url: 'quiz_4w.php',
            type: 'post',
            data: {
                'score': score
            }
        });
        return score;
    }

    function returnScore(){
        if(getScore()>3)
            alert("Your result is: Pass");
        else
            alert("Your result is: Fail");



    }
</script>

<script type="text/javascript">
    /* init Jarallax */
    $('.jarallax').jarallax({
        speed: 0.5,
        imgWidth: 1366,
        imgHeight: 768
    })
</script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<!-- here stars scrolling icon -->
<!-- //here ends scrolling icon -->

<!-- jQuery -->

<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Owl Carousel -->
<script src="js/owl.carousel.min.js"></script>

<!-- Main JS (Do not remove) -->
<script src="js/main.js"></script>
</body>
</html>
