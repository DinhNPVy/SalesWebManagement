<?php include 'inc/header.php'; ?>
<?php include 'inc/sliderbar.php'; ?>
<?php include '../classes/brand.php'; ?>
<?php include '../classes/category.php'; ?>
<?php include '../classes/products.php'; ?>
<?php
$product = new products();
// kiem tra
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    $insertSlider = $product->insert_slider($_POST, $_FILES);
}
?>
<link rel="stylesheet" href="css/layout.css">
<div class="gird_10">
    <div class="box round first grid">
        <h2>Add Product</h2>
        <div class="block">
            <?php
            if (isset($insertSlider)) {
                echo $insertSlider;
            }
            ?>
            <form action="slideradd.php" method="post" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td>
                            <label for="">Name</label>
                        </td>
                        <td>
                            <input class="form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" type="text" name="sliderName" placeholder="Enter Slider Title..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="">Upload Image</label>
                        </td>
                        <td>
                            <input class="form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" type="file" name="image" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">Type</label>

                        </td>
                        <td>
                            <select class="form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" name=" type" id="select">
                                <option>Select Type</option>
                                <option value="1">On</option>
                                <option value="0">Off</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input class="btn btn-primary" type="submit" name="submit" value="Save">
                        </td>
                    </tr>
                </table>
            </form>
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