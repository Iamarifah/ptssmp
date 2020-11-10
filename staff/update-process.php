<?php 
require('../database.php');

$profile_image=$_POST['profile_image'];
$name=$_POST['name'];
$department=$_POST['department'];
$email=$_POST['email'];
$phone=$_POST['phone'];

$sql="INSERT INTO profile(profile_image,name,department,email,phone) 
VALUE('$profile_image','$name','$department','$email','$phone'')";


$conn->query($sql);

header("location:viewprofile.php");

?>