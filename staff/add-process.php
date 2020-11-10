<?php 
require('../database.php');

$statusMsg = '';

$targetDir = "img/products/";
$product_name = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $product_name;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

$product_name=$_POST['product_name'];
$product_title=$_POST['product_title'];
$product_category=$_POST['product_category'];
$available_quantity=$_POST['available_quantity'];
$product_description=$_POST['product_description'];
$product_price=$_POST['product_price'];


$sql="INSERT INTO product_image (product_name, product_title, product_category, available_quantity, product_description, product_price) 
VALUE('$product_name','$product_title','$product_category','$available_quantity','$product_description','$product_price')";

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database

            if($sql){
                $statusMsg = "The file ".$product_name. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

$conn->query($sql);

echo $statusMsg;

header("location:view.php");

?>
