<?php
include_once 'inc/header.php';
?>

<?php
if (!isset($_GET['productid']) || $_GET['productid'] == NULL) {
    echo "<script> window.location = '404.php' </script>";
} else {
    $productid = $_GET["productid"];
}
$customer_id = Session::get('customer_id');
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['compare'])) {

    $productid = $_POST["productid"];
    $insertCompare = $product->insertCompare($productid, $customer_id);
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $quantity = $_POST["quantity"];
    $insertCart = $ct->addToCart($quantity, $productid);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['wishlist'])) {
    $productid = $_POST["productid"];
    $insertWishlist = $product->insertWishlist($productid, $customer_id);
}

if (isset($_POST['review_submit'])) {
    $review = $cust->insert_review();
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

    <link rel="stylesheet" href="css/owlcarousel.css">
    <link rel="stylesheet" href="css/flags.css">
    <link rel="stylesheet" href="css/main.css">


</head>
<div class="container">
    <div class="single-product-detail pt-60 pb-30">
        <div class="row">
            <div class="col-xs-12 col-md-6">

                <div class="product-slider-wrap text-center shadow-around">
                    <form action="" method="post">
                        <div class="product-slide">
                            <?php
                            $productDetail = $product->getProductDetail($productid);

                            if ($productDetail) {
                                while ($result_details = $productDetail->fetch_assoc()) {
                            ?>
                                    <figure>
                                        <img src="admin/uploads/<?php echo $result_details["image"] ?>" alt="">
                                    </figure>
                        </div>
                        <!--product-slide-->
                        <div class="product-slider styleDetail">
                            <!-- <div class="detail-slider">
                            <div class="owl-carousel slider_controls5" data-dots="false" data-prev="fa fa-angle-left" data-next="fa fa-angle-right" data-margin="20" data-slides="4" data-slides-md="3" data-slides-sm="1" data-loop="false" data-nav="true">
                                <figure class="border-around">
                                    <a href="#"><img src="assets/img/detail-product-slider-1.png" alt=""></a>
                                </figure>

                                <figure class="border-around">
                                    <a href="#"><img src="assets/img/detail-product-slider-1.png" alt=""></a>
                                </figure>


                                <figure class="border-around">
                                    <a href="#"><img src="assets/img/detail-product-slider-1.png" alt=""></a>
                                </figure>
                                <figure class="border-around">
                                    <a href="#"><img src="assets/img/detail-product-slider-1.png" alt=""></a>
                                </figure>
                                <figure class="border-around">
                                    <a href="#"><img src="assets/img/detail-product-slider-1.png" alt=""></a>
                                </figure>
                            </div>

                        </div> -->
                            <!--product-slider-->
                        </div>
                </div>
                <!--column-6-->

            </div>
            <!--column-6-->
            <div class="col-xs-12 col-md-6">
                <div class="single-product-overview">
                    <h2><?php echo $result_details["productName"] ?></h2>
                    <div class="xv-rating stars-5"></div>
                    <ul class="review">
                        <li>15 Review(s)&emsp;</li>
                        <li><a href="#">Make a Review</a></li>
                    </ul>
                    <p class="no-mar"> <?php echo $fm->textShorten($result_details['product_desc'], 500) ?></p>
                    <ul class="product-description mt-35 mb-35">
                        <span>Availability</span>: <?php
                                                    if ($result_details['type'] == 0) {
                                                        echo 'Feature';
                                                    } else {
                                                        echo 'Non-Feature';
                                                    }
                                                    ?>

                    </ul>
                    <div class="cart-options">
                        <a href="#" class="price"><span> <?php echo $fm->format_currency($result_details["price"]) ?></span> </a>
                        <ul class="cart-buttons mt-45 clearfix">
                            <!-- <li class="btn-color-opt">

                                <div class="custome-select">-->

                            <p>Select a Category <b class="fa fa-caret-down"></b></p>
                            <?php
                                    $getall_category = $cate->show_category_fontend();
                                    if ($getall_category) {
                                        while ($result_allcat = $getall_category->fetch_assoc()) {

                            ?>

                                    <li btn-color-opt>
                                        <a href="productbycat.php?catid=<?php echo $result_allcat['catId'] ?>"><?php echo $result_allcat['catName'] ?></a>
                                    </li>


                            <?php
                                        }
                                    }

                            ?>

                            <!-- </div> -->

                            </li>
                            <li>
                                <div class="quantity-control">
                                    <!-- <span class="btn-cart btn-square btn-plus btn-qty"><i class="fa fa-plus"></i></span> -->
                                    <input type="number" data-invalid="Enter valid quantity" data-maxalert="Maximum limit reached" data-max="10" data-minalert="Minimum limit reached" name="quantity" value="1" min="1">
                                    <!-- <span class="btn-cart btn-square btn-minus btn-qty"><i class="fa fa-minus"></i></span> -->
                                </div>
                            </li>

                        </ul>


                        <!--cart-buttons-->
                        <p></p>
                        <?php
                                    if (isset($insertCart)) {
                                        echo '<span style="color: red; font-size: 18px">The product already exists in the shopping cart</span>';
                                    }
                        ?></p>
                        <input type="submit" class="btn btn-continue" name="submit" value="Add To Cart"></input>
                        <div class="hover-content ">
                            <form action=" " method="POST">
                                <input type="hidden" class="btn btn-primary me-2 my-2" name="productid" value="<?php echo $result_details['productId'] ?>" />
                                <i class="fas fa-heart" style="color: hotpink;"></i><i class="fs-18 fw-bolder pro-icon align-middle"></i> <a href="?wlist=<?php echo $result_details['productId'] ?>"> </i></a>
                                <?php
                                    $login_check = Session::get('customer_signin');
                                    if ($login_check) {
                                        echo ' <input type="submit" class="btn btn-primary me-2 my-2" name="wishlist" value="Yêu thích">';
                                    } else {
                                        echo '';
                                    }
                                ?>
                                <?php
                                    if (isset($insertWishlist)) {
                                        echo $insertWishlist;
                                    }
                                ?>

                            </form>

                            <form action=" " method="POST">
                                <input type="hidden" class="btn btn-primary me-2 my-2" name="productid" value="<?php echo $result_details['productId'] ?>" />
                                <i class="fab fa-asymmetrik" style="color: greenyellow;"></i><i class="fs-18 fw-bolder pro-icon align-middle"></i><a href="?compare=<?php echo $result_details['productId'] ?>"></a>
                                <?php
                                    $login_check = Session::get('customer_signin');
                                    if ($login_check) {
                                        echo ' <input type="submit" class="btn btn-primary me-2 my-2" name="compare" value="So Sánh">';
                                    } else {
                                        echo '';
                                    }
                                ?>
                                <?php
                                    if (isset($insertCompare)) {
                                        echo $insertCompare;
                                    }
                                ?>

                            </form>


                        </div>
                        <!-- <a class="btn btn-continue">ADD TO CART</a> -->
                    </div>


                    <!--cart-options-->
                </div>
                <!--single-product-overview-->
            </div>
            </form>
            <!--column-6-->
        </div>
        <!--single-product-detail-->
        <div class="tabs-pane mt-60">
            <ul class="tab-sections">
                <li class="active"><a href="#tab01" class="btn-cart">Description</a></li>

            </ul>
            <div class="tab-panels">
                <div id="tab01" class="tab-content active">
                    <p> <?php echo $fm->textShorten($result_details['product_desc'], 10000) ?>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
                                }
                            }
?>

<div>
    <h4 class="mt-5 mb-3" style="padding-left: 8.5%;">Add Your Review: <span><?php
                                                                                if (isset($review)) {
                                                                                    echo $review;
                                                                                }
                                                                                ?>
        </span>
    </h4>
    <form action="" method="post">
        <p><input type="hidden" value="<?php echo $productid ?>" name="product_id_review"></p>
        <div class="row g-4 mb-2">
            <div class="col-lg-10" style="padding-left: 10%;">
                <div class="form-floating mb-3">
                    <label class="text-muted">Your name</label>
                    <input type="text" name="reviewname" class="form-control" placeholder="Your name">

                </div>
            </div>
            <!-- <div class="col-lg-4">
                <div class="form-floating mb-3">
                    <label class="text-muted">Email address</label>
                    <input type="email" name="email" class="form-control" placeholder="Your email">

                </div>
            </div> -->
        </div>
        <div class="row g-4 mb-2">
            <div class="col-lg-10" style="padding-left: 10%;">
                <div class="form-floating mb-3">
                    <label class="text-muted">Your Review</label>
                    <textarea type="text" name="review" class="form-control" placeholder="Your Message...." style="height: 100px"></textarea>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mt-2" style="text-align: center;">
                <input type="submit" name="review_submit" class="btn btn-primary" value="Send Review" />
            </div>
        </div>
    </form>
</div>


</html>
<script src="./../js/bootstrap.bundle.min.js"></script>
<?php
include "inc/footer.php";
?>