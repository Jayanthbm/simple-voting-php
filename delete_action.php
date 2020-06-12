<?php
session_start();
include "connection.php"; //include connection.php

$lu =  $_SESSION['UserId']; //  Userid from session
$userId = $_GET['id']; // user id from request
//check if userid sent from request or not if userid 
if($userId){
  // if userid trying to deletes userId same as session then 
  if($userId == $lu){
    // dont delete
    echo "<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>You Can't delete Yourself</div>";
  }else{
    // delete from users table where userid eqaul to id from request
    $query = "DELETE FROM users WHERE UserId = $userId";
  if(!mysqli_query($conn,$query)){ // If  error
    echo "<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Error During Delete</div>";
  }else{ 
      echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>User Deleted</div>";
  }
  }
}else{
  echo "<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>You are Trying Delete Invalid User</div>";
}