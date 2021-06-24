<?php include 'inc/header.php'; ?>

<?php
$product = new products();
// kiem tra
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    $insertCustomer = $cust->insert_customer($_POST);
}
?>
<link rel="stylesheet" href="./admin/css/layout.css">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/bootstrap.css.map">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/styledetails.css">
<link rel="stylesheet" href="css/style.min.css">
<link rel="stylesheet" href="css/materialdesignicons.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/styleprofile.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">



<div>
    <?php

    ?>
    <h3 class="mt-5 mb-3" style="text-align:center">Create your account</h3>
    <?php
    if (isset($insertCustomer)) {
        echo $insertCustomer;
    }
    ?>
    <form method="POST" action="">
        <div class="row g-4 mb-2" style="display:grid; padding-left:33%">
            <div class="col-lg-6">
                <div class="form-floating mb-3">
                    <label class="text-muted">Your name <span style="color: rgb(218, 15, 15);">*</span></label>
                    <input type="username" name="name" class="form-control" placeholder="Your name">

                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-floating mb-3">
                    <label class="text-muted">Password <span style="color: rgb(218, 15, 15);">*</span></label>
                    <input type="password" name="password" class="form-control" placeholder="Your password">

                </div>
            </div>
            <!-- <div class="col-lg-6">
                <div class="form-floating mb-3">
                    <label class="text-muted">City <span style="color: rgb(218, 15, 15);">*</span></label>
                    <input type="text" name="city" class="form-control" placeholder="Your city">

                </div>
            </div> -->
            <!-- <div class="col-lg-6">
                <div class="form-floating mb-3">
                    <p><label class="text-muted">Country</label></p>
                    <select id="country" name="country" onchange="chang_country(this.value)" class="frm-field required" style="width:100%">
                        <option value="null">Select a Country</option>
                        <option value="Thủ Đô Hà Nội">Hà Nội</option>
                        <option value="TP.HCM">Thành Phố Hồ Chí Minh</option>
                       <option value="">Việt Nam</option>
                        <option value="Việt Nam">Việt Nam</option>
                        <option value="Việt Nam">Việt Nam</option>
                        <option value="Việt Nam">Việt Nam</option> 
                    </select>


                </div>
            </div> -->
            <div class="col-lg-6">
                <div class="form-floating mb-3">
                    <label class="text-muted">Phone <span style="color: rgb(218, 15, 15);">*</span></label>
                    <input type="text" name="phone" class="form-control" placeholder="Your phone">

                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-floating mb-3">
                    <label class="text-muted">Address <span style="color: rgb(218, 15, 15);">*</span></label>
                    <input type="text" name="address" class="form-control" placeholder="Your address">

                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-floating mb-3">
                    <label class="text-muted">Email Address <span style="color: rgb(218, 15, 15);">*</span></label>
                    <input type="email" name="email" class="form-control" placeholder="Your email">

                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12 mt-2" style="text-align:center">
                <input type="submit" name="submit" class="btn btn-primary" value="Sign up" />
            </div>
        </div>
    </form>
</div>
</div>
</div>
<br>
<br>
<br>
<br>
<br>
<?php include 'inc/footer.php'; ?>