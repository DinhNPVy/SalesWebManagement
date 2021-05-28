<?php
include "inc/header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<?php
if (!isset($_GET["catid"]) || $_GET["catid"] == NULL) {
    echo "<script>window.location = '404.php'</script>";
} else {
    $id = $_GET["catid"];
}
?>
<div class="row">
    <div class="col-md-3">
        <div class="sidebar mt-4">
            <!-- categories -->
            <div class="border rounded">
                <div class="p-3 bg-light rounded">
                    <h5 class="mb-0">Categories: <?php
                                                    $nameCat = $cate->getNameByCat($id);
                                                    if ($nameCat) {
                                                        while ($resultName = $nameCat->fetch_assoc()) {
                                                            $nameResult = $resultName["catName"];
                                                        }
                                                    }

                                                    if (isset($nameResult)) {
                                                        echo $nameResult;
                                                    }
                                                    ?></h5>
                </div>
                <div class="ms-3 my-3">
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

                </div>
            </div>
            <!-- end categories -->

            <!-- color -->
            <div class="border rounded mt-4">
                <div class="p-3 bg-light rounded">
                    <h5 class="mb-0">Choose Color</h5>
                </div>
                <div class="ms-3 my-3">
                    <div class="form-check mb-2">
                        <input class="form-check-input fs-16" type="checkbox" value="" id="flexCheckDefaulta2">
                        <label class="form-check-label" for="flexCheckDefaulta2"><i class="fa fa-circle  ms-2 fs-16"></i> Red</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input fs-16" type="checkbox" value="" id="flexCheckChecked55" checked>
                        <label class="form-check-label" for="flexCheckChecked55"><i class="fa fa-circle text-primary ms-2 fs-16"></i> Blue</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input fs-16" type="checkbox" value="" id="flexCheckChecked66">
                        <label class="form-check-label" for="flexCheckChecked66"><i class="fa fa-circle  text-dark ms-2 fs-16"></i> Black</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input fs-16" type="checkbox" value="" id="flexCheckChecked77">
                        <label class="form-check-label" for="flexCheckChecked77"><i class="fa fa-circle  text-info ms-2 fs-16"></i> Cyan</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input fs-16" type="checkbox" value="" id="flexCheckChecked88">
                        <label class="form-check-label" for="flexCheckChecked88"><i class="fa fa-circle  text-warning ms-2 fs-16"></i> Yellow</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input fs-16" type="checkbox" value="" id="flexCheckChecked99">
                        <label class="form-check-label" for="flexCheckChecked99"><i class="fa fa-circle  text-success ms-2 fs-16"></i> Green</label>
                    </div>
                </div>
            </div>
            <!-- end color -->

            <!-- items -->
            <div class="border rounded mt-4">
                <div class="p-3 bg-light rounded">
                    <h5 class="mb-0">Items</h5>
                </div>
                <div class="ms-3 my-3">
                    <h5 class="d-inline-block">Select Items</h5>
                    <input type="number" class="buyfield" name="quantity" value="1" min="1" style="font-size: 15px ; border: 2px solid" ;>
                </div>
            </div>
            <!-- end item -->

            <!-- start price -->
            <div class="border rounded mt-4">
                <div class="p-3 bg-light rounded mb-3">
                    <h5 class="mb-0">Price</h5>
                </div>
                <div class="ms-3 my-3">
                    <div class="form-check mb-2">
                        <input class="form-check-input fs-16" type="checkbox" value="" id="flexCheckDefaulta7">
                        <label class="form-check-label ms-2" for="flexCheckDefaulta7">$50 - $99</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input fs-16" type="checkbox" value="" id="flexCheckChecke" checked>
                        <label class="form-check-label ms-2" for="flexCheckChecke">$100 - $199</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input fs-16" type="checkbox" value="" id="flexCheckCheck">
                        <label class="form-check-label ms-2" for="flexCheckCheck">$200 - $299</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input fs-16" type="checkbox" value="" id="flexCheckChec">
                        <label class="form-check-label ms-2" for="flexCheckChec">$300 - $399</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input fs-16" type="checkbox" value="" id="flexCheckChe">
                        <label class="form-check-label ms-2" for="flexCheckChe">$400 - $499</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="row">
            <?php
            $productByCat = $cate->getproductbyCat($id);
            if ($productByCat) {
                while ($result = $productByCat->fetch_assoc()) {
            ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="product-item mt-4">
                            <div class="product-img rounded border position-relative">
                                <a href=""><img height="300px" src="admin/uploads/<?php echo $result["image"] ?>" /> </a>
                                <!-- <span class="badge bg-primary position-absolute top-0 start-0 py-2 mt-2 ms-2">-20%</span> -->
                                <div class="hover-content text-center bg-white position-absolute top-50 start-50 translate-middle w-100 py-2">
                                    <a href="cart.php"><i class="fa fa-shopping-cart fs-22 me-3 pe-3 fw-bolder pro-icon border-end"></i></a>
                                    <a href="details.php"><i class="fa fa-eye fs-22 me-3 pe-3 fw-bolder pro-icon border-end active"></i></a>
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
            } else {
                echo 'Category Not Available';
            }
            ?>




        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
</div>


</html>
<?php include "inc/footer.php" ?>