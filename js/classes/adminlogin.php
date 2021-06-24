<?php
include "../lib/session.php";
// kiem tra Login , neu true thi tra ve index
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helper/format.php');

Session::checkLogin();
?>

<?php

class adminlogin
{

    private $db;
    private $fm;

    public function __construct()
    {
        // this chay trong trang nay thoi nhe
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function login_admin($adminUser, $adminPass)
    {
        // kiem tra tinh hop le ex / \ v.v.
        $adminUser = $this->fm->validation($adminUser);
        $adminPass = $this->fm->validation($adminPass);

        // 1 bien ket noi vs du lieu , bien thu hai ket noi co so du lieu
        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
        $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

        // neu empty
        if (empty($adminUser) || empty($adminPass)) {
            $alert = "User and Pass must me not empty";
            return $alert;
        }
        // neu ng dung nhap thi doi chieu voi csdl
        else {
            $query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass' LIMIT 1";
            $result = $this->db->select($query);

            if ($result != false) {
                $value = $result->fetch_assoc();

                Session::set('adminlogin', true);
                // ket qua tu $result truyen cho $value 
                Session::set('adminId', $value['adminId']);
                Session::set('adminUser', $value['adminUser']);
                Session::set('adminName', $value['adminName']);
                header("Location:index.php");
            } else {
                $alert = "User and Pass must me not empty";
                return $alert;
            }
        }
    }
}
