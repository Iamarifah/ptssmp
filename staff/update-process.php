<?php 
require('../database.php');

$profile_image=$_POST['profile_image'];
$email=$_POST['email'];
$phone=$_POST['phone'];

$sql="INSERT INTO profile(profile_image,email,phone) 
VALUE('$profile_image','$email','$phone'')";

$conn->query($sql);

header("location:viewprofile.php");

?>