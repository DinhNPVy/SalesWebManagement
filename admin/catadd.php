<?php
include 'inc/header.php';
include 'inc/sliderbar.php';
?>



<?php include '../classes/category.php'; ?>
<?php
$cat = new category();
// kiem tra
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $catName = $_POST['catName'];


    $insertCat = $cat->insert_category($catName);
}
?>

<div class="row">
    <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">

                <div class="row grid-margin">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Thêm Danh Mục</h4>
                                <?php
                                if (isset($insertCat)) {
                                    echo $insertCat;
                                }
                                ?>
                                <form class="cmxform" id="commentForm" method="get" action="#">
                                    <fieldset>
                                        <div class="form-group">

                                            <input class="col-lg-12 mb-2 form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" type="text" name="catName" placeholder="Thêm danh mục...">
                                        </div>

                                        <input class="btn btn-primary" type="submit" name="submit" value="Save">
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php include 'inc/footer.php' ?>
<!-- 

<div class="gird_10">
    <div class="box round first grid">
        <h2>Thêm danh mục</h2>
        <div class="block copyblock">
            <?php
            if (isset($insertCat)) {
                echo $insertCat;
            }
            ?>

            <form action="catadd.php" method="post">
                <table class="form">
                    <tr>
                        <td>
                            <input  type="text" name="catName" placeholder="Thêm danh mục..." />
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
</div> -->