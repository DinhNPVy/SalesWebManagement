<?php include 'inc/header.php'; ?>

<?php include 'inc/sliderbar.php'; ?>
<?php include '../classes/brand.php'; ?>
<?php

// kiem tra
if (!isset($_GET['brandid']) || $_GET['brandid'] == NULL) {
    echo "<script>window.location = 'brandlist.php'</script>";
} else {
    $id = $_GET['brandid'];
}

$brand = new brand();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $brandName = $_POST['brandName'];
    $updateBrand = $brand->update_brand($brandName, $id);
}
?>

<div class="gird_10">
    <div class="box round first grid">
        <h2>Edit Brand</h2>

        <div class="block copyblock">
            <?php
            if (isset($updateBrand)) {
                echo $updateBrand;
            }
            ?>

            <?php
            $get_brand_name = $brand->getBrandById($id);
            if ($get_brand_name) {
                while ($result = $get_brand_name->fetch_assoc()) {


            ?>
                    <form action="" method="post">
                        <table class="form">
                            <tr>
                                <td>
                                    <input class="col-lg-12 mb-2 form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" type="text" value="<?php echo $result["brandName"]; ?>" name="brandName" placeholder="Please Correct The Brand Name..." class="medium" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="btn btn-primary" type="submit" name="submit" value="Update" />
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
<?php include 'inc/footer.php';  ?>