<?php

use PhpMyAdmin\Display\Results;

include 'inc/header.php'; ?>
<?php include 'inc/sliderbar.php'; ?>
<?php include '../classes/brand.php'; ?>
<?php include '../classes/category.php'; ?>
<?php include '../classes/products.php'; ?>
<?php
$product = new products();
if (!isset($_GET['productid']) || $_GET['productid'] == NULL) {
    echo "<script>window.location = 'productlist.php'</script>";
} else {
    $id = $_GET['productid'];
}

// kiem tra
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    $updateProduct = $product->update_product($_POST, $_FILES, $id);
}
?>
<div class="gird_10">
    <div class="box round first grid">
        <h2>Edit Product</h2>
        <div class="block">
            <?php
            if (isset($updateProduct)) {
                echo $updateProduct;
            }
            ?>
            <?php
            $get_productbyId = $product->getProductById($id);
            if ($get_productbyId) {
                while ($res_product = $get_productbyId->fetch_assoc()) {


            ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="form">
                            <tr>
                                <td>
                                    <label for="">Name</label>
                                </td>
                                <td>
                                    <input class="col-lg-4 mb-2 form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" type="text" name="productName" value="<?php echo $res_product['productName'] ?>" class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">Category</label>
                                </td>
                                <td>
                                    <select class="col-lg-4 mb-2 form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" name="category" id="select">
                                        <option value="">-----SELECT CATEGORY-----</option>
                                        <?php
                                        $cat = new category();
                                        $catlist = $cat->show_category();

                                        if ($catlist) {
                                            while ($result = $catlist->fetch_assoc()) {

                                        ?>



                                                <option <?php
                                                        if ($result['catId'] == $res_product['catId']) {
                                                            echo 'selected';
                                                        }
                                                        ?> value="<?php echo $result['catId'] ?>"><?php echo $result['catName'] ?></option>

                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; padding-top:9px;">
                                    <label for="Description"></label>

                                </td>
                                <td>
                                    <textarea name="product_desc" class="tinymce"><?php echo $res_product['product_desc'] ?> </textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">Price</label>

                                </td>
                                <td>
                                    <input class="col-lg-4 mb-2 form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" type="text" name="price" value="<?php echo $res_product['price'] ?> " class=" medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">Upload Image</label>
                                </td>
                                <td>
                                    <img src="uploads/<?php echo $res_product['image'] ?>" width="120">
                                    <input class="col-lg-4 mb-2 form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" type="file" name="image" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">Product Type</label>

                                </td>
                                <td>
                                    <select class="col-lg-4 mb-2 form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" name="type" id="select">
                                        <option>Select Type</option>
                                        <?php
                                        if ($res_product['type'] == 0) {
                                        ?>
                                            <option selected value="1">Featured</option>
                                            <option value="0">Non-Featured</option>
                                        <?php
                                        } else {
                                        ?>
                                            <option value="1">Featured</option>
                                            <option selected value="0">Non-Featured</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="">Brand</label>
                                </td>
                                <td>
                                    <select class="col-lg-4 mb-2 form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" name="brand" id="select">
                                        <option value="">-----SELECT BRAND-----</option>
                                        <?php
                                        $brand = new brand();
                                        $brandlist = $brand->show_brand();

                                        if ($brandlist) {
                                            while ($result = $brandlist->fetch_assoc()) {

                                        ?>
                                                <option <?php
                                                        if ($result['brandId'] == $res_product['brandId']) {
                                                            echo 'selected';
                                                        }
                                                        ?> value="<?php echo $result['brandId'] ?>"><?php echo $result['brandName'] ?></option>

                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <input class="btn btn-primary" type="submit" name="submit" value="Update">
                                </td>
                            </tr>
                        </table>
                    </form>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<!--- LOAD TINYMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type = "checkbox"]').fancybutton();
        $('input[type = "radio"]').fancybutton();

    });
</script>
<!--- LOAD TINYMCE -->
<?php include 'inc/footer.php'; ?>