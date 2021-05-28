<?php
include "../lib/session.php";
Session::checkSession();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/materialdesignicons.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.min.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Doppio+One">
    <link rel="stylesheet" href="css/styleheader.css">
    <link rel="stylesheet" href="../css/horizontal-layout/style.css">
    <link rel="shortcut icon" href="../img/logomini.png" />
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="css/styleheadermenu.css?v=<?php echo time() ?>">
    <script src="js/setup.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setupLeftMenu();
            setSidebarHeight();
        });
    </script>
</head>

<body>
    <div class="container">
        <a class="navbar-brand logo fw-bolder fs-24 text-dark">
            <a href="index.php"><img src="./../img/Blue Calculator Icon Business Logo.png" alt="" style="height: 118px; border-radius: 100px;  margin-top: 25px" /></a>
        </a>
        <div class="navbar-header-admin">
            <div class="headermenu">
                <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right flex-grow-1"><i class="fa fa-user mr-0 text-gray" style="font-size: 20px; color: grey;"></i>
                    <span>Hi <?php echo Session::get('adminName') . "!"
                                ?></span>
                </div>
                <div class="navbar-admin">
                    <ul>
                        <li>
                            <a href="#" class="a_parent"></a>
                            <div class="wrap">
                                <span class="icon"> <img class="img-xs rounded-circle" src="../img/3meoww (2).png" alt="Profile image" style="height: 50px;"></span>
                                <span class="text"><img src="img/chevron-down-solid.svg" alt="" style="height: 10px"> </span>
                            </div>
                            </a>

                            <div class="dd_menu">
                                <ul>
                                    <li>
                                        <a href="inbox.php" class="dd_menu_a">
                                            <div class="wrap">
                                                <span class="icon"> <img src="img/facebook-messenger-brands.svg" style="height: 20px;" alt=""></span>

                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>

                <?php
                if (isset($_GET["action"]) && $_GET["action"] === "logout") {
                    Session::destroy();
                }

                ?>
                <a class="dropdown-item" href="?action=logout">
                    Sign Out
                </a>
            </div>








        </div>
        <!-- </li>

        <?php
        if (isset($_GET["action"]) && $_GET["action"] === "logout") {
            Session::destroy();
        }

        ?>
        <div class="logout"><a href="?action=logout">Logout</a></div> -->
    </div>

    </div>

</body>

</html>


<!-- <!DOCTYPE html>
<html lang="en"> -->

<!-- 
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LocalWareELE</title>
  
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">


    <link rel="stylesheet" href="css/horizontal-layout/style.css">

    <link rel="shortcut icon" href="../img/logomini.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
</head>

<body>
    <div class="container-scroller">
        
        <nav class="navbar horizontal-layout col-lg-12 col-12 p-0">
            <div class="container d-flex flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-top">
                    <a class="navbar-brand brand-logo" href="index.php"><img src="../img/Blue Calculator Icon Business Logo.png" alt="logo" style="border-radius: 50%;height: 64px;" /><b style="color: black;">LocalWare</b><b style="color: rgb(13, 177, 236);">ELE</b></a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-center">
                    <form class="search-field ml-auto" action="#">
                        <div class="form-group mb-0">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                </div>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </form>
                    <ul class="navbar-nav navbar-nav-right mr-0">
                        <li class="nav-item dropdown ml-4">
                            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                                <i class="fa fa-bell" style="color: gray;"></i>
                                <span class="count bg-warning">4</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                                <a class="dropdown-item py-3">
                                    <p class="mb-0 font-weight-medium float-left">You have 4 new notifications
                                    </p>
                                    <span class="badge badge-pill badge-inverse-info float-right">View all</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-inverse-success">
                                            <i class="mdi mdi-alert-circle-outline mx-0"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <h6 class="preview-subject font-weight-normal text-dark mb-1">Application Error</h6>
                                        <p class="font-weight-light small-text mb-0">
                                            Just now
                                        </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-inverse-warning">
                                            <i class="mdi mdi-comment-text-outline mx-0"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <h6 class="preview-subject font-weight-normal text-dark mb-1">Settings</h6>
                                        <p class="font-weight-light small-text mb-0">
                                            Private message
                                        </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-inverse-info">
                                            <i class="mdi mdi-email-outline mx-0"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <h6 class="preview-subject font-weight-normal text-dark mb-1">New user registration</h6>
                                        <p class="font-weight-light small-text mb-0">
                                            2 days ago
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                                <img class="img-xs rounded-circle" src="../img/3meoww (2).png" alt="Profile image">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                                <a class="dropdown-item p-0">
                                    <div class="d-flex border-bottom w-100">
                                        <div class="py-3 px-4 d-flex align-items-center justify-content-center flex-grow-1"><i class="fa fa-bookmark mr-0 text-gray"></i></div>
                                        <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right flex-grow-1"><i class="fa fa-user mr-0 text-gray"></i>
                                            <span>Hi <?php echo Session::get('adminName') . "!"
                                                        ?></span>
                                        </div>
                                        <div class="py-3 px-4 d-flex align-items-center justify-content-center flex-grow-1"><i class="fa fa-clock mr-0 text-gray"></i></div>
                                    </div>
                                </a>
                                <a class="dropdown-item mt-2">
                                    Manage Accounts
                                </a>
                                <a class="dropdown-item">
                                    Change Password
                                </a>
                                <a class="dropdown-item">
                                    Check Inbox
                                </a>
                                <?php
                                if (isset($_GET["action"]) && $_GET["action"] === "logout") {
                                    Session::destroy();
                                }

                                ?>
                                <a class="dropdown-item" href="?action=logout">
                                    Sign Out
                                </a>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="fa fa-bars"></span>
                    </button>

                </div>

        </nav>
    </div>
    <script src="../vendors/js/vendor.bundle.base.js"></script>
    
    <script src="../vendors/chart.js/Chart.min.js"></script>
    <script src="../vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
    <script src="../vendors/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../vendors/raphael/raphael.min.js"></script>
    <script src="../vendors/morris.js/morris.min.js"></script>
    
    <script src="../js/off-canvas.js"></script>
    <script src="../js/hoverable-collapse.js"></script>
    <script src="../js/template.js"></script>
    <script src="../js/settings.js"></script>
    <script src="../js/todolist.js"></script>
   
    <script src="../js/dashboard.js"></script>
   
</body>

</html> -->