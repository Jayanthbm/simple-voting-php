<?php
session_start();
include "connection.php";

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password =  mysqli_real_escape_string($conn, $_POST['password']);
$md5_pass = md5($password);

if ($username && $password) { // Form Validation By Server
  //Query to check
  $lq = "SELECT * FROM users WHERE userName ='$username' AND password = '$md5_pass'";
  $lr = mysqli_query($conn, $lq);
  if (mysqli_num_rows($lr) == 1) {
    while ($row = mysqli_fetch_array($lr)) {
      $userId = $row['UserId'];
      $uname = $row['userName'];
      $r = $row['role'];
      if($r == 1){
        $rank ="voter";
      }
      if($r == 2){
        $rank ="admin";
      }
      //Setting Sessions
      $_SESSION['UserId'] = $userId;
      $_SESSION['name'] = $uname;
      $_SESSION['rank'] = $rank;
    }
    echo "Login Successful";
  } else {
    echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Invalid Username or Password</div>";
  }
} else {
  echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Fields Should not be Empty</div>";
}
