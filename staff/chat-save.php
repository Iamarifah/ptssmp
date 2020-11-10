<?php
require '../database.php';

$to_user_id = $_POST['chatter_id'];
$from_user_id = $_SESSION['id'];
$chat_message = $_POST['chat_message'];
$to_user_table = $_POST['chatter_table'];
$from_user_table = 'staff';
$chat_time = date('Y-m-d H:i:s');
$isnew = 1;

$chat_message = $conn->real_escape_string($chat_message);

$sql = "INSERT INTO chat_message VALUES (null, $to_user_id, $from_user_id, '$chat_message', '$to_user_table', '$from_user_table', '$chat_time', $isnew)";
$conn->query($sql);
if ($conn->error) {
    echo $sql . '<br>' . $conn->error;
} else {
    if ($to_user_table == 'staff') {
        header("location: chat.php?staff_id=$to_user_id");
    } else {
        header("location: chat.php?student_id=$to_user_id");
    }
}
