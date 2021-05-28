<?php
include_once 'inc/header.php';
?>

<?php
if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
    $customer_id = Session::get("customer_id");
    $insertOrder = $ct->insertOrder($customer_id);
    $delCart = $ct->del_all_dataCart();
    //'<script>window.loaction = success.php</script>';
    echo '<marquee class="col-lg-12 mb-2" style="margin-left: 0;margin-top: 5px;"><a href="success.php" class="btn btn-success" value="Success">Success <br> <span style="font-size:13px">(Click me!)</span></a></marquee>';
    @header('Location:success.php');
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $quantity = $_POST["quantity"];
    $addCart = $ct->addToCart($quantity, $id);
}


?>
<!DOCTYPE html>
<link rel="stylesheet" href="css/styleprofile.css">
<html lang="en">


<section class="section">
    <form action="" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="border-bottom">
                        <nav class="pb-sm-3 pb-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="index.html">Cart</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Payment Methods</li>
                                <li class="breadcrumb-item active" aria-current="page">Offline Payment</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="table-responsive mt-4">
                        <table class="table caption-top table-borderless pro-table">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col" class="fw-medium text-uppercase mt-2">
                                        Products
                                    </th>
                                    <th scope="col" class="fw-medium text-uppercase mt-2">
                                        Image
                                    </th>
                                    <th scope="col" class="fw-medium text-uppercase mt-2">
                                        Price
                                    </th>
                                    <th scope="col" class="fw-medium text-uppercase mt-2">
                                        Quantity
                                    </th>
                                    <th scope="col" class="fw-medium text-uppercase mt-2">
                                        Total Price
                                    </th>


                                </tr>
                                <?php
                                $get_product_cart = $ct->getToCart();
                                if ($get_product_cart) {
                                    $subtotal = 0;
                                    $qty = 0;
                                    while ($result = $get_product_cart->fetch_assoc()) {

                                ?>
                                        <tr>

                                            <td><?php echo $result['productName'] ?></td>
                                            <td><img height="150px" src="admin/uploads/<?php echo $result['image'] ?>" alt=""></td>
                                            <td><?php echo $result['price'] . ' ' . 'VNĐ' ?></td>
                                            <td>
                                                <form action="" method="post">

                                                    <?php echo $result['quantity'] ?>


                                                    <!-- <select class="form-select border" id="autoSizingSelect">

                                                                    <option name="quantity" value="<?php echo $result['quantity'] ?>"></option>
                                                                </select> -->


                                                </form>

                                            </td>
                                            <td>
                                                <?php
                                                @$total = $result['price'] * $result['quantity'];
                                                echo $total . ' ' . 'VNĐ';
                                                ?>

                                            </td>
                                        </tr>

                                <?php
                                        $subtotal += $total;
                                        $qty = $qty + $result['quantity'];
                                    }
                                }

                                ?>

                            </thead>

                        </table>
                        <?php
                        $check_cart = $ct->check_cart();
                        if ($check_cart) {

                        ?>
                            <div class="row border-top">


                                <div class="col-lg-6 mt-4">
                                    <div class="mb-3 row g-2 align-items-center">
                                        <!-- <label for="inputCode" class="col-sm-3 col-3 col-form-label text-uppercase fw-medium"><i class="mdi mdi-tag-multiple fs-18 align-middle"></i> Coupens</label>
                                                <div class="col-sm-6 col-5">
                                                    <input type="text" class="form-control border" id="inputCode">
                                                </div> -->
                                        <!-- <div class="col-sm-3 col-4">
                                                    <a href="payment.php" class="btn btn-primary">Check</a>
                                                </div> -->
                                    </div>
                                </div>
                                <div class="col-lg-4 offset-lg-2 mt-4">
                                    <div>
                                        <ul class="list-unstyled list-inline border-bottom py-3 mb-0">
                                            <li class="list-inline-item">
                                                <h5 class="fs-15 mb-0 fw-medium">Price : </h5>
                                            </li>
                                            <li class="list-inline-item float-end"><?php

                                                                                    echo $subtotal . ' ' . 'VNĐ';
                                                                                    Session::set('sum', $subtotal);
                                                                                    Session::set('qty', $qty);
                                                                                    ?></li>
                                        </ul>
                                        <ul class="list-unstyled list-inline border-bottom py-3 mb-0">
                                            <li class="list-inline-item">
                                                <h5 class="fs-15 mb-0 fw-medium">Delivery Charge :</h5>
                                            </li>
                                            <li class="list-inline-item float-end text-success">Free</li>
                                        </ul>
                                        <ul class="list-unstyled list-inline border-bottom py-3 mb-0">
                                            <li class="list-inline-item">
                                                <h5 class="fs-15 mb-0 fw-medium">Vat : 20% (<?php echo $vat = $subtotal * 0.2 . ' ' . 'VNĐ' ?>)</h5>
                                            </li>
                                            <li class="list-inline-item float-end">
                                                <?php

                                                ?>
                                            </li>
                                        </ul>
                                        <ul class="list-unstyled list-inline py-3 mb-0">
                                            <li class="list-inline-item">
                                                <h5 class="fs-16 mb-0 fw-semibold">Total :
                                                    <?php
                                                    $vat = $subtotal * 0.2;
                                                    $total = $subtotal + $vat;
                                                    echo $total . ' ' . 'VNĐ';
                                                    ?>
                                                </h5>
                                            </li>
                                            <li class="list-inline-item fs-16 fw-medium float-end">
                                                <?php

                                                ?>
                                            </li>
                                        </ul>

                                        <a href="?orderid=order" class="btn btn-primary mt-4 float-end">Order Now</a>

                                    </div>


                                </div>
                            <?php
                        } else {
                            echo 'Your Cart is Empty. <br> Please Shopping Now!';
                        }
                            ?>
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</section>

<div class="infor" style="text-align: center;">
    <i class="fa fa-bullseye text-dark"></i>
    <i class="fa fa-bullseye text-primary"></i>
    <i class="fa fa-bullseye text-secondary"></i>
    <i class="fa fa-bullseye text-success"></i>
    <i class="fa fa-bullseye"></i>
    <i class="fa fa-bullseye text-warning"></i>
</div>
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
// if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
//     $quantity = $_POST["quantity"];
//     $addCart = $ct->addToCart($quantity, $id);
// }

?>

<section class="section" style="background-image: url(img/profile.png);  margin:10px 0px 0px;padding:130px 0;background-position:center;background-size:cover;background-repeat:no-repeat;border-radius:4px">


    <div class="container">
        <div class="heading">
            <span>USER <br>
                PROFILE <br>
                CARD</span>
        </div>

        <?php
        $id = Session::get('customer_id');
        $get_customer = $cust->show_customer($id);
        if ($get_customer) {
            while ($result = $get_customer->fetch_assoc()) {


        ?>


                <div class="card">
                    <!-- <img src="/w3images/team2.jpg" alt="John" style="width:100%"> -->
                    <h1><?php echo $result['name'] ?></h1>
                    <p class="title"><?php echo $result['address'] ?></p>
                    <p><?php echo $result['phone'] ?></p>
                    <p><?php echo $result['email'] ?></p>
                    <div style="margin: 24px 0;">
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                    </div>
                    <p><button>Contact</button></p>

                </div>
                <div class="icon">
                    <a href="updateprofile.php"><i class="fas fa-user-edit" style="color: black;"></i></a>
                </div>
        <?php

            }
        }
        ?>
    </div>

</section>

<!-- end detail tab -->

</html>
<script src="js/thatim.js"></script>
<?php
include "inc/footer.php";
?>