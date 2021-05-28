<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helper/format.php');

?>

<?php

class brand
{

    private $db;
    private $fm;

    public function __construct()
    {
        // this chay trong trang nay thoi nhe
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_brand($brandName)
    {
        // kiem tra tinh hop le ex / \ v.v.
        $brandName = $this->fm->validation($brandName);


        // 1 bien ket noi vs du lieu , bien thu hai ket noi co so du lieu
        $brandName = mysqli_real_escape_string($this->db->link, $brandName);


        // neu empty
        if (empty($brandName)) {
            $alert = "<span class='error'>Brand must be not empty</span>";
            return $alert;
        }
        // neu ng dung nhap thi doi chieu voi csdl
        else {
            $query = "INSERT INTO tbl_brand(brandName) VALUE('$brandName')";
            $result = $this->db->insert($query);

            if ($result) {
                $alert = "<span class='Success'>Insert Brand Successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Insert Brand Not Successfully</span>";
                return $alert;
            }
        }
    }
    // DANH SACH SAN PHAM //
    public function show_brand()
    {
        $query = "SELECT * FROM tbl_brand order by brandId desc";
        $result = $this->db->select($query);
        return $result;
    }

    // UPDATE 
    public function update_brand($brandName, $id)
    {
        // kiem tra tinh hop le ex / \ v.v.
        $brandName = $this->fm->validation($brandName);


        // 1 bien ket noi vs du lieu , bien thu hai ket noi co so du lieu
        $brandName = mysqli_real_escape_string($this->db->link, $brandName);
        $id = mysqli_real_escape_string($this->db->link, $id);

        if (empty($brandName)) {
            $alert = "<span class='error'>Brand must be not empty</span>";
            return $alert;
        }
        // neu ng dung nhap thi doi chieu voi csdl
        else {
            $query = "UPDATE tbl_brand SET brandName = '$brandName' WHERE brandId = '$id'";
            $result = $this->db->update($query);

            if ($result) {
                $alert = "<span class='Success'> Brand Update Successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'> Brand  Update Not Successfully</span>";
                return $alert;
            }
        }
    }

    public function del_brand($id)
    {
        $query = "DELETE FROM tbl_brand WHERE brandId = '$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class='Success'> Brand Delete Successfully</span>";
            return $alert;
        } else {
            $alert = "<span class='error'> Brand Delete Not Successfully</span>";
            return $alert;
        }
    }

    // EDIT SANPHAM // 
    public function getBrandById($id)
    {
        $query = "SELECT * FROM tbl_brand WHERE brandId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
}
