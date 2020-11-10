<?php
require "../database.php";

# dapatkan data staf yang login
$id = $_SESSION['id'];
$sql = "SELECT * FROM staff WHERE id = $id";
$row = $conn->query($sql)->fetch_object();
$name = $row->name;

# dapatkan senarai staff
$sql = "SELECT DISTINCT * FROM staff 
        WHERE id != $id AND id IN
        (SELECT DISTINCT to_user_id FROM chat_message 
        WHERE from_user_id = $id AND from_user_table = 'staff')
        OR id IN
        (SELECT DISTINCT from_user_id FROM chat_message 
        WHERE to_user_id = $id AND to_user_table = 'staff')";
$rs_staff = $conn->query($sql);

#dapatkan senarai student
$sql = "SELECT DISTINCT * FROM student WHERE id IN
        (SELECT DISTINCT to_user_id FROM chat_message 
        WHERE from_user_id = $id AND from_user_table = 'student')
        OR id IN
        (SELECT DISTINCT from_user_id FROM chat_message 
        WHERE to_user_id = $id AND to_user_table = 'student')";
$rs_student = $conn->query($sql);

# dapatkan bilangan chatting belum baca
function bil($chatter_id, $chatter_table)
{
    global $conn;
    global $id;
    $sql = "SELECT COUNT(*) bil FROM chat_message
            WHERE (to_user_id = $id AND to_user_table = 'staff')
            AND (from_user_id = $chatter_id AND from_user_table = '$chatter_table')
            AND isnew = 1";
    $rowbil = $conn->query($sql)->fetch_object();
    return $rowbil->bil;
}

# update isnew dari 1 kepada 0, tanda chat tersebut telah dibaca oleh penerima
function sudahbaca($chat_message_id)
{
    global $conn;
    $sql = "UPDATE chat_message SET isnew = 0 WHERE chat_message_id = $chat_message_id";
    $conn->query($sql);
}

$adachat = false;

# jika chat dari product <== chat.php?product_id=
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $sql = "SELECT * FROM product_image WHERE product_id = $product_id";
    $row_product = $conn->query($sql)->fetch_object();

    # cari pemilik product
    $sql = "SELECT * FROM $row_product->seller_table 
            WHERE id = $row_product->seller_id";
    $row_seller = $conn->query($sql)->fetch_object();
    $mesej = "Hi $row_seller->name, I want to ask about $row_product->product_title";
    $chatter = $row_seller->name;
    $chatter_id = $row_seller->id;
    $chatter_table = $row_product->seller_table;
    $adachat = true;
}

# jika klik nama student <== chat.php?student_id=
if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];
    $sql = "SELECT * FROM chat_message 
            WHERE to_user_id = $student_id
            OR from_user_id = $student_id
            ORDER BY chat_time";
    $rs_student_chat = $conn->query($sql);

    # cari nama chatter
    $sql = "SELECT * FROM student WHERE id = $student_id";
    $row_chatter = $conn->query($sql)->fetch_object();
    $mesej = '';
    $chatter = $row_chatter->name;
    $chatter_id = $row_chatter->id;
    $chatter_table = 'student';
    $adachat = true;
}

# jika klik nama staff <== chat.php?staff_id=
if (isset($_GET['staff_id'])) {
    $staff_id = $_GET['staff_id'];
    $sql = "SELECT * FROM chat_message 
            WHERE (to_user_id = $staff_id AND to_user_table = 'staff')
            OR (from_user_id = $staff_id AND from_user_table = 'staff')
            ORDER BY chat_time";
    $rs_staff_chat = $conn->query($sql);

    # cari nama chatter
    $sql = "SELECT * FROM staff WHERE id = $staff_id";
    $row_chatter = $conn->query($sql)->fetch_object();
    $mesej = '';
    $chatter = $row_chatter->name;
    $chatter_id = $row_chatter->id;
    $chatter_table = 'staff';
    $adachat = true;
}

