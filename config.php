<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "ta_psbd_batik";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Database connection failed.')</script>");
}

?>
