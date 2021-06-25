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
    <link rel="stylesheet" href="css/owlcarousel.css">
    <link rel="stylesheet" href="css/flags.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style.min.css">

</head>




<div class="row" style="    margin-right: -10px;margin-left: -10px;">
    <div class="col-md-3">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
            <li><a href="#">Products</a></li>

        </ul>
        <div class="sidebar mt-4">
            <?php

            if (isset($_SERVER["REQUEST_METHOD"])  == "POST") {

                $value = $_POST["value"];
                $search_product = $product->search_product($value);
            }

            ?>

            <h4>Search Keyword: <?php echo $value ?> </h4>
            <!-- categories -->
            <div class="border rounded">
                <div class="p-3 bg-light rounded">
                    <h5 class="mb-0">Categories: <?php
                                                    // $cate = new category();
                                                    // $nameCat = $cate->getNameByCat($id);
                                                    // if ($nameCat) {
                                                    //     while ($resultName = $nameCat->fetch_assoc()) {
                                                    //         $nameResult = $resultName["catName"];
                                                    //     }
                                                    // }

                                                    // if (isset($nameResult)) {
                                                    //     echo $nameResult;
                                                    // }
                                                    // 
                                                    ?>
                    </h5>
                </div>
                <div class="customeField">
                    <?php
                    $cate = new category();
                    $getall_category = $cate->show_category_fontend();
                    if ($getall_category) {
                        while ($result_allcat = $getall_category->fetch_assoc()) {

                    ?>

                            <li><a href="productbycat.php?catid=<?php echo $result_allcat['catId'] ?>"><?php echo $result_allcat['catName'] ?></a></li>

                    <?php
                        }
                    }

                    ?>

                </div>
            </div>
            <!-- end categories -->





            <section class="widget widget_tag_cloud pt-30">
                <header>
                    <h3>Tags</h3>
                </header>
                <!--Widget header-->
                <div class="widget-content">
                    <a href="#">Windown</a>
                    <a href="#">Iphone</a>
                    <a href="#">Case</a>
                    <a href="#">Popular</a>
                    <a href="#">New Design</a>
                    <a href="#">Trend 2021</a>
                    <a href="#">Android</a>
                    <a href="#">Designer</a>
                    <a href="#">Dinh Vy</a>
                    <a href="#">TPHCM</a>
                    <a href="#">UI</a>
                </div>
            </section>


        </div>
    </div>


    <div class="col-md-9">

        <div class="xv-product-slides grid-view products" data-thumbnail="figure .xv-superimage" data-product=".xv-product-unit">
            <div class="row">

                <?php

                if ($search_product) {
                    while ($result = $search_product->fetch_assoc()) {
                ?>
                        <div class="col-md-3">
                            <div class="xv-product-unit">
                                <div class="xv-product ">
                                    <figure>
                                        <a href="details.php?productid=<?php echo $result["productId"] ?>"><img class="xv-superimage" src="admin/uploads/<?php echo $result["image"] ?>" alt="" /></a>
                                        <figcaption>
                                            <ul class="style1" style="font-size: 13.4px;">
                                                <li><a data-qv-tab="#qvt-wishlist" class="btn-cart flytoQuickView btn-square btn-blue" href="details.php?productid=<?php echo $result["productId"] ?>"><i class="fa fa-eye"></i></a></li>

                                            </ul>
                                        </figcaption>
                                    </figure>
                                    <div class="xv-product-content">
                                        <h3><a href="details.php?productid=<?php echo $result["productId"] ?>"><?php echo $result["productName"] ?></a></h3>


                                        <div class="xv-rating stars-5"></div>
                                        <span class="xv-price"><?php echo $fm->format_currency($result["price"]) ?></span>
                                        <!-- <a data-qv-tab="#qvt-cart" href="#" class="product-buy flytoQuickView">Buy</a> -->
                                    </div>
                                    <!--xv-product-content-->
                                </div>
                                <!--xv-product(list-view)-->
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo 'Category Not Available';
                }
                ?>
            </div>
        </div>
    </div>
</div>




</html>
<?php include "inc/footer.php" ?>