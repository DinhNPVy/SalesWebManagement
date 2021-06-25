<?php
include_once 'inc/header.php';
?>

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



<?php


$login_check = Session::get("customer_signin");

if ($login_check == false) {
    '<script>window.location=login.php</script>';
}
$ct = new cart();

if (isset($_GET['confirmid'])) {
    $id = $_GET['confirmid'];

    $time = $_GET['time'];
    $price = $_GET['price'];
    $shifted_confirmid = $ct->ShiftedConfirmid($id, $time, $price);
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
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Ordered</li>

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
                                        Date
                                    </th>
                                    <th scope="col" class="fw-medium text-uppercase mt-2">
                                        Status
                                    </th>
                                    <th scope="col" class="fw-medium text-uppercase mt-2">
                                        Action
                                    </th>
                                </tr>
                                <?php
                                $customer_id = Session::get("customer_id");
                                $get_cart_ordered  = $ct->getCartOrdered($customer_id);
                                if ($get_cart_ordered) {
                                    $qty = 0;
                                    while ($result = $get_cart_ordered->fetch_assoc()) {


                                ?>
                                        <tr>

                                            <td><?php echo $result['productName'] ?></td>
                                            <td><img height="150px" src="admin/uploads/<?php echo $result['image'] ?>" alt=""></td>
                                            <td><?php echo $fm->format_currency($result['price']) ?></td>
                                            <td>

                                                <?php echo $result['quantity'] ?>
                                            </td>
                                            <td>
                                                <?php echo $fm->formatDate($result['date_order']) ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($result['status'] == '0') {
                                                    echo 'Pending';
                                                } else if ($result['status'] == 1) {
                                                ?>
                                                    <span>Delivered</span>

                                                <?php
                                                } else {
                                                    echo 'Received';
                                                }
                                                ?>
                                            </td>
                                            <?php
                                            if ($result['status'] == '0') {
                                            ?>
                                                <td><?php echo 'N/A'  ?></td>
                                            <?php

                                            } elseif ($result['status'] == 1) {
                                            ?>
                                                <td> <a href="?confirmid=<?php echo $customer_id ?>&price=<?php echo ($result['price']) . ''  ?>&time=<?php echo $result['date_order'] ?> ">Confirmed</a></td>
                                            <?php
                                            } else {

                                            ?>
                                                <td>
                                                    <?php echo 'Received' ?>
                                                </td>

                                            <?php
                                            }
                                            ?>
                                        </tr>

                                <?php

                                    }
                                }

                                ?>

                            </thead>

                        </table>


                    </div>
                </div>

            </div>
        </div>
    </form>
</section>



</html>
<script src="js/thatim.js"></script>
<br><br><br><br><br><br><br><br><br><br>
<?php
include "inc/footer.php";
?>