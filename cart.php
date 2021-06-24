<?php
include 'inc/header.php';


?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="././admin/css/layout.css">
<link rel="stylesheet" href="css/bootstrap.css.map">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/styledetails.css">
<link rel="stylesheet" href="css/style.min.css">
<link rel="stylesheet" href="css/materialdesignicons.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/styleprofile.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">



<?php

if (isset($_GET['cartid'])) {
    $cartid = $_GET['cartid'];
    $delProductCart = $ct->del_ProductCart($cartid);
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $cartId = $_POST['cartId'];
    $quantity = $_POST['quantity'];
    $update_quantityCart = $ct->update_quantity_Cart($quantity, $cartId);
    if ($quantity <= 0) {
        $delProductCart = $ct->del_ProductCart($cartId);
    }
}
?>
<?php
if (!isset($_GET['id'])) {
    echo "<meta http-equiv='refresh' content='0; URL=?id=live'>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="././admin/css/layout.css">
</head>

<div class="main">
    <div class="container">
        <div class="cartoption">
            <div class="cartpage">
                <h3>Your Cart</h3>
                <?php
                if (isset($update_quantityCart)) {
                    echo $update_quantityCart;
                }
                ?>
                <?php
                if (isset($delProductCart)) {
                    echo $delProductCart;
                }
                ?>
                <section class="section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="border-bottom">
                                    <nav class="pb-sm-3 pb-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
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

                                                <th scope="col" class="fw-medium text-uppercase mt-2">
                                                    Action
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
                                                        <td><?php echo $fm->format_currency($result['price']) ?></td>
                                                        <td>
                                                            <form action="" method="post">
                                                                <input class="col-lg-12 mb-2 form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" type="hidden" name="cartId" value="<?php echo $result['cartId'] ?>" />
                                                                <input class="col-lg-12 mb-2 form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" type="number" min="0" name="quantity" value="<?php echo $result['quantity'] ?>" />
                                                                <input class="col-lg-12 mb-2 form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" style="color: green;" type="submit" name="submit" value="Update" />

                                                                <!-- <select class="form-select border" id="autoSizingSelect">

                                                                    <option name="quantity" value="<?php echo $result['quantity'] ?>"></option>
                                                                </select> -->


                                                            </form>

                                                        </td>
                                                        <td>
                                                            <?php
                                                            $total = $result['price'] * $result['quantity'];
                                                            echo $fm->format_currency($total);
                                                            ?>
                                                        <td><a href="?cartid=<?php echo $result['cartId'] ?>">Remove</a></td>
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

                                </div>
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
                                                        <h5 class="fs-15 mb-0 fw-medium">Price :</h5>
                                                    </li>
                                                    <li class="list-inline-item float-end"><?php

                                                                                            echo $fm->format_currency($subtotal);
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
                                                        <h5 class="fs-15 mb-0 fw-medium">Vat : 20% (<?php echo $fm->format_currency($vat = $subtotal * 0.2) ?>)</h5>
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
                                                            echo $fm->format_currency($total);
                                                            ?>
                                                        </h5>
                                                    </li>
                                                    <li class="list-inline-item fs-16 fw-medium float-end">
                                                        <?php

                                                        ?>
                                                    </li>
                                                </ul>

                                                <a href="payment.php" class="btn btn-primary mt-3 float-end">Proceed To Checkout</a>

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
                </section>

            </div>

        </div>

    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

</html>
<?php
include 'inc/footer.php';
?>