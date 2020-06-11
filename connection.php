<?php
// $server = "remotemysql.com";
// $username = "OqgiWVS2Nf";
// $password = "84jfXMzOdZ";
// $dbname = "OqgiWVS2Nf";

$server = "localhost";
$username = "root";
$password = "";
$dbname = "votings";

$conn = mysqli_connect($server, $username, $password, $dbname)
  or die("error" . mysqli_error($conn));
