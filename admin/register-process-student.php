<?php
//CONNECTION DARABSE
require "database.php";

//BACA USERNAME DAN PASSWORD DAR FORM
$uname = $_POST['uname'];
$name = $_POST['name'];
$pass = $_POST['pass'];
$conpass = $_POST['conpass'];

$sql = "INSERT INTO student (uname,name,pass,conpass) VALUES ('$uname','$name','$pass','$conpass')";
$row = $conn->query($sql);
?>
<script>window.location='registerstudent.php';</script>