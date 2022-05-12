<?php
include 'config.php';

error_reporting(0);

$id = $_GET['id'];
$res = mysqli_query($conn, "UPDATE batik SET is_delete=1 WHERE id_batik=$id");

header("Location: homePage.php");
?>