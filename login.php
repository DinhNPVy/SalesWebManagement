<?php
//include "inc/header.php";
include 'lib/session.php';
Session::checkSignin();
include 'classes/customer.php';
?>

<?php

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

//     $insertCustomer = $cust->insert_customer($_POST);
// }
?>
<?php
$cust = new customer();
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['login'])) {

    $loginCustomer = $cust->login_customer($_POST);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="js/bootstrap.js">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/stylelogin.css" media="screen">

    <script src="./js/jquery.js"></script>




</head>
<style>
    .background {
        background-image: url("img/background.png");
        background-size: cover;
        background-position: center center;
        width: 100%;
        height: 100vh;
    }

    .container {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 300px;
        margin: auto;
        font-family: arial;


    }
</style>

<body>
    <div class="background">


        <div class="container">

            <form action="" method="POST">
                <h3>Sign in <i class="fa fa-sign-in"></i></h3>
                <span><?php

                        if (isset($loginCustomer)) {
                            echo $loginCustomer;
                        }
                        ?></span>
                <div class="form-group">
                    <div class="row m-1">
                        <div class="col-lg-12 ">
                            <div class="fa fa-user">Username

                                <input class="col-lg-4 mb-2 form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" type="text" type="text" placeholder="Enter Your Username" name="email" />

                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row m-1">
                        <div class="col-lg-12 ">
                            <div class="fa fa-lock">Password
                                <input class="col-lg-4 mb-2 form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" id="pass" type="password" placeholder="Enter Your Password" name="password" />
                                <span class="eye">
                                    <div class="fa fa-eye" onclick="showHidden()"></div>
                                </span>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group form-check">
                    <div class="row m-1">
                        <div class="col-lg-12">
                            <label class="form-check-label">
                                <input name="remember-m" type="checkbox" class="form-check-input" /> Remember me
                            </label>

                        </div>
                        <div class="col-lg-12">
                            <label class="form-check-label">
                                New to Account?
                                <a onclick="checkForm()" href="signup.php" data-hind="click: $root.ToggleResetForm" class="btn btn-link btn-sm btn-lg" style="padding-right: 0; padding-left: 0;">
                                    Create an account.
                                </a>
                            </label>

                        </div>
                    </div>
                </div>
                <div class="form-group form-check">
                    <div class="row m-1">
                        <div class="col-lg-12">

                            <input type="submit" name="login" class="btn btn-primary btn-rounded btn-block" style="padding-right: 18px; padding-left: 18px;" value="Sign in" />

                        </div>

                    </div>

                </div>
            </form>


        </div>

    </div>
    <script src="js/thatim.js"></script>
    <script src="js/showpass.js"></script>

</body>

</html>