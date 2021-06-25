<?php include 'inc/header.php'; ?>
<?php include 'inc/sliderbar.php'; ?>
<?php include '../classes/brand.php'; ?>
<?php include '../classes/category.php'; ?>

<?php include_once '../helper/format.php'; ?>
<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/products.php');
?>

<?php
$product = new products();

if (isset($_GET['sliderId']) && isset($_GET['type'])) {
    $id = $_GET['sliderId'];
    $type = $_GET['type'];
    $update_type_slider = $product->update_type_slider($id, $type);
    // $delSlider = $product->del_slider($id);
}
if (isset($_GET['del_slider'])) {
    $id = $_GET['del_slider'];

    $delSlider = $product->del_slider($id);
    // $delSlider = $product->del_slider($id);
}

?>
<div class="main">
    <div class="container">
        <div class="cartoption">
            <div class="cartpage">
                <h3>Slider List</h3>
                <?php
                if (isset($delSlider)) {
                    echo $delSlider;
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
                                                    Slider Title
                                                </th>
                                                <th scope="col" class="fw-medium text-uppercase mt-2">
                                                    Slider Image
                                                </th>
                                                <th scope="col" class="fw-medium text-uppercase mt-2">
                                                    Type
                                                <th scope="col" class="fw-medium text-uppercase mt-2">
                                                    Action
                                                </th>
                                            </tr>
                                            <?php

                                            $slider_list = $product->show_slider_list();
                                            if ($slider_list) {
                                                $i = 0;
                                                while ($result = $slider_list->fetch_assoc()) {
                                                    $i++;
                                            ?>
                                                    <tr>
                                                        <td><?php echo $i ?></td>
                                                        <td><?php echo $result['sliderName'] ?></td>
                                                        <td><img height="200px" width="500px" src="uploads/<?php echo $result['slider_image'] ?>" alt=""></td>

                                                        <td>
                                                            <?php
                                                            if ($result['type'] == 1) {
                                                            ?>
                                                                <a href="?sliderId=<?php echo $result['sliderId'] ?> &type= 0">Off</a>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <a href="?sliderId=<?php echo $result['sliderId'] ?> &type= 1">On</a>

                                                            <?php
                                                            }
                                                            ?>

                                                        </td>
                                                        <td> <a href="?del_slider=<?php echo $result['sliderId'] ?>" onclick="return confirm('Are you want to delete?')"> Delete </a>
                                                        </td>


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