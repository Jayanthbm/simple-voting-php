<?php
session_start();
include "connection.php";
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$age =  mysqli_real_escape_string($conn, $_POST['age']);
$gender =  mysqli_real_escape_string($conn, $_POST['gender']);
$country =  mysqli_real_escape_string($conn, $_POST['country']);
$name = $_SESSION['name'];

//Update
$uq = "UPDATE users SET firstname = '$firstname',lastname = '$lastname',age =$age,gender ='$gender',country ='$country' WHERE username= '$name'";

if (!mysqli_query($conn, $uq)) {
  echo $uq;
  echo mysqli_error($conn);
  echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Error During Updating Profile</div>";
} else {
  echo "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Successfully Updated</div>";
}
