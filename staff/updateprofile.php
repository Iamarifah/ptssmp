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
                        Unit_Keusahawanan@gmail.com
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
                            <a href="./index.php">
                                <img src="img/ptss.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">

                            <div class="input-group">
                                <input type="text" placeholder="What do you need?">
                                <button type="button"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="./shopping-cart.php">
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
                <div class="d-flex justify-content-center">
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
                            <li><a href="#">Shop</a>
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
                                    <li><a href="./view.php">View product</a></li>
                                    <li><a href="#">Update product</a></li>

                                </ul>
                            </li>
                            <li><a href="./chat.php">Inbox</a>
                                <ul class="dropdown">
                                    <li><a href=""></a></li>
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
                        <span>Update Profile</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <style>
        #profileimage {
            display: block;
            width: 60%;
            margin: 10px auto;
            border-radius: 50%;

        }

        .form-group {
            padding: 10px;
        }

        #singlebutton {
            width: 30%;
        }
        
    </style>

    <!-- Form Section Begin -->
    <form action="update-process.php" method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="col-4 offset-md-4 form-div">

                    <h3 class="text-center">UPDATE PROFILE</h3>

                    <div class="form-group text-center">
                        <img src="img/placeholder.png" onclick="triggerClick()" id="profileimage" />
                        <label for="filebutton">PROFILE</label>
                        <input type="file" name="profile_image" id="profile" onchange="displayImage(this)" class="form-control" style="display: none;">
                    </div>
                    <div class="form-group">
                        <label for="name">NAME</label>
                        <input id="name" name="name" placeholder="NAME" class="form-control input-md" required="" type="text">
                    </div>
                    <div class="form-group">
                        <label for="department">DEPARTMENT</label>
                        <input id="department" name="department" placeholder="DEPARTMENT" class="form-control input-md" required="" type="text">  
                    </div>
                    <div class="form-group">
                        <label for="email">EMAIL</label>
                        <input id="email" name="email" placeholder="EMAIL" class="form-control input-md" required="" type="text">
                    </div>
                    <div class="form-group">
                        <label for="username">PHONE NUMBER</label>
                        <input id="phone" name="phone" placeholder="PHONE NUMBER" class="form-control input-md" required="" type="number">
                    </div>
                    <div class="form-group text-center">
                        <a href="./update-process.php"><button type="submit" id="singlebutton" name="submit" class="btn btn-primary">SAVE</button></a>
                        <a href="./updateprofile.php"><button type="reset" id="singlebutton" name="cancel" class="btn btn-primary">CANCEL</button></a>

                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="script.js"></script>



    <!-- Form Section Begin -->

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

                            <li>Email: Unit_Keusahawanan@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>

                            <li><a href="#">Contact</a></li>

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