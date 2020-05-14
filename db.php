<?php
$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'questions';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if(!$conn) {
    die("Connection failed! Contact website admin!" . mysqli_error($conn));
} else {
    echo 'Database Connection Successful<br />';
}