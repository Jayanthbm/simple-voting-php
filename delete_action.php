<?php
session_start();
include "connection.php";

$lu =  $_SESSION['UserId'];
$userId = $_GET['id'];
if($userId){
  if($userId == $lu){
    echo "<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>You Can't delete Yourself</div>";
  }else{
    $query = "DELETE FROM users WHERE UserId = $userId";
  if(!mysqli_query($conn,$query)){
    echo "<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Error During Delete</div>";
  }else{
      echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>User Deleted</div>";
  }
  }
}else{
  echo "<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>You are Trying Delete Invalid User</div>";
}