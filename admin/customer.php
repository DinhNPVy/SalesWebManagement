<?php include 'inc/header.php'; ?>

<?php include 'inc/sliderbar.php'; ?>

<?php include "../classes/category.php"; ?>
<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/cart.php');
include_once($filepath . '/../classes/customer.php');
include_once($filepath . '/../helper/format.php');
?>

<?php

// kiem tra
if (!isset($_GET['customerid']) || $_GET['customerid'] == NULL) {
    echo "<script>window.location = 'inbox.php'</script>";
} else {
    $id = $_GET['customerid'];
}

$cust = new customer();

?>

<div class="gird_10">
    <div class="box round first grid">
        <h2>Customer Information</h2>

        <div class="block copyblock">
            <?php
            if (isset($updateCat)) {
                echo $updateCat;
            }
            ?>

            <?php

            $cust = new customer();
            $get_customer = $cust->show_customer($id);
            if ($get_customer) {
                while ($result = $get_customer->fetch_assoc()) {


            ?>
                    <form action="" method="post">
                        <div class="table-responsive mt-4">
                            <table class="table caption-top table-borderless pro-table">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col" class="fw-medium text-uppercase mt-2">
                                            Name
                                        </th>
                                        <th scope="col" class="fw-medium text-uppercase mt-2">
                                            Address
                                        </th>
                                        <th scope="col" class="fw-medium text-uppercase mt-2">
                                            Phone
                                        </th>
                                        <th scope="col" class="fw-medium text-uppercase mt-2">
                                            Email
                                        </th>

                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="col-lg-12 mb-2 form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" readonly="readonly" type="text" value="<?php echo $result["name"]; ?>" name="catName" class="medium" />
                                        </td>
                                        <td>
                                            <input class="col-lg-12 mb-2 form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" readonly="readonly" type="text" value="<?php echo $result["address"]; ?>" name="catName" class="medium" />
                                        </td>
                                        <td>
                                            <input class="col-lg-12 mb-2 form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" readonly="readonly" type="text" value="<?php echo $result["phone"]; ?>" name="catName" class="medium" />
                                        </td>
                                        <td>
                                            <input class="col-lg-12 mb-2 form-control input-sm header-search-input jump-to-field js-jump-to-field js-site-search-focus" readonly="readonly" type="text" value="<?php echo $result["email"]; ?>" name="catName" class="medium" />
                                        </td>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </form>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';  ?>