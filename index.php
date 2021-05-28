<?php

include 'inc/header.php'; ?>
<?php
include "inc/sliderbar.php";
?>
<?php
// echo session_id();
?>
<link rel="stylesheet" href="css/styleslider.css">

<body>

    <div class="col-md-12">
        <div class="row">


            <h3 style="color: red;">New Products</h3>
            <?php
            $productNew = $product->getProductNew();
            if ($productNew) {
                while ($result_new = $productNew->fetch_assoc()) {
            ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="product-item mt-4">
                            <div class="product-img rounded border position-relative">
                                <a href="details.php"><img height="300px" src="admin/uploads/<?php echo $result_new["image"] ?>" /> </a>
                                <!-- <span class="badge bg-primary position-absolute top-0 start-0 py-2 mt-2 ms-2">-20%</span> -->
                                <div class="hover-content text-center bg-white position-absolute top-50 start-50 translate-middle w-100 py-2">
                                    <a href="cart.php"><i class="fa fa-shopping-cart fs-22 me-3 pe-3 fw-bolder pro-icon border-end"></i></a>
                                    <a href="details.php?productid=<?php echo $result_new["productId"] ?>"><i class="fa fa-eye fs-22 me-3 pe-3 fw-bolder pro-icon border-end active"></i></a>
                                    <a href="details.php?productid=<?php echo $result_new["productId"] ?>" class="details"><i class="fa fa-heart fs-22 fw-bolder pro-icon"></i></a>
                                </div>
                            </div>
                            <div class="pro-content my-3">
                                <div class="price d-inline-block">
                                    <ins class="pe-1 fs-15 fw-semibold text-decoration-none"><?php echo $fm->validation($result_new["price"] . " " . "VNĐ") ?></ins>
                                    <!-- <del class="text-muted fs-15">$30.00</del> -->
                                    <div class="rating d-inline-block ms-5 ps-4">
                                        5.0<i class="fa fa-star" style="color: yellow;"></i>

                                    </div>
                                </div>
                                <a href="#">
                                    <h5 class="text-muted fw-normal lh-base my-1"><?php echo $result_new["productName"] ?></h5>
                                </a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

        </div>
    </div>
</body>
<div class="clear"></div>

<body>


    <div class="col-md-12">
        <div class="row">
            <h3 style="color: green;">Feature Products</h3>
            <?php
            $productFeathered = $product->getProductFeathered();

            if ($productFeathered) {
                while ($result = $productFeathered->fetch_assoc()) {
            ?>

                    <div class="col-lg-4 col-md-6">
                        <div class="product-item mt-4">
                            <div class="product-img rounded border position-relative">
                                <a href="details.php"><img height="300px" src="admin/uploads/<?php echo $result["image"] ?>" /> </a>
                                <!-- <span class="badge bg-primary position-absolute top-0 start-0 py-2 mt-2 ms-2">-20%</span> -->
                                <div class="hover-content text-center bg-white position-absolute top-50 start-50 translate-middle w-100 py-2">
                                    <a href="cart.php"><i class="fa fa-shopping-cart fs-22 me-3 pe-3 fw-bolder pro-icon border-end"></i></a>
                                    <a href="details.php?productid=<?php echo $result_new["productId"] ?>"><i class="fa fa-eye fs-22 me-3 pe-3 fw-bolder pro-icon border-end active"></i></a>
                                    <a href="details.php?productid=<?php echo $result["productId"] ?>" class="details"><i class="fa fa-heart fs-22 fw-bolder pro-icon"></i></a>
                                </div>
                            </div>
                            <div class="pro-content my-3">
                                <div class="price d-inline-block">
                                    <ins class="pe-1 fs-15 fw-semibold text-decoration-none"><?php echo $fm->validation($result["price"] . " " . "VNĐ") ?></ins>
                                    <!-- <del class="text-muted fs-15">$30.00</del> -->
                                    <div class="rating d-inline-block ms-5 ps-4">
                                        5.0<i class="fa fa-star" style="color: yellow;"></i>

                                    </div>
                                </div>
                                <a href="#">
                                    <h5 class="text-muted fw-normal lh-base my-1"><?php echo $result["productName"] ?></h5>
                                </a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</body>
<script src="./../js/bootstrap.bundle.min.js"></script>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include "inc/footer.php"; ?>