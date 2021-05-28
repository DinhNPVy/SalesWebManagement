<?php
include "lib/session.php";
Session::init();

?>

<?php
include 'lib/database.php';
include 'helper/format.php';

spl_autoload_register(function ($class) {
    include_once "classes/" . $class . ".php";
});

$db = new Database();
$fm = new Format();
$ct = new cart();
$us = new user();
$cate = new category();
$cust = new customer();
$product = new products();
?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/materialdesignicons.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.min.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Doppio+One">
    <link rel="stylesheet" href="css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="css/styleheader.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <script src="js/jquery.js"></script>
    <script src="js/setup.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setupLeftMenu();
            setSidebarHeight();
        });
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top sticky" id="navbar">
        <div class="container">
            <a class="navbar-brand logo fw-bolder fs-24 text-dark">
                <a href="index.php"><img src="img/Blue Calculator Icon Business Logo.png" alt="" style="height: 100px; border-radius: 100px" /></a>
            </a>
            <div class="col-lg-8 mb-2" id=navbar-collapse-1 style="padding: 20px;">
                <ul class="nav navbar-nav ms-auto" class="dc_mm-orange" id="dc_mega-menu-orange">
                    <li class="nav-item"><a href="index.php" class="nav-link sub-menu-item">Home</a></li>

                    <li class="nav-item"><a href="details.php" class="nav-link sub-menu-item">Products</a></li>

                    <?php
                    $check_cart = $ct->check_cart();
                    if ($check_cart == true) {
                        echo '<li class="nav-item"><a href="cart.php" class="nav-link sub-menu-item">Cart</a></li>';
                    } else {
                        echo '';
                    }
                    ?>
                    <?php
                    $customer_id = Session::get("customer_id");
                    $check_order = $ct->check_order($customer_id);
                    if ($check_order == true) {
                        echo '<li class="nav-item"><a href="orderdetail.php" class="nav-link sub-menu-item">Ordered</a></li>';
                    } else {
                        echo '';
                    }
                    ?>


                    <li class="nav-item"><a href="contact.php" class="nav-link sub-menu-item">Contact</a></li>
                    <?php
                    $login_check = Session::get('customer_signin');
                    if ($login_check == false) {
                        echo '';
                    } else {
                        echo '<li class="nav-item"><a href="profile.php" class="nav-link sub-menu-item">Profile</a></li>';
                    }
                    ?>
                    <div class="clear"></div>

                </ul>

            </div>
            <div class="col-lg-6 mb-2" style="padding-right:15%;">
                <div class="search-box">
                    <form action="">
                        <div>
                            <input class="col-lg-4 mb-2 form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" type="text" placeholder="Search Products..." value="Search Products" onfocus="this.value = ''; " onblur="if (this.value = '' ) {this.value='Search for Products';}">
                        </div>
                        <!-- <input class="col-lg-6 mb-2" type="text" value="Search Products" onfocus="this.value = ''; " onblur="if (this.value = '' ) {this.value='Search for Products';}"> -->
                        <div style=" padding-left: 102%; margin-top: -38px; display: flex; float: left;">
                            <a href=""><i class="fa fa-search" type="submit"> </i></a>
                            <!-- </div>
                            <div class="col-lg-4 mb-2" style="display: flex; padding:10px"> -->
                            <?php
                            if (isset($_GET['customer_id'])) {
                                $delCart = $ct->del_all_dataCart();
                                Session::destroy();
                            }
                            ?>
                            <?php
                            $login_check = Session::get('customer_signin');
                            if ($login_check == false) {
                                echo '<div class="col-lg-12 mb-2"><a href="login.php" class="btn btn-dark" value="Sign in">Sign in</a></div>';
                            } else {
                                echo '<div class="col-lg-12 mb-2"><a href="?customer_id=' . Session::get("customer_id") . ' " class = "btn btn-dark">Sign out</a></div>';
                            }
                            ?>
                            <!-- <div class="col-lg-12 mb-2"><a href="signup.php" class="btn btn-primary" value="Sign up">Sign up</a></div> -->
                        </div>
                    </form>
                </div>
                <div class="col-lg-12 mb-2">
                    <div class="cart">
                        <a href="#" title="View my shopping cart" rel="nofollow">
                            <span class="cart-title"><i class="fas fa-money-check-alt" style="color: green;">: </i></span>
                            <span class="no-product">
                                <?php
                                $check_cart = $ct->check_cart();
                                if ($check_cart) {
                                    echo Session::get("sum") . " SL: " . Session::get("qty");
                                } else {
                                    echo "Empty";
                                }
                                ?>
                            </span>
                        </a>
                    </div>
                </div>

            </div>
            <div class="clear"></div>



        </div>
    </nav>

    <script src="../js/thatim.js"></script>
</body>

</html>