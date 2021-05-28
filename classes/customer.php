<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helper/format.php');

?>

<?php

class customer
{

    private $db;
    private $fm;

    public function __construct()
    {
        // this chay trong trang nay thoi nhe
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_customer($data)
    {
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
        if ($name == "" || $address == "" || $phone == "" || $email == "" || $password == "") {
            $alert = "<span class='error'>Fiels must be not empty</span>";
            return $alert;
        } else {
            $check_mail = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
            $result = $this->db->select($check_mail);
            if ($result) {
                $alert = "<span class = 'Success'>Email Already Existend</span>";
            } else {


                $query = "INSERT INTO tbl_customer(name, address, city, country, phone, email, password)
                VALUE('$name','$address', '$phone','$email', '$password')";
                $result = $this->db->insert($query);

                if ($result) {
                    $alert = "<span class='Success'>Customer Created Successfully</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'>Customer Created Not Successfully</span>";
                    return $alert;
                }
            }
        }
    }
    public function login_customer($data)
    {
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
        if ($email == '' || $password == '') {
            $alert = "<span class='error'>Password and Email must be not empty</span>";
            return $alert;
        } else {
            $check_login = "SELECT * FROM tbl_customer WHERE email = '$email' AND password = '$password'";
            $return_check = $this->db->select($check_login);
            if ($return_check) {
                $value = $return_check->fetch_assoc();
                Session::set('customer_signin', true);
                Session::set('customer_id', $value['id']);
                Session::set('customer_name',  $value['name']);
                header('Location:order.php');
            } else {
                $alert = "<span class='error'>Password or Email dosen't match </span>";
                return $alert;
            }
        }
    }
    public function show_customer($id)
    {
        $query = "SELECT * FROM tbl_customer WHERE id='$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function updateCustomer($data, $id)
    {

        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);

        if ($name == "" || $address == "" ||   $phone == "" || $email == "") {
            $alert = "<span class='error'>Fiels must be not empty</span>";
            return $alert;
        } else {


            $query = "UPDATE tbl_customer SET name='$name', address='$address', phone='$phone', email='$email' WHERE id = '$id'";
            $result = $this->db->insert($query);

            if ($result) {
                $alert = "<span class='Success'>Customer Update Successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Customer Update Not Successfully</span>";
                return $alert;
            }
        }
    }
}
?>