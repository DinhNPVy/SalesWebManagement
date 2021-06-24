<?php
include 'inc/header.php';
?>


<!-- STORY -->
<section>
    <div class="fluid-container">
        <div class="row text-center">
            <div class="col-lg-12">
                <div class="card position-relative" style="background-image: url(img/title.png); margin:18px 0px 0px;padding:50px 0;background-position:center;background-size:cover;background-repeat:no-repeat;border-radius:4px">
                    <div class=" d-flex align-items-center justify-content-center">
                        <div class="">
                            <h1 class="fw-medium">News & Stories</h1>
                            <h5 class="fw-normal lh-base">Found and base in Ho Chi Minh City University of Education, We are the Student group, design and branding <br> with partners worldwide.</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'inc/slider_1.php';
?>

<body>

    <div class="container">
        <div class="row" style="    margin-right: -10px;margin-left: -10px;">
            <div class="xv-product-slides grid-view products" data-thumbnail="figure .xv-superimage" data-product=".xv-product-unit">
                <div class="row">
                    <ul class="">
                        <li><a href="newproduct.php"><i class="fas fa-award" style="color: red; font-size:40px"></i>
                                <span style="font-size: 30px;">New Products</span>
                            </a>

                            <span class="phantrang" style="padding-left: 60%;">
                                <?php
                                $productNew = $product->get_all_product();
                                $product_count = mysqli_num_rows($productNew);
                                $product_button = ceil($product_count / 12);
                                $i = 1;
                                echo '<span>Page: </span>';
                                for ($i = 1; $i <= 6; $i++) {
                                    echo '<a style="margin:0 5px;" href="index.php?page=' . $i . '">' . $i . '</a>';
                                }

                                ?>
                            </span>
                        </li>
                        <!-- <li><a href="#">Products</a></li> -->

                    </ul>
                    <!-- <h2 style="color: red;">New Products</h2> -->
                    <?php
                    $productNew = $product->getProductNew();
                    if ($productNew) {
                        while ($result_new = $productNew->fetch_assoc()) {
                    ?>
                            <div class="col-md-3">
                                <div class="xv-product-unit">
                                    <div class="xv-product ">
                                        <figure>
                                            <a href="details.php?productid=<?php echo $result_new["productId"] ?>"><img class="xv-superimage" src="admin/uploads/<?php echo $result_new["image"] ?>" alt="" /></a>
                                            <figcaption>
                                                <ul class="style1" style="font-size: 13.4px;">
                                                    <li><a data-qv-tab="#qvt-wishlist" class="btn-cart flytoQuickView btn-square btn-blue" href="details.php?productid=<?php echo $result_new["productId"] ?>"><i class="fa fa-eye"></i></a></li>

                                                </ul>
                                            </figcaption>
                                        </figure>
                                        <div class="xv-product-content">
                                            <h3><a href="details.php?productid=<?php echo $result_new["productId"] ?>"><?php echo $result_new["productName"] ?></a></h3>
                                            <p>Aenean sollicitudin, nec sagittis sem lorem quist bibe dum auctor, nisi elit consequat ipsum. Duis sed odio sit amet nibh vulputate cursus a nec.</p>

                                            <ul class="extra-links">
                                                <li><a href="#"><i class="fa fa-heart"></i>Wishlist</a></li>
                                                <li><a href="#"><i class="fa fa-exchange"></i>Compare</a></li>
                                                <li><a href="#"><i class="fa fa-expand"></i>Expand</a></li>
                                            </ul>
                                            <!--ul-->
                                            <div class="xv-rating stars-5"></div>
                                            <span class="xv-price"><?php echo $fm->format_currency($result_new["price"]) ?></span>
                                            <!-- <a data-qv-tab="#qvt-cart" href="#" class="product-buy flytoQuickView">Buy</a> -->
                                        </div>
                                        <!--xv-product-content-->
                                    </div>
                                    <!--xv-product(list-view)-->
                                </div>
                            </div>

                    <?php
                        }
                    }
                    ?>
                </div>


            </div>
        </div>
    </div>
</body>

