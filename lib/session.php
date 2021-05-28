<?php
class Session
{
    // luu phien giao dich
    public static function init()
    {
        if (version_compare(phpversion(), '7.3.27', '<')) {
            if (session_id() == '') {
                session_start();
            }
        } else {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }
    }
    public static function set($key, $val)
    {
        $_SESSION[$key] = $val;
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }
    // session nay kiem tra xem phien lam viec co ton tai hay khong
    public static function checkSession()
    {
        self::init();
        if (self::get("adminlogin") == false) {
            self::destroy();
            // header("Location:../admin\demo\horizontal-default\login.php"); // quay lai trang dang nhap
            '<script>window.location = login.php</script>';
        }
    }

    public static function checkLogin()
    {
        self::init();
        if (self::get("adminlogin") == true) {
            header("Location:index.php");
        }
    }
    // huy phien lam viec 
    public static function destroy()
    {
        session_destroy();
        header("Location:login.php");
        // '<script>window.location = login.php</script>';
    }
    public static function checkSignin()
    {
        self::init();
        if (self::get("customer_signin") == true) {
            header("Location:order.php");
        }
    }
}
