<?php
session_start(); // starting the session
include "connection.php";

//get the data posted
$cpassword = $_POST['cpassword'];  
$npassword = $_POST['npassword'];
$cnpassword = $_POST['cnpassword'];
$name = $_SESSION['name'];
if ($cpassword && $npassword && $cnpassword) { // Form Validation By Server
  $md5_cpassword = md5($cpassword);
  $md5_npassword = md5($npassword);
  $md5_cnpassword = md5($cnpassword);
  if ($npassword == $cnpassword) { //Condtional Statement
    $pc = "SELECT * from users WHERE userName = '$name' AND password = '$md5_cpassword'";
    $pcr = mysqli_query($conn, $pc);
    if (mysqli_num_rows($pcr) > 0) {
      $up = "UPDATE users SET password = '$md5_npassword' WHERE userName = '$name'";
      if (!mysqli_query($conn, $up)) {
        echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Error During Reset</div>";
      } else {
        echo "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Password Changed Sucessfully!!</div>";
      }
    } else {
      echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Invalid Current Password</div>";
    }
  } else {
    echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Passwords Must be Same</div>";
  }
} else {
  echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Error</div>";
}
