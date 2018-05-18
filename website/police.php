<?php
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


if (isset($_POST['poli_sub'])) {
    $li_id=$_POST['li_id'];
    $q="Select * from user WHERE pl_key= '$li_id'";
    // $q="UPDATE user set ad_rights=65465 WHERE pl_key= '$li_id'";
    $results=mysqli_query($db,$q);
    $row = $results->fetch_array(MYSQLI_ASSOC);
    $name=$row['name'];
    $email=$row['email'];
    $em_no=$row['em_no'];
    $em_msg=$row['em_msg'];
    $score=$row['score'];
    $li_pl=$row['li_pl'];
    $doc_rc_s=$row['doc_rc_s'];
    $doc_li_s=$row['doc_li_s'];
    $doc_aa_s=$row['doc_aa_s'];
    $rc=$row['doc_rc'];
    $li=$row['doc_li'];
    $aa=$row['doc_aa'];



}

?>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: center;
            /*border-bottom: 1px solid #ddd;*/
            border-bottom: 1px solid #6173f4;
            padding-bottom: 2px ;
            max-width: 200px;
        }

        img {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            width: 150px;
        }

        img:hover {
            box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
        }


        body, input {font-size:14pt}
        input, label {vertical-align:middle}
        .qrcode-text {padding-right:1.7em; margin-right:0}
        .qrcode-text-btn {display:inline-block; background:url(//dab1nmslvvntp.cloudfront.net/wp-content/uploads/2017/07/1499401426qr_icon.svg) 50% 50% no-repeat; height:1em; width:1.7em; margin-left:-1.7em; cursor:pointer}
        .qrcode-text-btn > input[type=file] {position:absolute; overflow:hidden; width:1px; height:1px; opacity:0}


    </style>
    <title>Transafe - <?php echo $_SESSION['r']['name']?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!--// bootstrap-css -->
    <!-- css -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!--// css -->
    <!-- font-awesome icons -->

    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- font -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!-- //font -->
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <!-- light-box -->
    <link rel="stylesheet" href="css/lightbox.css">
    <!-- //light-box -->
    <script src="js/SmoothScroll.min.js"></script>
    <script src="js/jquery.min.js"></script>

    <!--search jQuery-->

    <script src="js/main_old.js"></script>
    <script src="js/qr_packed.js"></script>

    <!--//search jQuery-->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
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
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */

        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
    <style>
        img {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            width: 150px;
            height:75px;
        }

        img:hover {
            box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
        }

    </style>

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap2-toggle.min.css" rel="stylesheet">
    <script type='text/javascript' src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap2-toggle.min.js"></script>
</head>
<body>
<header role="banner" id="fh5co-header">
    <div class="container">
        <!-- <div class="row"> -->
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <!-- Mobile Toggle Menu Button -->
                <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
                <a class="navbar-brand" href="police.php">Transafe</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!--                    <li><a href="history.php"><span>History</span></a></li>-->
                    <li class="active" ><a href="police.php"><?php echo $_SESSION['username']; ?></a></li>
                    <li><a href="police.php?logout='1'">Sign out</a></li>
                </ul>
            </div>
        </nav>
        <!-- </div> -->
    </div>
</header>
<div id="slider" data-section="home">

    <!-- You may change the background color here. -->
    <div class="item" style="background: #6173f4;">
        <div class="container" style="position: relative;">
            <div class="row">
                <div class="col-md-7 col-sm-7">
                    <div class="fh5co-owl-text-wrap" style="height: 80px">

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<br>
<div class="row" style="text-align: center">
    <form class="col-md-3 col-md-offset-5 col-sm-3 col-sm-offset-2" method="post" action="police.php">
        <input type=text size=16 placeholder="License Plate" class=qrcode-text name="li_id"><label class=qrcode-text-btn><input type=file accept="image/*" capture=environment onclick="return showQRIntro();" onchange="openQRCamera(this);" tabindex=-1></label>
        <button class="btn btn-primary btn-md" type=submit name="poli_sub">GO</button>
    </form>
</div>
<div class="row">
    <?
    if(isset($row)){
        echo "<div id=\"fh5co-features\" data-section=\"features\">
    <div class=\"container\">
        <div class=\"row row-bottom-padded-sm\">
            <div class=\"col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-service to-animate\">
                <div class=\"fh5co-desc\">
                    <h3>Name</h3>
                    <p>$name</p>
                </div>
            </div>
            <div class=\"col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-service to-animate\">
                <div class=\"fh5co-desc\">
                    <h3>Email</h3>
                    <p>$email</p>
                </div>
            </div>
            <div class=\"col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-service to-animate\">
                <div class=\"fh5co-desc\">
                    <h3>Emergency Contact</h3>
                    <p>$em_no</p>
                </div>
            </div>
            <div class=\"clearfix visible-sm-block visible-xs-block\"></div>
            </div>
            <div class=\"row row-bottom-padded-sm\">
            
            <div class=\"col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-service to-animate\">
                <div class=\"fh5co-desc\">
                    <h3>Score</h3>
                    <p>$score</p>
                </div>
            </div>
            <div class=\"col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-service to-animate\">
                <div class=\"fh5co-desc\">
                    <h3>License Plate</h3>
                    <p>$li_pl</p>
                </div>
            </div>
            <div class=\"col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-service to-animate\">
                <div class=\"fh5co-desc\">
                    <h3>Emergency Message</h3>
                    <p>$em_msg</p>
                </div>
            </div>
            
            <div class=\"clearfix visible-sm-block visible-xs-block\"></div>
            </div>
            <div class=\"row row-bottom-padded-sm\">
            <div class=\"col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-service to-animate\">
                <div class=\"fh5co-desc\">
                    <h3>Registration Certificate</h3>
                    ";if($doc_rc_s==1) echo"<p>Unverified</p>";
        else if ($doc_rc_s==2)echo"<p>Accepted</p>";
        else if ($doc_rc_s==3)echo "<p>Declined</p>";
        if(isset($doc_rc_s))echo"<a target='_blank' href=$rc><img onerror='this.style.height=0px' alt='No File Uploaded' src =$rc ></a>";
        echo"
                </div>
            </div>
            <div class=\"col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-service to-animate\">
                <div class=\"fh5co-desc\">
                    <h3>License</h3>
                    ";if($doc_li_s==1) echo"<p>Unverified</p>";
        else if ($doc_li_s==2)echo"<p>Accepted</p>";
        else if ($doc_li_s==3)echo "<p>Declined</p>";
        if(isset($doc_rc_s))echo"<a target='_blank' href=$li><img onerror='this.style.height=0px' alt='No File Uploaded' src =$li ></a>";
        echo"
                </div>
            </div>
            <div class=\"col-md-4 col-sm-6 col-xs-6 col-xxs-12 fh5co-service to-animate\">
                <div class=\"fh5co-desc\">
                    <h3>AADHAR</h3>
                    ";if($doc_aa_s==1) echo'<p>Unverified</p>';
        else if ($doc_aa_s==2)echo'<p>Accepted</p>';
        else if ($doc_aa_s==3)echo '<p>Declined</p>';
        if(isset($doc_aa_s))echo"<a target='_blank' href=$aa><img onerror='this.style.height=0px' alt='No File Uploaded' src =$aa ></a>";

        echo"
                </div>
            </div>
            </div>
            
        </div>
    </div>
</div>";}

    ?>
</div>



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


    function openQRCamera(node) {
        var reader = new FileReader();
        reader.onload = function() {
            node.value = "";
            qrcode.callback = function(res) {
                if(res instanceof Error) {
                    alert("No QR code found. Please make sure the QR code is within the camera's frame and try again.");
                } else {
                    node.parentNode.previousElementSibling.value = res;
                }
            };
            qrcode.decode(reader.result);
        };
        reader.readAsDataURL(node.files[0]);
    }

    function showQRIntro() {
        return confirm("Use your camera to take a picture of a QR code.");
    }


</script>
<!-- End demo purposes only -->

<!-- Main JS (Do not remove) -->
<script src="js/main.js"></script>
</body>

</html>




