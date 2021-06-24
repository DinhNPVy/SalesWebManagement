<?php
include 'inc/header.php';
?>
<?php
$login_check = Session::get('customer_signin');
if ($login_check == false) {
    '<script>window.location = login.php</script>';
}
?>
<?php
// if (!isset($_GET['productid']) || $_GET['productid'] == NULL) {
//     echo "<script> window.location = '404.php' </script>";
// } else {
//     $id = $_GET["productid"];
// }
// if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
//     $quantity = $_POST["quantity"];
//     $addCart = $ct->addToCart($quantity, $id);
// }

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
    <link rel="stylesheet" href="css/stylepayment.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">



</head>
<section class="section" style="background-image: url(img/paymentt.png);  margin:10px 0px 0px;padding:300px 0;background-position:center;background-size:cover;background-repeat:no-repeat;border-radius:4px">


    <div class="container">
        <?php
        $id = Session::get('customer_id');
        $get_customer = $cust->show_customer($id);
        if ($get_customer) {
            while ($result = $get_customer->fetch_assoc()) {


        ?>


                <div class="card" style="text-align: center;">
                    <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%"> -->

                    <a href="offline.php">Offline Payment</a> <a href="offline.php"><i class="fas fa-money-check-alt"></i></a>



                </div>
        <?php

            }
        }
        ?>
    </div>
</section>
<!-- end detail tab -->

<script src="./../js/bootstrap.bundle.min.js"></script>

<?php
include "inc/footer.php";
?>