<body>

    <div class="container">
        <div class="row" style="    margin-right: -10px;margin-left: -10px;">
            <div class="xv-product-slides grid-view products" data-thumbnail="figure .xv-superimage" data-product=".xv-product-unit">
                <div class="row">
                    <ul class="">
                        <li><a href="featureproduct.php"><i class="fas fa-bullseye" style="font-size:40px; color:chartreuse;"></i>
                                <span style="font-size: 30px;">Feature Products</span>
                            </a>
                            <span class="phantrang" style="padding-left: 55%;">
                                <?php
                                $productNew = $product->get_all_product();
                                $product_count = mysqli_num_rows($productNew);
                                $product_button = ceil($product_count / 4);
                                $i = 1;
                                echo '<span>Page: </span>';
                                for ($i = 1; $i <= 6; $i++) {
                                    echo '<a style="margin:0 5px;" href="index.php?page=' . $i . '">' . $i . '</a>';
                                }

                                ?>
                            </span>
                        </li>
                        <!-- <li><a href="#">Products</a></li> -->

                    </ul>
                    <?php
                    $productNew = $product->getProductFeature();
                    if ($productNew) {
                        while ($result_new = $productNew->fetch_assoc()) {
                    ?>
                            <div class="col-md-3">
                                <div class="xv-product-unit">
                                    <div class="xv-product ">
                                        <figure>
                                            <a href="details.php?productid=<?php echo $result_new["productId"] ?>"><img class="xv-superimage" src="admin/uploads/<?php echo $result_new["image"] ?>" alt="" /></a>
                                            <figcaption>
                                                <ul class="style1" style="font-size: 13.4px;">
                                                    <li><a data-qv-tab="#qvt-wishlist" class="btn-cart flytoQuickView btn-square btn-blue" href="details.php?productid=<?php echo $result_new["productId"] ?>"><i class="fa fa-eye"></i></a></li>

                                                </ul>
                                            </figcaption>
                                        </figure>
                                        <div class="xv-product-content">
                                            <h3><a href="details.php?productid=<?php echo $result_new["productId"] ?>"><?php echo $result_new["productName"] ?></a></h3>
                                            <p>Aenean sollicitudin, nec sagittis sem lorem quist bibe dum auctor, nisi elit consequat ipsum. Duis sed odio sit amet nibh vulputate cursus a nec.</p>

                                            <ul class="extra-links">
                                                <li><a href="#"><i class="fa fa-heart"></i>Wishlist</a></li>
                                                <li><a href="#"><i class="fa fa-exchange"></i>Compare</a></li>
                                                <li><a href="#"><i class="fa fa-expand"></i>Expand</a></li>
                                            </ul>
                                            <!--ul-->
                                            <div class="xv-rating stars-5"></div>
                                            <span class="xv-price"><?php echo $fm->format_currency($result_new["price"]) ?></span>
                                            <!-- <a data-qv-tab="#qvt-cart" href="#" class="product-buy flytoQuickView">Buy</a> -->
                                        </div>
                                        <!--xv-product-content-->
                                    </div>
                                    <!--xv-product(list-view)-->
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

<?php
include 'inc/sliderbar.php';
?>




<body>

    <div class="container">
        <div class="row" style="    margin-right: -10px;margin-left: -10px;">
            <div class="xv-product-slides grid-view products" data-thumbnail="figure .xv-superimage" data-product=".xv-product-unit">
                <div class="row">
                    <ul class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-home" style="font-size:40px"></i>
                                <span style="font-size: 30px;">All Products</span>
                            </a></li>
                        <!-- <li><a href="#">Products</a></li> -->

                    </ul>
                    <!-- <h2>All Products</h2> -->
                    <?php
                    $productNew = $product->get_all_product();
                    if ($productNew) {
                        while ($result_new = $productNew->fetch_assoc()) {
                    ?>
                            <div class="col-md-3">
                                <div class="xv-product-unit">
                                    <div class="xv-product ">
                                        <figure>
                                            <a href="details.php?productid=<?php echo $result_new["productId"] ?>"><img class="xv-superimage" src="admin/uploads/<?php echo $result_new["image"] ?>" alt="" /></a>
                                            <figcaption>
                                                <ul class="style1" style="font-size: 13.4px;">
                                                    <li><a data-qv-tab="#qvt-wishlist" class="btn-cart flytoQuickView btn-square btn-blue" href="details.php?productid=<?php echo $result_new["productId"] ?>"><i class="fa fa-eye"></i></a></li>

                                                </ul>
                                            </figcaption>
                                        </figure>
                                        <div class="xv-product-content">
                                            <h3><a href="details.php?productid=<?php echo $result_new["productId"] ?>"><?php echo $result_new["productName"] ?></a></h3>
                                            <p>Aenean sollicitudin, nec sagittis sem lorem quist bibe dum auctor, nisi elit consequat ipsum. Duis sed odio sit amet nibh vulputate cursus a nec.</p>

                                            <ul class="extra-links">
                                                <li><a href="#"><i class="fa fa-heart"></i>Wishlist</a></li>
                                                <li><a href="#"><i class="fa fa-exchange"></i>Compare</a></li>
                                                <li><a href="#"><i class="fa fa-expand"></i>Expand</a></li>
                                            </ul>
                                            <!--ul-->
                                            <div class="xv-rating stars-5"></div>
                                            <span class="xv-price"><?php echo $fm->format_currency($result_new["price"]) ?></span>
                                            <!-- <a data-qv-tab="#qvt-cart" href="#" class="product-buy flytoQuickView">Buy</a> -->
                                        </div>
                                        <!--xv-product-content-->
                                    </div>
                                    <!--xv-product(list-view)-->
                                </div>
                            </div>


                    <?php
                        }
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
</body>

<?php
include 'inc/footer.php';
?>