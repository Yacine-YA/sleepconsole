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
$q="Select * from user WHERE ad_rights is NULL ";
$results=mysqli_query($db,$q);
$rtoq="Select * from rtotb";
$rtor=mysqli_query($db,$rtoq);
$rtorow=array();
while($line = $rtor->fetch_array(MYSQLI_ASSOC)){
    $rtorow[] = $line;
}
if (isset($_POST['accept'])) {
    $postid = $_POST['postid'];
    $name=$_POST['name'];
    $point=$_POST['point'];
    if($_POST['accept']==1)
        mysqli_query($db, "UPDATE user SET ".$name." =2, ".$point."=1  WHERE uid=$postid");
    else if($_POST['accept']==2)
        mysqli_query($db, "UPDATE user SET ".$name." =3,".$point."=1  WHERE uid=$postid");
    exit();
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
                <a class="navbar-brand" href="rto.php">Transafe</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="history.php"><span>History</span></a></li>
                    <li class="active" ><a href="rto.php"><?php echo $_SESSION['username']; ?></a></li>
                    <li><a href="genqr.php">Generate QR Codes</a></li>
                    <li><a href="rto.php?logout='1'">Sign out</a></li>
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
<table>
    <tr><td><b>Name</b></td><td><b>Email</b></td><td><b>Emergency Contact</b></td><td><b>Result(2W)</b></td><td><b>Result(4W)</b></td><td><b>License Plate</b></td>
        <td style='width: 200px;'><b>Registration Certificate</b></td>
        <td style='width: 200px;'><b>License</b></td>
        <td style='width: 200px;'><b>AADHAR</b></td>
    </tr>
    <? while ($row_users = $results->fetch_array(MYSQLI_ASSOC)) {
        //output a row here
        $key=NULL;
        $rc=$row_users['doc_rc'];
        $li=$row_users['doc_li'];
        $aa=$row_users['doc_aa'];
        $uid=$row_users['uid'];
        $li_pl=$row_users['li_pl'];
        $key = array_search($li_pl, array_column($rtorow, 'li_pl'));
        $rc_s=$row_users['doc_rc_s'];
        $li_s=$row_users['doc_li_s'];
        $aa_s=$row_users['doc_aa_s'];
        $rc_c=$row_users['doc_rc_c'];
        $li_c=$row_users['doc_li_c'];
        $aa_c=$row_users['doc_aa_c'];
        if(isset($rc_c)&&isset($li_c)&&isset($aa_c))
            continue;
        $str_rc='';
        $str_li='';
        $str_aa='';
        if($rc_s=='2')$str_rc='checked';
        if($li_s=='2')$str_li='checked';
        if($aa_s=='2')$str_aa='checked';;
        echo "<tr><td>".($row_users['name'])."</td><td>".($row_users['email'])."</td><td>".($row_users['em_no'])."</td><td>";if($row_users['score']>3)echo "Pass"; else echo "Fail"; echo "</td><td>";if($row_users['score_4w']>3)echo "Pass"; else echo "Fail"; echo "</td><td>".($row_users['li_pl'])."</td>
<td style='width: 200px;height:200px;'>";if(isset($rc)&&!isset($rc_c)) echo"<a target='_blank' href=$rc><img onerror='this.style.height=0px' alt='No File Uploaded' src =$rc ></a><input data-point='doc_rc_c' name='doc_rc_s' class='switcher'  id=$uid data-toggle='toggle' $str_rc data-on='Accept' data-width=100 data-height=34 data-off='Decline' data-onstyle='success' data-offstyle='danger' type='checkbox' ></td>
<td style='width: 200px;height:200px;'>";else echo "<td style='width: 200px;height:200px;'>";if(isset($li)&&!isset($li_c)) echo"<a target='_blank' href=$li><img onerror='this.style.height=0px' alt='No File Uploaded' src =$li ></a><input data-point='doc_li_c' name='doc_li_s' class='switcher' id=$uid data-toggle='toggle' $str_li data-on='Accept' data-width=100 data-height=34 data-off='Decline' data-onstyle='success' data-offstyle='danger' type='checkbox' ></td>
<td style='width: 200px;height:200px;'>";else echo "<td style='width: 200px; height:200px;'>";if(isset($aa)&&!isset($aa_c)) echo"<a target='_blank' href=$aa><img onerror='this.style.height=0px' alt='No File Uploaded' src =$aa ></a><input data-point='doc_aa_c' name='doc_aa_s' class='switcher' id=$uid data-toggle='toggle' $str_aa data-on='Accept' data-width=100 data-height=34 data-off='Decline' data-onstyle='success' data-offstyle='danger' type='checkbox' ></td>
</tr>
";
if(isset($key) && $key!==FALSE){echo"
<tr style='background-color: yellow'><td>".($rtorow[$key]['name'])."</td><td>".($rtorow[$key]['email'])."</td><td>".($rtorow[$key]['em_no'])."</td><td>";
if($rtorow[$key]['score']>3)echo "Pass"; else echo "Fail"; echo"</td><td>";if($rtorow[$key]['score_4w']>3)echo "Pass"; else echo "Fail"; echo"</td><td>".($rtorow[$key]['li_pl'])."</td><td>".($rtorow[$key]['doc_rc'])."</td><td>".($rtorow[$key]['doc_li'])."</td><td>".($rtorow[$key]['doc_aa'])."</td></tr>";
        }}
    ?>
</table>
<script>
    $(document).ready(function(){
        // when the user clicks on switch
        $(".switcher").change(function(){
            var postid = $(this).attr('id');
            var point=$(this).attr('data-point');
            var na=$(this).attr('name');
            if($(this).is(":checked")) {
                $.ajax({
                    url: 'rto.php',
                    type: 'post',
                    data: {
                        'accept': 1,
                        'postid': postid,
                        'name':na,
                        'point':point
                    }
                });
            }
            else
            {$.ajax({
                url: 'rto.php',
                type: 'post',
                data: {
                    'accept': 2,
                    'postid': postid,
                    'name':na,
                    'point':point
                }
            });
            }
        });
    });
</script>
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




