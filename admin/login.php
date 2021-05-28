<?php
include "../classes/adminlogin.php";
?>

<?php
$class = new adminlogin();
// kiem tra
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adminUser = $_POST['adminUser'];

    $adminPass = md5($_POST['adminPass']);

    $login_check = $class->login_admin($adminUser, $adminPass);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../js/bootstrap.js">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/stylelogin.css" media="screen">

    <script src="./js/jquery.js"></script>
    <title>Form</title>



</head>
<style>
    .background {
        background-image: url("../img/background.png");
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

            <form action="login.php" method="post">
                <h3>Sign in <i class="fa fa-sign-in"></i></h3>
                <span><?php

                        if (isset($login_check)) {
                            echo $login_check;
                        }
                        ?></span>
                <div class="form-group">
                    <div class="row m-1">
                        <div class="col-lg-12 ">
                            <div class="fa fa-user">Username

                                <input class="col-lg-4 mb-2 form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" type="text" placeholder="Enter Your Username" name="adminUser" />

                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row m-1">
                        <div class="col-lg-12 ">
                            <div class="fa fa-lock">Password
                                <input id="pass" class="col-lg-4 mb-2 form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" type="password" placeholder="Enter Your Password" name="adminPass" />
                                <span class="eye">
                                    <div class="fa fa-eye" onclick="showHidden()"></div>
                                </span>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group form-check">
                    <div class="row m-1">
                        <div class="col-lg-10">
                            <label class="form-check-label">
                                <input name="remember-m" type="checkbox" class="form-check-input" /> Remember me
                            </label>
                            <a onclick="checkForm()" href="#" data-hind="click: $root.ToggleResetForm" class="btn btn-link btn-sm btn-lg" style="padding-right: 0; padding-left: 0;">
                                Have you forgotten your password?
                            </a>
                        </div>
                    </div>
                </div>
                <div class="form-group form-check">
                    <div class="row m-1">
                        <div class="col-lg-12">

                            <input type="submit" class="btn btn-primary btn-rounded btn-block" style="padding-right: 18px; padding-left: 18px;" value="Login" />

                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>
    <script src="js/thatim.js"></script>
    <script src="../js/showpass.js"></script>
    <!-- <script>
            $(function(){
                $("#loginForm").validate({
                    rules:{
                        txtUser: {required: true, minlength: 5},
                        txtPass: {required: true, minlength: 5}
                    },
                    messages:{
                        txtUser :{
                            required :"*", minlength:"tối thiểu 5 ký tự"
                        },
                        txtPass :{
                            required :"*", minlength:"tối thiểu 5 ký tự"
                        }
                    }
                });
            });
        </script>
            <script>
              
                
                function getLogin()
                {
                let User = document.getElementById("txtUser").value;
                let passWord = document.getElementById("txtPass").value;
                if(User == ""){
                // window.alert("Bạn nhập chưa nhập đủ thông tin");
                document.getElementById("errorname").innerHTML = "Vui lòng nhập Username!";
                }else{
                document.getElementById("errorname").innerHTML = "";
                }
                if(passWord == "" ){
                // window.alert("Bạn nhập chưa nhập đủ thông tin");
                document.getElementById("errorpass").innerHTML = "Vui lòng nhập Password!";
                }else{
                document.getElementById("errorpass").innerHTML = "";
                }
            
                
            
                </script> -->
    </div>
</body>

</html>