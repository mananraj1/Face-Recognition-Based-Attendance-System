<?php 

$dbServername = "localhost";
$dbUsername = "attendancemananr_db";
$dbPassword = "attendancemananr_db";
$dbName = "attendancemananr_db";

// create connection
$conn = new mysqli($dbServername,$dbUsername,$dbPassword,$dbName);
// check connection
if($conn -> connect_error) {
    die("connection failed:".$conn->connect_error);
}

// enter your website's url with no '/' at end here
$url = 'hackovid.mananraj.in';?>
