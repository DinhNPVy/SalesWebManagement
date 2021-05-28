<?php
include_once 'inc/header.php';
?>
<?php
$login_check = Session::get('customer_signin');
if ($login_check == false) {
    header("Location:login.php");
}
?>
<?php
// if (!isset($_GET['productid']) || $_GET['productid'] == NULL) {
//     echo "<script> window.location = '404.php' </script>";
// } else {
//     $id = $_GET["productid"];
// }
$id = Session::get('customer_id');
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['save'])) {
    $updateCustomer = $cust->updateCustomer($_POST, $id);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css.map">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styledetails.css">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styleprofile.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">



</head>
<section class="section" style="background-image: url(img/profile.png);  margin:10px 0px 0px;padding:130px 0;background-position:center;background-size:cover;background-repeat:no-repeat;border-radius:4px">


    <div class="container">
        <div class="heading">
            <span>UPDATE <br>
                PROFILE <br>
                CARD</span>
        </div>
        <?php
        if (isset($updateCustomer)) {
            echo $updateCustomer;
        }
        ?>
        <form action="" method="post">
            <?php
            $id = Session::get('customer_id');
            $get_customer = $cust->show_customer($id);
            if ($get_customer) {
                while ($result = $get_customer->fetch_assoc()) {


            ?>


                    <div class="card">
                        <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%"> -->

                        <h1> <input class="col-lg-4 mb-2 form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" type="text" name="name" value="<?php echo $result['name'] ?>" style="width:253px" /> </h1>
                        <p class="title">
                            <input class="col-lg-4 mb-2 form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" type="text" name="address" value="<?php echo $result['address'] ?>" style="width:253px" />
                        </p>
                        <p> <input class="col-lg-4 mb-2 form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" type="text" name="phone" value="<?php echo $result['phone'] ?>" style="width:253px" /> </p>
                        <p> <input class="col-lg-4 mb-2 form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" type="text" name="email" value="<?php echo $result['email'] ?>" style="width:253px" /> </p>
                        <div style="margin: 24px 0;">
                            <i class="fa fa-sort-down"></i>


                        </div>
                        <p><button type="submit" name="save" value="Save" class="grey">Save</button></p>

                    </div>
                    <div class="icon">
                        <a href="updateprofile.php"><i class="fas fa-user-edit" style="color: black;"></i></a>
                    </div>
            <?php

                }
            }
            ?>
        </form>
    </div>
</section>
<!-- end detail tab -->

<script src="./../js/bootstrap.bundle.min.js"></script>

<?php
include "inc/footer.php";
?>