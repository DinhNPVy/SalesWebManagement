<?php include 'inc/header.php'; ?>


<?php include 'inc/sliderbar.php'; ?>
<?php include '../classes/brand.php'; ?>
<?php
$brand = new brand();
// kiem tra
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $brandName = $_POST['brandName'];


    $insertBrand = $brand->insert_brand($brandName);
}
?>
<div class="gird_10">
    <div class="box round first grid">
        <h2>Add Brand</h2>
        <div class="block copyblock">
            <?php
            if (isset($insertBrand)) {
                echo $insertBrand;
            }
            ?>

            <form action="brandadd.php" method="post">
                <table class="form">
                    <tr>
                        <td>
                            <input class="col-lg-12 mb-2 form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" type="text" name="brandName" placeholder="Please Add Brand..." />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="btn btn-primary" type="submit" name="submit" value="Save">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>