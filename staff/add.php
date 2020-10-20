<?php
require "../database.php";

$id = $_SESSION['id'];
$sql = "SELECT * FROM staff WHERE id = $id";
$row = $conn->query($sql)->fetch_object();
$name = $row->name;
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="PTSS MarketPlace">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PTSS MarketPlace</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        @gmail.com
                    </div>
                </div>
                <div class="ht-right">

                    <li><a href="#" class="login-panel"><i class="fa fa-user"></i><?php echo $name; ?>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.html">
                                <img src="img/ptss.png" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="heart-icon"><a href="#">
                                    <i class="icon_heart_alt"></i>

                                </a>
                            </li>

                            <li class="cart-price"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">

                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><a href="./index.php">Home</a>
                            <ul class="dropdown">
                                <li><a href="./viewprofile.php">View Profile</a></li>
                                <li><a href="./updateprofile.php">Update profile</a></li>
                                <li><a href="./changepassword.php">Change Password</a></li>
                                <li><a href="./logout.php">Logout</a></li>

                            </ul>
                        </li>
                        <li><a href="./shop.php">Shop</a>
                            <ul class="dropdown">
                                <li><a href="./clothings.php">Clothings</a></li>
                                <li><a href="./food.php">Foods & Beverages</a></li>
                                <li><a href="./shoes.php">Accessories/Shoes</a></li>
                                <li><a href="./gadget.php">Mobile & Gadgets</a></li>
                                <li><a href="./beauty.php">Health & Beauty</a></li>
                                <li><a href="./computer.php">Computer & Accessories</a></li>
                                <li><a href="./sports.php">Sports & Outdoor</a></li>
                                <li><a href="#">Others</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Sell</a>
                            <ul class="dropdown">
                                <li><a href="./add.php">Add product</a></li>
                                <li><a href="./view.php">View Product</a></li>
                                <li><a href="#">Update Product</a></li>

                            </ul>
                        </li>
                        <li><a href="#">Inbox</a>
                            <ul class="dropdown">

                                <li><a href=""></a></li>
                                <li><a href=""></a></li>

                            </ul>
                        </li>
                        <li><a href="#">Rate</a>
                            <ul class="dropdown">
                                <li><a href="#">View Rating</a></li>
                                <li><a href="#">Receive Rating</a></li>

                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Add product</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->


    <!-- Add product -->

    <!-- Text input-->


    <!-- Text input-->

    <style>
        .form-group {
            display: flex;
            justify-content: center;
            padding: 10px;
        }

        .col-md-4 control-label {
            text-align: center;

        }
    </style>

    <form action="add-process.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>
            <div class="col-md-4">
                <input id="product_name" name="product_name" placeholder="PRODUCT NAME" class="form-control input-md" required="" type="text">

            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_category">PRODUCT CATEGORY</label>
            <div class="col-md-4">
                <select id="product_category" name="product_category" class="form-control">

                    <option><a href="#">Clothing</a></option>
                    <option><a href="#">Foods & Beverages</a></option>
                    <option><a href="#">Accessories & Shoes</a></option>
                    <option><a href="#">Mobiles & Gadgets</a></option>
                    <option><a href="#">Computer & Accessories</a></option>
                    <option><a href="#">Health & Beauty</a></option>
                    <option><a href="#">Sports & Outdoors</a></option>

                </select>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="available_quantity">AVAILABLE QUANTITY</label>
            <div class="col-md-4">
                <input id="available_quantity" name="available_quantity" placeholder="AVAILABLE QUANTITY" class="form-control input-md" required="" type="text">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_price">PRODUCT PRICE</label>
            <div class="col-md-4">
                <input id="product_price" name="product_price" placeholder="PRODUCT PRICE" class="form-control input-md" required="" type="text">

            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="product_description">PRODUCT DESCRIPTION</label>
            <div class="col-md-4">
                <textarea class="form-control" id="product_description" name="product_description"></textarea>
            </div>
        </div>

        <!-- File Button -->

        <div class="form-group">
            <label class="col-md-4 control-label" for="filebutton">ADD IMAGE</label>
            <div class="col-md-4">
                <input type="file" name="file">

            </div>
        </div>

        <!-- Button -->

        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"></label>
            <div class="col-md-4">
                <a href="./add-process.php"> <button id="singlebutton" name="submit" class="btn btn-primary">SUBMIT</button></a>
            </div>
        </div>

    </form>

    <!-- Register Form Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="#"><img src="img/footer-ptss1.png" alt=""></a>
                        </div>
                        <ul>

                            <li>Email: @gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Checkout</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Serivius</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Shopping Cart</a></li>
                            <li><a href="#">Shop</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>