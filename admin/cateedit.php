<?php include 'inc/header.php'; ?>

<?php include 'inc/sliderbar.php'; ?>
<?php include '../classes/category.php'; ?>
<?php

// kiem tra
if (!isset($_GET['catid']) || $_GET['catid'] == NULL) {
    echo "<script>window.location = 'catlist.php'</script>";
} else {
    $id = $_GET['catid'];
}

$cat = new category();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $catName = $_POST['catName'];
    $updateCat = $cat->update_category($catName, $id);
}
?>

<div class="gird_10">
    <div class="box round first grid">
        <h2>Sửa danh mục</h2>

        <div class="block copyblock">
            <?php
            if (isset($updateCat)) {
                echo $updateCat;
            }
            ?>

            <?php
            $get_cate_name = $cat->getCateById($id);
            if ($get_cate_name) {
                while ($result = $get_cate_name->fetch_assoc()) {


            ?>
                    <form action="" method="post">
                        <table class="form">
                            <tr>
                                <td>
                                    <input class="col-lg-4 mb-2 form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" type="text" value="<?php echo $result["catName"]; ?>" name="catName" placeholder="Vui lòng sửa danh mục sản phẩm..." class="medium" />
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