# panggil chatting dari database
if (isset($chatter_id)) {
    $sql = "SELECT * FROM chat_message
            WHERE ((to_user_id = $chatter_id AND to_user_table = '$chatter_table') 
                AND 
                (from_user_id = $id AND from_user_table = 'staff'))
            OR ((from_user_id = $chatter_id AND from_user_table = '$chatter_table')
                AND 
                (to_user_id = $id AND to_user_table = 'staff'))
           ORDER BY chat_time";
    $rs_chatting = $conn->query($sql);
}
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

    <style>
        .kawasan {
            height: 300px;
            overflow-y: scroll;
            overflow-x: hidden;
        }

        .chatter {
            text-align: left;
        }

        .chatter .kotak {
            background-color: lightcyan;
            border-radius: 0 20px 20px 0;
            padding: 7px 20px 7px 7px;
            border: 1px solid chartreuse;
            margin: 2px 36px 2px 0;
        }

        .sendiri {
            text-align: right;
        }

        .sendiri .kotak {
            background-color: lightyellow;
            border-radius: 20px 0 0 20px;
            padding: 7px 7px 7px 20px;
            border: 1px solid chartreuse;
            margin: 2px 0 2px 36px;
        }
    </style>
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
                        <li>
                            <a href="chat.php">
                                Chat
                            <?php
                            # dapatkan jumlah semua chatting yang belum dibaca
                            $sql = "SELECT COUNT(*) jumlah FROM chat_message 
                                    WHERE to_user_id = $id
                                    AND to_user_table = 'staff'
                                    AND isnew = 1";
                            $row = $conn->query($sql)->fetch_object();
                            $jumlahsemua = $row->jumlah;
                            if ($jumlahsemua) {
                                ?>
                                <span class="badge badge-pill badge-warning"><?php echo $jumlahsemua; ?></span>
                                <?php
                            }
                            ?>
                            </a>
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
                    <a href="#"><i id="home" class="fa fa-home"></i> Home</a>
                    <span>Chat</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Chat Section Begin -->
<div class="container">
    <h3 class="text-center m-3">Chat Platform</h3>

    <div class="row mt-3 mb-3">
        <div class="col-sm-3">
            <div class="card h-100">
                <div class="card-header bg-dark text-white">
                    <h5 class="card-title m-0 text-center">Student</h5>
                </div>
                <div class="card-body">
                    <?php
                    while ($row = $rs_student->fetch_object()) {
                        ?>
                        <a href="chat.php?student_id=<?php echo $row->id; ?>"
                           class="btn btn-outline-info btn-block">
                            <?php
                            echo $row->name;
                            $bil = bil($row->id, 'student');
                            if ($bil) {
                                ?>
                                <span class="badge badge-pill badge-warning"><?php echo $bil; ?></span>
                                <?php
                            }
                            ?>
                        </a>
                        <?php
                    }
                    ?>
                </div>
            </div><!--card-->
        </div>
        <div class="col-sm-6">

            <?php
            if ($adachat) {
                ?>
                <div class="card h-100">
                    <div class="card-header"><!-- bg-primary text-white-->
                        <h4 class="card-title m-0 text-center">Chat with <?php echo $chatter; ?></h4>
                    </div>
                    <div class="card-body">

                        <!-- chat area begin -->
                        <div class="card">
                            <div class="card-body kawasan">

                                <?php
                                while ($row = $rs_chatting->fetch_object()) {
                                    if ($row->to_user_id != $id) {
                                        ?>
                                        <div class="sendiri">
                                            <span class="small"><?php echo $name; ?></span>
                                            <div class="kotak">
                                                <?php echo $row->chat_message; ?>
                                            </div>
                                            <em class="small"><?php echo $row->chat_time; ?></em>
                                        </div>
                                        <?php
                                    } else {
                                        sudahbaca($row->chat_message_id);
                                        ?>
                                        <div class="chatter">
                                            <span class="small"><?php echo $chatter; ?></span>
                                            <div class="kotak">
                                                <?php echo $row->chat_message; ?>
                                            </div>
                                            <em class="small"><?php echo $row->chat_time; ?></em>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>

                                <span id="bawah"></span>
                            </div>
                        </div><!--card-->
                        <!-- chat area end -->

                        <form action="chat-save.php" method="post">
                            <input type="hidden" name="chatter_id" value="<?php echo $chatter_id; ?>">
                            <input type="hidden" name="chatter_table" value="<?php echo $chatter_table; ?>">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="<?php echo $mesej; ?>" required
                                       name="chat_message">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-outline-danger">Send</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div><!--card-->
                <?php
            }
            ?>

        </div>
        <div class="col-sm-3">
            <div class="card h-100">
                <div class="card-header bg-dark text-white">
                    <h5 class="card-title m-0 text-center">Staff</h5>
                </div>
                <div class="card-body">
                    <?php
                    while ($row = $rs_staff->fetch_object()) {
                        ?>
                        <a href="chat.php?staff_id=<?php echo $row->id; ?>"
                           class="btn btn-outline-info btn-block">
                            <?php
                            echo $row->name;
                            $bil = bil($row->id, 'staff');
                            if ($bil) {
                                ?>
                                <span class="badge badge-pill badge-warning"><?php echo $bil; ?></span>
                                <?php
                            }
                            ?>
                        </a>
                        <?php
                    }
                    ?>
                </div>
            </div><!--card-->
        </div>
    </div><!--row-->
</div>
<!-- Chat Section end -->

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
                        </script>
                        All rights reserved | This template is made with <i class="fa fa-heart-o"
                                                                            aria-hidden="true"></i> by <a
                                href="https://colorlib.com" target="_blank">Colorlib</a>
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

<script>
    $(function () {
        window.location.hash = '#bawah';
        window.location.hash = '#home';
    });
</script>
