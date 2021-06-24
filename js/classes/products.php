<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helper/format.php');

?>

<?php

class products
{

    private $db;
    private $fm;

    public function __construct()
    {
        // this chay trong trang nay thoi nhe
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_product($data, $files)
    {


        // 1 bien ket noi vs du lieu , bien thu hai ket noi co so du lieu
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);


        // kiem tra hinh anh va lay hinh anh cho vao folder upload
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;
        // neu empty
        if ($productName == "" || $brand == "" || $category == "" || $product_desc == "" ||  $price == "" ||  $type == "" || $file_name == "") {
            $alert = "<span class='error'>Fiels must be not empty</span>";
            return $alert;
        }
        // neu ng dung nhap thi doi chieu voi csdl
        else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_product(productName, brandId, catId, product_desc,price,type,image) VALUE('$productName','$brand','$category','$product_desc','$price','$type','$unique_image')";
            $result = $this->db->insert($query);

            if ($result) {
                $alert = "<span class='Success'>Insert Product Successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Insert Product Not Successfully</span>";
                return $alert;
            }
        }
    }
    public function show_slider()
    {
        $query = "SELECT * FROM tbl_slider WHERE type = 1 order by sliderId desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_slider_list()
    {
        $query = "SELECT * FROM tbl_slider  order by sliderId desc";
        $result = $this->db->select($query);
        return $result;
    }


    // DANH SACH SAN PHAM //
    public function show_products()
    {
        $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName

         FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
         INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
         order by tbl_product.productId desc";

        //$query = "SELECT * FROM tbl_product order by productId desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function search_product($value)
    {
        // kiem tra value có tồn tại chưa
        $value = $this->fm->validation($value);
        $query = "SELECT * FROM tbl_product WHERE productName LIKE '%$value%' LIMIT 52";
        $result = $this->db->select($query);
        return $result;
    }

    // UPDATE
    public function update_product($data, $file, $id)
    {
        // 1 bien ket noi vs du lieu , bien thu hai ket noi co so du lieu
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);


        // kiem tra hinh anh va lay hinh anh cho vao folder upload
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;

        if ($productName == "" || $brand == "" || $category == "" || $product_desc == "" ||  $price == "" ||  $type == "") {
            $alert = "<span class='error'>Fiels must be not empty</span>";
            return $alert;
        } else {
            if (!empty($file_name)) {
                if ($file_size > 2048) {

                    $alert = "<span class='Success'>Image Size should be less then 2MB!</span>";
                    return $alert;
                } else if (in_array($file_ext, $permited) === false) {

                    $alert = "<span class='Success'>You can upload only:-" . implode(', ', $permited) . "</span>";
                    return $alert;
                }
                $query = "UPDATE tbl_product SET
                productName = '$productName',
                brandId = '$brand',
                catId = '$category',
                type = '$type',
                price = '$price',
                image = '$unique_image',
                product_desc = '$product_desc'
                WHERE productId = '$id'";
            } else {
                // Nếu không trống file ảnh
                $query = "UPDATE tbl_product SET
                productName = '$productName',
                brandId = '$brand',
                catId = '$category',
                type = '$type',
                price = '$price',
                product_desc = '$product_desc'
                WHERE productId = '$id'";
            }

            // neu ng dung nhap thi doi chieu voi csdl

        }
        $result = $this->db->update($query);

        if ($result) {
            $alert = "<span class='Success'> Product Update Successfully</span>";
            return $alert;
        } else {
            $alert = "<span class='error'> Product  Update Not Successfully</span>";
            return $alert;
        }
    }
    public function del_product($id)
    {
        $query = "DELETE FROM tbl_product WHERE productId = '$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class='Success'> Product Delete Successfully</span>";
            return $alert;
        } else {
            $alert = "<span class='error'> Product  Delete Not Successfully</span>";
            return $alert;
        }
    }
    public function del_slider($id)
    {
        $query = "DELETE FROM tbl_slider WHERE sliderId = '$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class='Success'> Slider Delete Successfully</span>";
            return $alert;
        } else {
            $alert = "<span class='error'> Slider Delete Not Successfully</span>";
            return $alert;
        }
    }

    public function update_type_slider($id, $type)
    {
        $type = mysqli_real_escape_string($this->db->link, $type);
        $query = "UPDATE tbl_slider SET type = '$type' WHERE sliderId = '$id' ";
        $result = $this->db->update($query);
        return $result;
    }

    public function del_Wishlist($productid, $cutomer_id)
    {
        $query = "DELETE FROM tbl_wishlist WHERE productId = '$productid' AND customer_id = '$cutomer_id'";
        $result = $this->db->delete($query);
        return $result;
    }

    // EDIT SANPHAM //
    public function getProductById($id)
    {
        $query = "SELECT * FROM tbl_product WHERE productId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getProductFeature()
    {
        $sp_page = 4;
        if (!isset($_GET['page'])) {
            $trang = 1;
        } else {
            $trang = $_GET['page'];
        }
        $tung_trang = ($trang - 1) * $sp_page;
        $query = "SELECT * FROM tbl_product where type = '1' LIMIT $tung_trang, $sp_page";
        $result = $this->db->select($query);
        return $result;
    }

    public function getProductNew()
    {

        $sp_page = 4;
        if (!isset($_GET['page'])) {
            $trang = 1;
        } else {
            $trang = $_GET['page'];
        }
        $tung_trang = ($trang - 1) * $sp_page;
        $query = "SELECT * FROM tbl_product order by productId desc LIMIT $tung_trang, $sp_page";
        $result = $this->db->select($query);
        return $result;
    }
    public function getProductNewByCatId($catId)
    {
        $query = "SELECT * FROM tbl_product where catId = $catId  order by productId desc LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }
    public function getLastedDell()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId = 1 ORDER BY productId DESC LIMIT 1 ";
        $result = $this->db->select($query);
        return $result;
    }

    public function getLastedIphone()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId = 7 ORDER BY productId DESC LIMIT 1 ";
        $result = $this->db->select($query);
        return $result;
    }

    public function getLastedXiaomi()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId = 3 ORDER BY productId DESC LIMIT 1 ";
        $result = $this->db->select($query);
        return $result;
    }

    public function getLastedSamsung()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId = 2 ORDER BY productId DESC LIMIT 1 ";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_all_product()
    {
        $query = "SELECT * FROM tbl_product LIMIT 80";
        $result = $this->db->select($query);
        return $result;
    }

    public function getProductByBrandId($brandid)
    {
        $query = "SELECT * FROM tbl_product where catId = $brandid  order by productId desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function getProductDetail($productid)
    {
        $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName

         FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
         INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
         WHERE tbl_product.productId = '$productid'";


        $result = $this->db->select($query);
        return $result;
    }

    public function getastestDell()
    {

        $query = "SELECT * FROM tbl_product WHERE branId desc LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }

    public function getCompare($customer_id)
    {
        $query = "SELECT * FROM tbl_compare WHERE customer_id = '$customer_id' order by id  desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function getWishlist($customer_id)
    {
        $query = "SELECT * FROM tbl_wishlist WHERE customer_id = '$customer_id' order by id  desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function insertCompare($productid, $customer_id)
    {

        $productid = mysqli_real_escape_string($this->db->link, $productid);
        $customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
        $checkCompare = "SELECT * FROM tbl_compare WHERE productId = '$productid' AND customer_id = '$customer_id'";
        $result_checkcompare = $this->db->select($checkCompare);

        if ($result_checkcompare) {
            $mes = "Product already Added To Compare";
            return $mes;
        } else {

            $query = "SELECT * FROM tbl_product WHERE productId = '$productid'";
            $result = $this->db->select($query)->fetch_assoc();

            $productName = $result["productName"];
            $price = $result["price"];
            $image = $result["image"];




            $query_insert = "INSERT INTO tbl_compare(productId, price, image, customer_id, productName)
             VALUE('$productid','$price','$image','$customer_id','$productName')";

            $result_compare = $this->db->insert($query_insert);

            if ($result_compare) {
                $alert = "<span class='Success'> Added Compare Successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'> Added Compare Not Successfully</span>";
                return $alert;
            }
        }
    }
    public function insertWishlist($productid, $customer_id)
    {
        $productid = mysqli_real_escape_string($this->db->link, $productid);
        $customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
        $checkWishlist = "SELECT * FROM tbl_wishlist WHERE productId = '$productid' AND customer_id = '$customer_id'";
        $result_checkwishlist = $this->db->select($checkWishlist);

        if ($result_checkwishlist) {
            $mes = "Product already Added To Wishlist";
            return $mes;
        } else {

            $query = "SELECT * FROM tbl_product WHERE productId = '$productid'";
            $result = $this->db->select($query)->fetch_assoc();

            $productName = $result["productName"];
            $price = $result["price"];
            $image = $result["image"];




            $query_insert = "INSERT INTO tbl_wishlist(productId, price, image, customer_id, productName)
             VALUE('$productid','$price','$image','$customer_id','$productName')";

            $result_wishlist = $this->db->insert($query_insert);

            if ($result_wishlist) {
                $alert = "<span class='Success'> Added Wishlist Successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'> Added Wishlist Not Successfully</span>";
                return $alert;
            }
        }
    }
    public function insert_slider($data, $files)
    {


        // 1 bien ket noi vs du lieu , bien thu hai ket noi co so du lieu
        $sliderName = mysqli_real_escape_string($this->db->link, $data['sliderName']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);


        // kiem tra hinh anh va lay hinh anh cho vao folder upload
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;

        if ($sliderName == "" || $type == "") {
            $alert = "<span class='error'>Fiels must be not empty</span>";
            return $alert;
        } else {
            if (!empty($file_name)) {
                if ($file_size > 2048000) {

                    $alert = "<span class='Success'>Image Size should be less then 2MB!</span>";
                    return $alert;
                } else if (in_array($file_ext, $permited) === false) {

                    $alert = "<span class='Success'>You can upload only:-" . implode(', ', $permited) . "</span>";
                    return $alert;
                }
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "INSERT INTO tbl_slider(sliderName,type,slider_image) VALUE('$sliderName','$type','$unique_image')";
                $result = $this->db->insert($query);

                if ($result) {
                    $alert = "<span class='Success'>Slider Added Successfully</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'>Slider Added Not Successfully</span>";
                    return $alert;
                }
            }

            // neu ng dung nhap thi doi chieu voi csdl

        }
    }
}
