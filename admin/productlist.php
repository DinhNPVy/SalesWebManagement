<?php include 'inc/header.php'; ?>
<?php include 'inc/sliderbar.php'; ?>
<?php include '../classes/brand.php'; ?>
<?php include '../classes/category.php'; ?>
<?php include '../classes/products.php'; ?>
<?php include_once '../helper/format.php'; ?>
<?php
$product = new products();
$fm = new Format();
if (isset($_GET['productid'])) {
    $id = $_GET['productid'];
    $delProduct = $product->del_product($id);
}
?>
<div class="main">
    <div class="container">
        <div class="cartoption">
            <div class="cartpage">
                <h3>Danh sách sản phẩm</h3>
                <?php
                if (isset($delProduct)) {
                    echo $delProduct;
                }
                ?>
                <section class="section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- <div class="border-bottom">
                                    <nav class="pb-sm-3 pb-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                                        </ol>
                                    </nav>
                                </div> -->
                                <div class="table-responsive mt-4">
                                    <table class="table caption-top table-borderless pro-table">
                                        <thead class="bg-light">
                                            <tr>
                                                <th scope="col" class="fw-medium text-uppercase mt-2">
                                                    ID
                                                </th>
                                                <th scope="col" class="fw-medium text-uppercase mt-2">
                                                    Product Name
                                                </th>
                                                <th scope="col" class="fw-medium text-uppercase mt-2">
                                                    Product Price
                                                </th>
                                                <th scope="col" class="fw-medium text-uppercase mt-2">
                                                    Image
                                                </th>
                                                <th scope="col" class="fw-medium text-uppercase mt-2">
                                                    Category
                                                </th>
                                                <th scope="col" class="fw-medium text-uppercase mt-2">
                                                    Brand
                                                </th>

                                                <th scope="col" class="fw-medium text-uppercase mt-2">
                                                    Description
                                                </th>
                                                <th scope="col" class="fw-medium text-uppercase mt-2">
                                                    Type
                                                </th>
                                                <th scope="col" class="fw-medium text-uppercase mt-2">
                                                    Action
                                                </th>
                                            </tr>
                                            <?php

                                            $product_list = $product->show_products();
                                            if ($product_list) {
                                                $i = 0;
                                                while ($result = $product_list->fetch_assoc()) {
                                                    $i++;
                                            ?>
                                                    <tr>
                                                        <td><?php echo $i ?></td>
                                                        <td><?php echo $result['productName'] ?></td>
                                                        <td><?php echo $result['price'] ?></td>
                                                        <td><img height="80" src="uploads/<?php echo $result['image'] ?>" alt=""></td>
                                                        <td><?php echo $result['catName'] ?></td>
                                                        <td><?php echo $result['brandName'] ?></td>
                                                        <td><?php $fm->textShorten($result['product_desc'], 1000) ?></td>
                                                        <td>
                                                            <?php
                                                            if ($result['type'] == 1) {
                                                                echo 'Feathered';
                                                            } else {
                                                                echo 'Non-Feathered';
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><a href="productedit.php?productid=<?php echo $result['productId'] ?>">Edit </a> | <a onclick="return confirm('Are you want to delete?')" href="?productid=<?php echo $result['productId'] ?>">Delete</a></td>


                                                    </tr>



                                            <?php
                                                }
                                            }
                                            ?>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>