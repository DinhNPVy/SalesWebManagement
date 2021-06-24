<?php
include_once 'inc/header.php';
?>
<link rel="stylesheet" href="Store/css/style.css">
<div class="container">
    <div class="row" style="    margin-right: -10px;margin-left: -10px;">
        <div class="xv-product-slides grid-view products" data-thumbnail="figure .xv-superimage" data-product=".xv-product-unit">
            <div class="row">
                <ul class="breadcrumb">
                    <li><a href="newproduct.php">
                            <span style="font-size: 30px;">Dell</span>
                        </a></li>
                    <!-- <li><a href="#">Products</a></li> -->

                </ul>

                <?php
                $getLastedDell = $product->getLastedDell();
                if ($getLastedDell) {
                    while ($result_new = $getLastedDell->fetch_assoc()) {
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
<div class="container">
    <div class="row" style="    margin-right: -10px;margin-left: -10px;">
        <div class="xv-product-slides grid-view products" data-thumbnail="figure .xv-superimage" data-product=".xv-product-unit">
            <div class="row">
                <ul class="breadcrumb">
                    <li><a href="">
                            <span style="font-size: 30px;">Iphone</span>
                        </a></li>
                    <!-- <li><a href="#">Products</a></li> -->

                </ul>

                <?php
                $getLastedApple = $product->getLastedIphone();
                if ($getLastedApple) {
                    while ($result_new = $getLastedApple->fetch_assoc()) {
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
<div class="container">
    <div class="row" style="    margin-right: -10px;margin-left: -10px;">
        <div class="xv-product-slides grid-view products" data-thumbnail="figure .xv-superimage" data-product=".xv-product-unit">
            <div class="row">
                <ul class="breadcrumb">
                    <li><a href="newproduct.php">
                            <span style="font-size: 30px;">SamSung</span>
                        </a></li>
                    <!-- <li><a href="#">Products</a></li> -->

                </ul>


                <?php
                $getLastedSamsung = $product->getLastedSamsung();
                if ($getLastedSamsung) {
                    while ($result_new = $getLastedSamsung->fetch_assoc()) {
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
<div class="container">
    <div class="row" style="    margin-right: -10px;margin-left: -10px;">
        <div class="xv-product-slides grid-view products" data-thumbnail="figure .xv-superimage" data-product=".xv-product-unit">
            <div class="row">
                <ul class="breadcrumb">
                    <li><a href="newproduct.php">
                            <span style="font-size: 30px;">Xiaomi</span>
                        </a></li>
                    <!-- <li><a href="#">Products</a></li> -->

                </ul>

                <?php
                $getLastedXiaomi = $product->getLastedXiaomi();
                if ($getLastedXiaomi) {
                    while ($result_new = $getLastedXiaomi->fetch_assoc()) {
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






<div class="header_bottom_right_images">
    <section class="slider">
        <div class="flexslider">
            <ul class="slides">
                <?php
                $getSlider = $product->show_slider();
                if ($getSlider) {
                    while ($result = $getSlider->fetch_assoc()) {
                ?>
                        <li><img src="admin/uploads/<?php echo $result["slider_image"] ?>" /></li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>
    </section>
</div>

<div class="clear"></div>
</div>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <div class="carousel-inner" role="listbox">
        <?php
        $get_slider = $product->show_slider();
        if ($get_slider) {
            while ($result_slider = $get_slider->fetch_assoc()) {


        ?>
                <div class="carousel-item active">
                    <img src="admin/uploads/<?php echo $result_slider["slider_image"] ?>">
                </div>
        <?php
            }
        }
        ?>

    </div>


</body>

</html>

<body> -->