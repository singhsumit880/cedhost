<?php
include './class/Product.php';
session_start();

$product         = new Product();
if (base64_decode($_GET['id'])) {
	$sub = $product->fetch_parent_node(base64_decode($_GET['id']));
	$_SESSION["sub"] = $sub;
	if (!isset($_SESSION['datas'])) {
		$_SESSION['datas'] = array();
	}
	$html = $product->fetch_parent_link(base64_decode($_GET['id']));
} else {
	header("location:./index.php");
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
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
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
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<!---fonts-->
	<!--script-->
	<script src="js/modernizr.custom.97074.js"></script>
	<script src="js/jquery.chocolat.js"></script>
	<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
	<!--lightboxfiles-->
	<script type="text/javascript">
		$(function() {
			$('.team a').Chocolat();
		});
	</script>
	<script type="text/javascript" src="js/jquery.hoverdir.js"></script>
	<script type="text/javascript">
		$(function() {

			$(' #da-thumbs > li ').each(function() {
				$(this).hoverdir();
			});

		});
	</script>
	<!--script-->
</head>
<?php include './header.php'; ?>
<div class="linux-section">
	<div class="container">
		<div class="linux-grids">
			<div class="col-md-8 linux-grid">
				<h2><?php echo $sub; ?></h2>
				<ul>
				<?php echo $html; ?>
				</ul>
				<a href="#data">view plans</a>
			</div>

			<div class="col-md-4 linux-grid1">

			<?php
                    $patternarray=array("/window/i", "/word/i", "/cms/i", "/linux/i", "/mac/i","/cloud/i");
                    $temp=true;
                    foreach ($patternarray as $val) {
                        if (preg_match($val, $sub)) {
                            $temp=false;
                            $str=str_replace("/", "", $val);
                            $strfinal=rtrim($str, "i");
                            echo '<img src="images/'.$strfinal.'.png" class="img-responsive" alt=""/>';
                            break;
                        }
                    }
                    if ($temp==true) {
                        echo '<img src="images/window.png" class="img-responsive" alt=""/>';
                    }
                    ?>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<div class="tab-prices">
	<div class="container">
		<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			<div id="myTabContent" class="tab-content">
				<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
					<div class="linux-prices">
						<div class="content">
							<div class="linux-prices" id='data'>
							<div class='container'>

<?php
$product = new Product();
$sub     = $product->fetch_parent_node($_GET['id']);
$id      = base64_decode($_GET['id']);
if (isset($id)) {
	$SubCategoryId = $id;
	$_SESSION['SubCategoryId'] = $SubCategoryId;
	$_SESSION['id_sub'] = $SubCategoryId;
	$data = $product->fetch_new_products($SubCategoryId);
		if ($data) {
			foreach ($data as $element) {
				$productId = $element['id'];
				$category = $element['prod_parent_id'];
				$productName = $element['prod_name'];
				$_SESSION['prod_name'] = $productName;
				$link = $element['html'];
				$monthlyPrice = $element['mon_price'];
				$annualPrice = $element['annual_price'];
				$sku = $element['sku'];
				$description = json_decode($element['description']);
				$webspace = $description->Web_Space;
				$bandwidth = $description->Band_Width;
				$freeDomain= $description->Free_Domain;
				$language = $description->Language_Technology;
				$mailbox = $description->Mail_Box;
				$availablity = $element['prod_available'];	
				$datavalue = array(
					"productid" => $productId, 
					"category" => $category, 
					"product_name"=> $productName,
					"monthly_price" => $monthlyPrice, 
					"annual_price" => $annualPrice, 
					"sku" => $sku, 
					"webspace"  => $description->Web_Space,
					"band_width" => $description->Band_Width, 
					"freedomain" => $description->Free_Domain, 
					"language" => $description->Language_Technology, 
					"mailbox" => $description->Mail_Box,
				);?>
	<div class="col-md-3 linux-price">
		<div class="linux-top">
			<h4><?php echo $productName ?></h4>
		</div>
		<div class="linux-bottom">
			<h5>&#x20B9;<?php echo $monthlyPrice ?> <span class="month">per month</span></h5>
			<h5>&#x20B9;<?php echo $annualPrice ?> <span class="month">per Annum</span></h5>
			<h6><?php echo $freeDomain ?> Domain</h6>
			<ul>
				<li><strong><?php echo $webspace ?></strong> GB Web Space</li>
				<li><strong><?php echo $bandwidth ?></strong> GB BandWidth</li>
				<li><strong><?php echo $mailbox ?></strong> Mailbox</li>
				<li><strong><?php echo $language ?></strong>Language/Technology</li>
				<li><strong>High Performance</strong> Servers</li>
				<li><strong>location</strong> : <img src="images/india.png"></li>
			</ul>
			</div>
				<?php echo "<a href='checkout.php?name=" . base64_encode($productName) . "'>buy now</a>" ?>
			</div>

		
		<?php
			}
		}
	} ?>

	

								</div>
								<div class="clearfix"></div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</div>





<div class="whatdo">
						<div class="container">
							<h3><?php echo $productName; ?> Features</h3>
							<div class="what-grids">
								<div class="col-md-4 what-grid">
									<div class="what-left">
									<i class="glyphicon glyphicon-cog" aria-hidden="true"></i>
									</div>
									<div class="what-right">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="col-md-4 what-grid">
									<div class="what-left">
									<i class="glyphicon glyphicon-dashboard" aria-hidden="true"></i>
									</div>
									<div class="what-right">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="col-md-4 what-grid">
									<div class="what-left">
									<i class="glyphicon glyphicon-stats" aria-hidden="true"></i>
									</div>
									<div class="what-right">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="what-grids">
								<div class="col-md-4 what-grid">
									<div class="what-left">
									<i class="glyphicon glyphicon-download-alt" aria-hidden="true"></i>
									</div>
									<div class="what-right">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="col-md-4 what-grid">
									<div class="what-left">
									<i class="glyphicon glyphicon-move" aria-hidden="true"></i>
									</div>
									<div class="what-right">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="col-md-4 what-grid">
									<div class="what-left">
									<i class="glyphicon glyphicon-screenshot" aria-hidden="true"></i>
									</div>
									<div class="what-right">
										<h4>Expert Web Design</h4>
										<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

				</div>
<?php include './footer.php' ?>
</body>

</html>