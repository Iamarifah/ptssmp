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
                            <a href="./index.html">
                                <img src="img/ptss.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">

                            <form action="#" class="input-group">
                                <input type="text" placeholder="What do you need?">
                                <button type="button"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="#">
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
                        <span>View Product</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <div class="filter-widget">
                        <h4 class="fw-title">Categories</h4>
                        <ul class="filter-catagories">
                            <li><a href="./clothings.php">Clothings</a></li>
                            <li><a href="./food.php">Foods & Beverages</a></li>
                            <li><a href="./shoes.php">Accessories/Shoes</a></li>
                            <li><a href="./gadget.php">Mobile & Gadgets</a></li>
                            <li><a href="./beauty.php">Health & Beauty</a></li>
                            <li><a href="./computer.php">Computer & Accessories</a></li>
                            <li><a href="./sports.php">Sports & Outdoor</a></li>
                            <li><a href="#">Others</a></li>
                        </ul>
                    </div>


                    <div class="filter-widget">
                        <h4 class="fw-title">Size</h4>
                        <div class="fw-size-choose">
                            <div class="sc-item">
                                <input type="radio" id="s-size">
                                <label for="s-size">s</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="m-size">
                                <label for="m-size">m</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="l-size">
                                <label for="l-size">l</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="xs-size">
                                <label for="xs-size">xs</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-3 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                    <select class="sorting">
                                        <option value="">Default Sorting</option>
                                    </select>
                                    <select class="p-show">
                                        <option value="">Show:</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-list">
                        <div class="row">

                            <?php
                            $sql = "SELECT * FROM product_image
                                    WHERE seller_table = 'staff'
                                    AND seller_id = $id";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_object()) {

                                $product_name = $row->product_name;
                                $product_title = $row->product_title;
                                $product_category = $row->product_category;
                                $available_quantity = $row->available_quantity;
                                $product_description = $row->product_description;
                                $product_price = $row->product_price;
                            ?>

                                <div class="product-detail">
                                    <div class="product-item">
                                        <div class="pi-pic">
<<<<<<< HEAD
                                            <a href="./product-detail.php?product_id=<?php echo $row->product_id; ?>"><img src="img/products/<?php echo $product_name; ?>.jpg" alt="" onclick="myfunction()" style="cursor:pointer;" height="300" width="300"></a>
=======
                                        <a href="./product-detail.php?product_id=<?php echo $row->product_id; ?>"><img src="img/products/<?php echo $product_name; ?>.jpg" alt="" onclick="myfunction()" style="cursor:pointer;" height="300" width="300"></a>
>>>>>>> 530950dfae02eeb6907f232eabc8c6a71f14d53a

                                            <div class="icon">
                                                <i class="icon_heart_alt"></i>
                                            </div>
                                            <ul>
                                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                                <li class="quick-view" data-toggle="modal" data-target="#product_view"><a href="#">+ Quick View</a></li>
                                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                            </ul>
                                        </div>

                                        <div class="pi-text">
                                            <div class="product-name"><?php echo $product_title; ?></div></br>
                                            <div class="catagory-name"><?php echo $product_category; ?></div>

                                            <a href="#">
                                                <h5></h5>
                                                <p><?php echo $product_description; ?></p>
                                            </a>
                                            <div class="product_price">RM <?php echo $product_price; ?>

                                                <span></span>
                                            </div>

                                            <div class="available_quantity">
                                                <small>Available : <?php echo $available_quantity; ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Product Shop Section End -->

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

    <style>
        .product_view .modal-dialog {
            max-width: 800px;
            width: 100%;
        }

        .pre-cost {
            text-decoration: line-through;
            color: #a5a5a5;
        }

        .space-ten {
            padding: 10px 0;
        }
    </style>

    <!-- Quick view begin -->
    <div class="modal fade product_view" id="product_view">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                <button type="btn btn-close pull-right" class="close" aria-label="Close" onclick="closeForm()"><span aria-hidden="true">&times;</span></button>
                    <div class="row">                     
                        <div class="col-md-6 product_img">
                        <a href="./product-detail.php?product_id=<?php echo $row->product_id; ?>"><img src="img/products/<?php echo $product_name; ?>.jpg" class="img-responsive"></a>
                        </div>
                        <div class="col-md-6 product_content">
                            <h4><b><?php echo $product_title; ?></b></h4></br>
                            <div class="rating">
                                <div class="stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    (5 reviews)
                                </div>
                            </div>
                            <div class="pi-text">

                                <a href="#">
                                    <h5></h5>
                                    <p><?php echo $product_description; ?></p>
                                </a>
                                <div class="product_price">
                                    <h3>RM <?php echo $product_price; ?></h3>
                                    <span></span>
                                    <div class="available_quantity">
                                        <p>Available : <?php echo $available_quantity; ?></p>
                                    </div>
                                </div>

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

<script>
    $(document).ready(function() {

        fetch_user();

        function fetch_user() {
            $.ajax({
                url: "fetch_user.php",
                method: "POST",
                success: function(data) {
                    $('#user_details').html(data);
                }
            })
        }

        function chat_dialog(to_user_id, to_user_name) {
            var modal_content = '<div id="user_dialog_' + to_user_id + '"class = "user_dialog" title="' + to_user_name + '">';
            modal_content += '<div style = "height=400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:20px; padding:100px; class="chat_history" data-touserid="' + to_user_id + '" id="chat_history_' + to_user_id + '">';
            modal_content += '</div>';
            modal_content += '<textarea name = "chat_message_' + to_user_id + '" id= "chat_message_' + to_user_id + '" class = "form-control"></textarea>';
            modal_content += '<div class ="form=group" align = "right">';
            modal_content += '<button type="button" name="send_chat" style="margin-top:20px;" id="' +
                to_user_id + '" class="btn btn-info send_chat">Send</button></div></div>';
            modal_content += '</div>';
            $('#user_model_details').html(modal_content);

        }
        $(document).on('click', '.start_chat', function() {
            var to_user_id = $(this).data('touserid');
            var to_user_name = $(this).data('tousername');
            chat_dialog(to_user_id, to_user_name);
            $("#user_dialog_" + to_user_id).dialog({
                autoOpen: false,
                width: 400,
                height: 410
            });
            $("#user_dialog_" + to_user_id).dialog('open');
        });

        $(document).on('click', '.send_chat', function() {
            var to_user_id = $(this).attr('id');
            var chat_message = $('#chat_message_' + to_user_id).val();
            $.ajax({
                url: "insertchat.php",
                method: "POST",
                data: {
                    to_user_id: to_user_id,
                    chat_message: chat_message
                },
                success: function(data) {
                    $('#chat_message_' + to_user_id).val('');
                    $('#chat_history_' + to_user_id).html(data);
                }
            })
        });
    });
</script>
