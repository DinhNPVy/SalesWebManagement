<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helper/format.php');

?>

<?php

class cart
{

    private $db;
    private $fm;

    public function __construct()
    {
        // this chay trong trang nay thoi nhe
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function addToCart($quantity, $id)
    {
        $quantity = $this->fm->validation($quantity);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $sId = session_id();

        $query = "SELECT * FROM tbl_product WHERE productId = '$id'";
        $result = $this->db->select($query)->fetch_assoc();

        $productName = $result["productName"];
        $price = $result["price"];
        $image = $result["image"];



        $checkCart = "SELECT * FROM tbl_cart WHERE productId = '$id' AND sId = '$sId'";
        $result = $this->db->select($checkCart);

        if ($result) {
            $result = "The product already exists in the shopping cart";
            return $result;
        } else {
            $query_insert = "INSERT INTO tbl_cart(productId, quantity, sId, image, price, productName)
             VALUE('$id','$quantity','$sId','$image','$price','$productName')";

            $result_insert = $this->db->insert($query_insert);

            if ($result_insert) {
                @header("Location: cart.php");
            } else {
                header("Location: 404.php");
            }
        }
    }
    public function getToCart()
    {
        $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_quantity_Cart($quantity, $cartId)
    {
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $cartId = mysqli_real_escape_string($this->db->link, $cartId);
        $query = "UPDATE tbl_cart SET 
                quantity = '$quantity'
            
                WHERE cartId = '$cartId'";
        $result = $this->db->update($query);

        if ($result) {
            header('Location:cart.php');
            // $mes = "<span class='Success'>Product Quantity Updated Successfully</span>";
            // return $mes;
        } else {

            $mes = "<span class='error'>Product Quantity Updated Not Successfully</span>";
            return $mes;
        }
    }
    public function del_ProductCart($cartid)
    {
        $cartid = mysqli_real_escape_string($this->db->link, $cartid);

        $query = "DELETE FROM tbl_cart WHERE cartId = '$cartid'";
        $result = $this->db->delete($query);
        if ($result) {
            header('Location:cart.php');
            // $alert = "<span class='Success'> Product Delete Successfully</span>";
            // return $alert;
        } else {
            $alert = "<span class='error'> Product  Delete Not Successfully</span>";
            return $alert;
        }
    }
    public function check_cart()
    {
        $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
        $result = $this->db->select($query);
        return $result;
    }
    public function del_all_dataCart()
    {
        $sId = session_id();
        $query = "DELETE FROM tbl_cart WHERE sId = '$sId'";
        $result = $this->db->select($query);
        return $result;
    }

    public function insertOrder($customer_id)
    {
        $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
        $get_product = $this->db->select($query);
        if ($get_product) {
            while ($result = $get_product->fetch_assoc()) {
                $productid = $result['productId'];
                $productName = $result['productName'];
                $quantity = $result['quantity'];
                $image = $result['image'];
                @$price = $result['price'] * $quantity;
                $customer_id = $customer_id;
                $query_order = "INSERT INTO tbl_order(productId, productName, quantity, price , image, customer_id)
             VALUE('$productid','$productName','$quantity','$price','$image','$customer_id')";

                $result_order = $this->db->insert($query_order);
            }
        }
    }

    public function getAmountPrice($customer_id)
    {

        $query = "SELECT price FROM tbl_order WHERE customer_id = '$customer_id'";
        $get_price = $this->db->select($query);
        return $get_price;
    }

    public function getCartOrdered($customer_id)
    {
        $query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function check_order($customer_id)
    {
        $sId = session_id();
        $query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_inbox_cart()
    {
        $query = "SELECT * FROM tbl_order ORDER BY date_order";
        $get_cart_order = $this->db->select($query);
        return $get_cart_order;
    }
}
