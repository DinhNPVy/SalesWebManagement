<?php include '../admin/demo/horizontal-default/index.php'; ?>



<?php
include '../classes/category.php';
?>
<?php
$cat = new category();
if (isset($_GET['delid'])) {
    $id = $_GET['delid'];
    $delCat = $cat->del_category($id);
} //else {
//     echo "<script>window.location = 'catlist.php'</script>";
// }
?>
<div class="main">
    <div class="container">
        <div class="cartoption">
            <div class="cartpage">
                <h3>Danh sách sản phẩm</h3>
                <?php
                if (isset($delCat)) {
                    echo $delCat;
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
                                                    Serial No
                                                </th>
                                                <th scope="col" class="fw-medium text-uppercase mt-2">
                                                    Category Name
                                                </th>
                                                <th scope="col" class="fw-medium text-uppercase mt-2">
                                                    Action
                                                </th>

                                            </tr>
                                            <?php
                                            $show_cate = $cat->show_category();
                                            if ($show_cate) {
                                                $i = 0;
                                                while ($result = $show_cate->fetch_assoc()) {
                                                    $i++;


                                            ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $result['catName']; ?></td>
                                                        <td><a href="cateedit.php?catid=<?php echo $result['catId'] ?>">Edit</a> | <a onclick="return confirm('Are you want to delete?')" href="?delid=<?php echo $result['catId'] ?>">Delete</a></td>


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
<script type="text/javascript">
    $(document).ready(function() {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php'; ?>