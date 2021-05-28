<?php
include_once 'inc/header.php';
?>

<?php
if (!isset($_GET['productid']) || $_GET['productid'] == NULL) {
    echo "<script> window.location = '404.php' </script>";
} else {
    $id = $_GET["productid"];
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $quantity = $_POST["quantity"];
    $addCart = $ct->addToCart($quantity, $id);
}


// $customer_ID = Session::get("customer_ID");

// if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['compare'])) {
//     $id = $_POST["productid"];
//     $insertCompare = $ct->insertCompare($productID, $customer_ID);
// }

// if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['wishlist'])) {
//     $id = $_POST["productid"];
//     $insertWishlist = $ct->insertWishlist($productID, $customer_ID);
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




</head>

<section class="section">
    <div class="container">
        <?php
        $productDetail = $product->getProductDetail($id);

        if ($productDetail) {
            while ($result_details = $productDetail->fetch_assoc()) {
        ?>
                <div class="row">
                    <!-- <div class="col-lg-12"> 
                        <div class="border-bottom">
                            <nav class="pb-sm-3 pb-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Product Details</li>
                                </ol>
                            </nav>
                    </div>     -->
                    <div class="row">

                        <div class="col-5 mt-4">
                            <img height="460px" class="border img-fluid rounded" src="admin/uploads/<?php echo $result_details["image"] ?>" />

                            <!-- <div class="row">
                                    <div class="col-md-6 mt-4">
                                        <a href="#"><img class="border img-fluid rounded" src="images/products/pro-2.jpg" alt=""></a>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <a href="#"><img class="border img-fluid rounded" src="images/products/pro-3.jpg" alt=""></a>
                                    </div> -->

                        </div>
                    </div>
                    <div class="col-md-7 mt-4">
                        <div class="pro-detail-content my-3">
                            <div class="price d-inline-block">
                                <ins class="pe-1 fs-16 fw-semibold text-decoration-none">
                                    <?php echo $fm->validation($result_details["price"] . " " . "VNĐ") ?>
                                </ins>

                            </div>
                            <div class="rating d-inline-block ps-4">

                                <h5 class="d-inline-block fs-16">5.0 <div class="fa fa-star" style="color: yellow;"></div>
                                </h5>
                            </div>

                            <a href="#">
                                <h4 class="fw-medium lh-base my-1"><?php echo $result_details["productName"] ?></h4>
                            </a>

                            <form action="" method="post">
                                <div class="qty mb-4">

                                    <h5 class="d-inline-block">Select Items :</h5>
                                    <input type="number" class="buyfield" name="quantity" value="1" min="1" style="font-size: 15px ; border: 2px solid" ;>

                                </div>
                                <div class="color mb-4">
                                    <h5 class="d-inline-block">Color :</h5>
                                    <ul class="d-inline-block list-unstyled list-inline align-middle ms-4 mb-0">
                                        <li class="list-inline-item me-0">
                                            <a href="#"><i class="fa fa-square fs-5 text-success"></i></a>
                                        </li>
                                        <li class="list-inline-item me-0">
                                            <a href="#"><i class="fa fa-square fs-5 text-primary"></i></a>
                                        </li>
                                        <li class="list-inline-item me-0">
                                            <a href="#"><i class="fa fa-square fs-5 text-danger"></i></a>
                                        </li>
                                        <li class="list-inline-item me-0">
                                            <a href="#"><i class="fa fa-square fs-5 text-warning"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#"><i class="fa fa-square fs-5 text-dark"></i></a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="availability mb-4" style="display: inline-flex;">
                                    <h5 class="d-inline-block">availability : </h5>
                                    <h5 style="color: green;"><?php
                                                                if ($result_details['type'] == 0) {
                                                                    echo 'Feathered';
                                                                } else {
                                                                    echo 'Non-Feathered';
                                                                }
                                                                ?></h5>
                                </div>
                                <div class="hover-content bg-white">

                                    <i class="fa fa-shopping-cart"><i class="fs-18 fw-bolder pro-icon align-middle"></i> <input type="submit" class="btn btn-primary me-2 my-2" name="submit" value="Add To Cart"> </i></input>

                                </div>

                            </form>
                            <p>
                                <?php
                                if (isset($addCart)) {
                                    echo '<span style="color: red; font-size: 18px">The product already exists in the shopping cart</span>';
                                }
                                ?></p>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4" style="padding-left: 30%; padding-bottom: 33%;">
                        <h2>CATEGORIES</h2>
                        <ul>
                            <?php
                            $getall_category = $cate->show_category_fontend();
                            if ($getall_category) {
                                while ($result_allcat = $getall_category->fetch_assoc()) {

                            ?>
                                    <div class="tab-content border-bottom pt-4" id="nav-tabContent">
                                        <li><a href="productbycat.php?catid=<?php echo $result_allcat['catId'] ?>"><?php echo $result_allcat['catName'] ?></a></li>
                                    </div>
                            <?php
                                }
                            }

                            ?>
                        </ul>
                    </div>
                </div>

    </div>
    </div>
    </div>
</section>
<!-- end pro-detail -->

<!-- detail tab -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="pro-detail-area">
                    <div class="nav nav-tabs detail-title" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Description</a>

                    </div>
                </nav>
                <div class="tab-content border-bottom pt-4" id="nav-tabContent">

                    <?php echo $fm->textShorten($result_details['product_desc'], 1000) ?>


                </div> <?php
                    }
                }
                        ?>


            </div>
</section>
<!-- end detail tab -->

</html>
<script src="./../js/bootstrap.bundle.min.js"></script>
<?php
include "inc/footer.php";
?>