<?php
session_start();
session_destroy(); //clear all sessions
header("Location: index.php"); //redirect to index page
