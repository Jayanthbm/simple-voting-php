<?php
$server = "remotemysql.com";
$username = "OqgiWVS2Nf";
$password = "84jfXMzOdZ";
$dbname = "OqgiWVS2Nf";

$conn = mysqli_connect($server, $username, $password, $dbname)
  or die("error" . mysqli_error($conn));
