<?php
session_start();
include "connection.php";
if (empty($_POST['lan'])) {
  echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Please select a language to vote!</div>";
  exit();
}
$lan = $_POST['lan'];
$sess = $_SESSION['name'];
$id =$_SESSION['UserId'];

if ($lan && $sess) { // Form Validation By Server
  $lan = addslashes($_POST['lan']);
  $lan = mysqli_real_escape_string($conn, $lan);
  //Check Wheather he already made an Vote or Not
  $sql = "SELECT * from votings WHERE voterName = '$sess'";
  $vr = mysqli_query($conn, $sql);
  if (mysqli_num_rows($vr) == 1) {
    echo "<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>You have already been voted, No need to vote again</div>";
  } else {
    //Get user data
    $ud = "SELECT ageRange ,gender from users WHERE UserId ='$id'";
    $ur = mysqli_query($conn, $ud);
    if (mysqli_num_rows($ur) > 0) {
      while ($row = mysqli_fetch_array($ur)) {
        $u_age = $row['ageRange'];
        $u_gender = $row['gender'];
      }
    }
    $viq = "INSERT INTO votings (voterName,voteTo,votedOn,voterGender,voterAgeRange)VALUES('$sess','$lan',current_timestamp(),'$u_gender','$u_age')";
    if (!mysqli_query($conn, $viq)) {
      echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Error.</div>";
    } else {
      echo "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Congratulation, you have made your vote.</div>";
    }
  }
} else {
  echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Error.</div>";
}
