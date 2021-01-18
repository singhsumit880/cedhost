<?php
session_start();
include './class/Product.php';
$product = new Product();

if (isset($_GET['name'])) {
 $name = base64_decode($_GET['name']);
 $prod = $product->fetch_cart_products($_SESSION['id_sub'], $name);
 foreach ($prod as $element) {
  $productId             = $element['id'];
  $category              = $element['prod_parent_id'];
  $productName           = $element['prod_name'];
  $_SESSION['prod_name'] = $productName;
  $link                  = $element['html'];
  $monthlyPrice          = $element['mon_price'];
  $annualPrice           = $element['annual_price'];
  $sku                   = $element['sku'];
  $description           = json_decode($element['description']);
  $webspace              = $description->Web_Space;
  $bandwidth             = $description->Band_Width;
  $freeDomain            = $description->Free_Domain;
  $language              = $description->Language_Technology;
  $mailbox               = $description->Mail_Box;
  $availablity           = $element['prod_available'];
  $datavalue             = array(
   "productid"     => $productId,
   "category"      => $category,
   "product_name"  => $productName,
   "monthly_price" => $monthlyPrice,
   "annual_price"  => $annualPrice,
   "sku"           => $sku,
   "webspace"      => $description->Web_Space,
   "band_width"    => $description->Band_Width,
   "freedomain"    => $description->Free_Domain,
   "language"      => $description->Language_Technology,
   "mailbox"       => $description->Mail_Box,
  );

 }
 array_push($_SESSION['datas'], $datavalue);
 $_SESSION['datas'] = array_map("unserialize", array_unique(array_map("serialize", $_SESSION['datas'])));
}

?>
<!DOCTYPE HTML>
<html>

<head>
   <title>CedHost</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Planet Hosting Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <!---fonts-->
    <link href='//fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
    <link
        href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
        rel='stylesheet' type='text/css'>
    <!---fonts-->
    <!--script-->
    <script src="js/modernizr.custom.97074.js"></script>
    <script src="js/jquery.chocolat.js"></script>
    <link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
    <!--lightboxfiles-->
    <script type="text/javascript">
    $(function() {
        $('.team a      <h4>Quantity : <?php echo $value1[5]?></h4>
        $(' #da-thumbs > li ').each(function() {
            $(this).hoverdir();
        });

    });
    </script>
    <!--script-->
</head>

<body>
    <?php include 'header.php' ?>


    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Monthly Price</th>
                    <th scope="col">Annual Price</th>
                    <th scope="col">Web Space</th>
                    <th scope="col">Band Width</th>
                    <th scope="col">Free Domain</th>
                    <th scope="col">Language Technology</th>
                    <th scope="col">Mail Box</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
if (isset($_SESSION['datas'])) {
 foreach ($_SESSION['datas'] as $key => $value) {
  echo "<tr><td>$value[product_name]</td><td>$value[monthly_price]</td><td>$value[annual_price]</td><td>$value[webspace]</td><td>$value[band_width]</td><td>$value[freedomain]</td><td>$value[language]</td><td>$value[mailbox]</td><td><a href='deletefromcart.php?id=" . $value['productid'] . "'>Delete</a></td> </tr>"

 ;
 }
}

?>
                <tr>
            </tbody>
        </table>
    </div>
    <a class="btn btn-primary" href="payment.php" role="button">CheckOut</a>

    <?php include 'footer.php' ?>