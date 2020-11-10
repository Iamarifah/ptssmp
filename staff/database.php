<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$database = "contoh_ptss";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);  // yang asal sampai sini ja
session_start();
date_default_timezone_set('Asia/Kuala_Lumpur');
