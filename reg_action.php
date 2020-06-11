<?php
session_start();
$captcha = "";
include "connection.php";

$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password =  mysqli_real_escape_string($conn, $_POST['password']);
$md5_pass = md5($password);
$age =  mysqli_real_escape_string($conn, $_POST['age']);
$gender =  mysqli_real_escape_string($conn, $_POST['gender']);
$rank = $_POST['rank'] ?? 1;

if ($firstname && $lastname && $username && $password && $age && $gender) { // Form Validation By Server
  $sql = "SELECT username from users WHERE username = '$username'";
  $ur = mysqli_query($conn, $sql);
  if (mysqli_num_rows($ur) > 0) {
    echo "<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>User Exist</div>";
  } else {
    $is = "INSERT INTO users (firstName,lastName,userName,ageRange,gender,password,role)VALUES( '$firstname', '$lastname', '$username', '$age', '$gender', '$md5_pass', '$rank')";
    if (!mysqli_query($conn, $is)) {
      echo mysqli_error($conn);
      echo "<br/>";
      echo $is;
      echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Error During Registration</div>";
    } else {
      echo "Successfully Registered";
    }
  }
} else {
  echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Missing Fields</div>";
}
