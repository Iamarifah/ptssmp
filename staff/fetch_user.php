<?php

include('database.php');
session_start();

$sql = "SELECT * FROM staff";
$result = $conn->query($sql);
while ($row = $result->fetch_all())
                                                       

$output = '<table class = "table table-bordered table-striped">
<tr>
<td>Username</td>
<td>Status</td>
<td>Action</td>
</tr>
';

foreach($result as $row)
 {
    $output .= '
    <tr>
    <td>'.$name=$row['name'] .'</td>
    <td></td>
    <td><button type = "button" class = "btn btn-info btn-xs start_chat"
     data-tousername = "' .$row['name'].'">start chat</button></td>
    </tr>
    ';
}

$output .= '</table>';

echo $output;
?>