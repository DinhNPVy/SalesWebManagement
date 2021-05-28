<?php
include 'inc/header.php';
?>
<?php
// if (isset($_GET['orderid']) || $_GET['orderid'] == 'order') {
//     $customer_id = Session::get("customer_id");
//     $insertOrder = $ct->insertOrder($customer_id);
//     $delCart = $ct->del_all_dataCart();
//     // '<script>window.loaction = success.php</script>';
//     @header("Location: success.php");
// }
?>

<div class="container">
    <h1 style="color: green;">Success Order</h1>
    <?php
    $customer_id = Session::get("customer_id");
    $get_amount = $ct->getAmountPrice($customer_id);
    if ($get_amount) {
        $amount = 0;
        while ($result = $get_amount->fetch_assoc()) {
            $price = $result['price'];
            $amount += $price;
        }
    }
    ?>
    <p>Total Price You Have Bought From My Website: <?php $vat = $amount * 0.2;
                                                    $total = $vat + $amount;
                                                    echo $total;  ?> </p>
    <p>We will contact as soon as possiable. Please see your order details here <a href="orderdetail.php">Click Here!</a></p>
</div>

<?php
include "inc/footer.php";
?>