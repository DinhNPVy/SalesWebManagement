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

    // EDIT SANPHAM // 
    public function getProductById($id)
    {
        $query = "SELECT * FROM tbl_product WHERE productId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getProductFeathered()
    {
        $query = "SELECT * FROM tbl_product where type = '1'";
        $result = $this->db->select($query);
        return $result;
    }

    public function getProductNew()
    {
        $query = "SELECT * FROM tbl_product order by productId desc LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }

    public function getProductDetail($id)
    {
        $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
        
         FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId 
         INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId 
         WHERE tbl_product.productId = '$id'";


        $result = $this->db->select($query);
        return $result;
    }

    public function getastestDell()
    {

        $query = "SELECT * FROM tbl_product WHERE branId desc LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }
}
