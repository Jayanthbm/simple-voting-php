<?php
session_start();
include "connection.php";
if (empty($_POST['lan'])) {
  echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Please select a language to vote!</div>";
  exit();
}
$lan = $_POST['lan'];
$sess = $_SESSION['name'];

if ($lan && $sess) {
  $lan = addslashes($_POST['lan']);
  $lan = mysqli_real_escape_string($conn, $lan);

  //Check Wheather he already made an Vote or Not
  $sql = "SELECT * from votings WHERE voter_name = '$sess'";
  $vr = mysqli_query($conn, $sql);
  if (mysqli_num_rows($vr) == 1) {
    echo "<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>You have already been voted, No need to vote again</div>";
  } else {
    //Get user data
    $ud = "SELECT age ,gender,country from users WHERE username ='$sess'";
    $ur = mysqli_query($conn, $ud);
    if (mysqli_num_rows($ur) > 0) {
      while ($row = mysqli_fetch_array($ur)) {
        $u_age = $row['age'];
        $u_gender = $row['gender'];
        $u_country = $row['country'];
      }
    }
    $viq = "INSERT INTO votings (voter_name,vote_to,voter_gender,voter_age,voter_country)VALUES('$sess','$lan','$u_gender','$u_age','$u_country')";
    if (!mysqli_query($conn, $viq)) {
      echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Error.</div>";
    } else {
      echo "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Congratulation, you have made your vote.</div>";
    }
  }
} else {
  echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Error.</div>";
}
