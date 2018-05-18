<?php
session_start();

// variable declaration
$name = "";
$email    = "";
$errors = array();
$em_no="";
$_SESSION['success'] = "";

// connect to database
$db = mysqli_connect('transafedb.cdccbxx5nlwo.us-east-2.rds.amazonaws.com', 'transafe', 'transafe1234', 'transafe',3306);

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $name = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $em_no=mysqli_real_escape_string($db,$_POST['em_no']);
    $em_ms=mysqli_real_escape_string($db,$_POST['em_ms']);
    $li_pl=mysqli_real_escape_string($db,$_POST['li_pl']);
    // form validation: ensure that the form is correctly filled
    if (empty($name)) { array_push($errors, "Name is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if (empty($em_no)) { array_push($errors, "Emergency Contact is required"); }
    if (empty($li_pl)) { array_push($errors, "License Plate is required"); }
    if ($password_1 != $password_2) {array_push($errors, "The two passwords do not match");}

    $q="SELECT * FROM user WHERE email='$email'";
    $r=mysqli_query($db,$q);
    if (mysqli_num_rows($r)){array_push($errors, "Email already registered, contact admin if you have forgotten the password");}

    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $activation = md5(uniqid(rand(), true));
        $password = md5($password_1);//encrypt the password before saving in the database
        $query = "INSERT INTO user (name, email, password,em_no,li_pl,pl_key,em_msg) 
					  VALUES('$name', '$email', '$password','$em_no','$li_pl','$activation','$em_ms')";
        mysqli_query($db, $query);


        $_SESSION['username'] = $name;
        $_SESSION['success'] = "You are now logged in";
        header('location: ../home.php');
    }

}

// ...

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM user WHERE email='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        $row = $results->fetch_array(MYSQLI_ASSOC);
        if (mysqli_num_rows($results) == 1 && $row['ad_rights']==1) {
            $_SESSION['username'] = $row['name'];
            $_SESSION['r']=$row;
            $_SESSION['success'] = "You are now logged in";
            header('location: ../rto.php');
        }
        else if (mysqli_num_rows($results) == 1 && $row['ad_rights']==2) {
            $_SESSION['username'] = $row['name'];
            $_SESSION['r']=$row;
            $_SESSION['success'] = "You are now logged in";
            header('location: ../police.php');
        }
        else if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $row['name'];
            $_SESSION['r']=$row;
            $_SESSION['success'] = "You are now logged in";
            header('location: ../home.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

?>