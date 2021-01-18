	<?php

if(!isset($_SESSION)) 
{ 
	session_start(); 
}
	include_once './class/Product.php';
	$fetch = new Product();
	$product = $fetch->fetch_all_category();
	$filename = basename($_SERVER['REQUEST_URI']);
	$files    = array("index.php", "services.php", "pricing.php", "blog.php", "contact.php", "account.php", "linuxhosting.php", "wordpresshosting.php", "windowshosting.php", "cmshosting.php");
	if (isset($_SESSION['email'])) {
		$data = '<li><a href="logout.php">Logout</a></li>';
	} else {
		$data = '<li><a href="login.php">Login</a></li>';
	}



	$temp=$_SESSION['datas'];
	$i=count($temp);
	?>

	<div class="header">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<i class="sr-only">Toggle navigation</i>
							<i class="icon-bar"></i>
							<i class="icon-bar"></i>
							<i class="icon-bar"></i>
						</button>
						<div class="navbar-brand">
							<img src="logo.png" height=70 width=80 class='pt-0 col col-6'>
						</div>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li <?php if ($filename == 'index.php') : ?> class="active" <?php endif; ?>><a href="index.php">Home <i class="sr-only">(current)</i></a></li>
							<li <?php if ($filename == 'about.php') : ?> class="active" <?php endif; ?>><a href="about.php">About</a></li>
							<li <?php if ($filename == 'services.php') : ?> class="active" <?php endif; ?>><a href="services.php">Services</a></li>


							<li class="dropdown <?php if ($filename == 'linuxhosting.php' || $filename == 'wordpresshosting.php' || $filename == 'windowshosting.php' || $filename == 'cmshosting.php') : ?> active <?php endif; ?>">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hosting<i class="caret"></i></a>
								<ul class="dropdown-menu">
									<?php
									foreach ($product as $key => $value) {
										if ($value['prod_available'] == 1)
											echo "<li><a href='catpage.php?id=" . base64_encode($value['id']) . "'>$value[prod_name]</a></li>";
									}
									?>

								</ul>
							</li>
							<li <?php if ($filename == 'pricing.php') : ?> class="active" <?php endif; ?>><a href="pricing.php">Pricing</a></li>
							<li <?php if ($filename == 'blog.php') : ?> class="active" <?php endif; ?>><a href="blog.php">Blog</a></li>
							<li <?php if ($filename == 'contact.php') : ?> class="active" <?php endif; ?>><a href="contact.php">Contact</a></li>
							<li <?php if ($filename == 'checkout.php') : ?> class="active" <?php endif; ?>><a href="checkout.php"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm$temp=$_SESSION['datas'];7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
									</svg><span class="badge badge-pill badge-primary"><?php echo $i; ?></span></a></li>
							<?php echo $data ?>
						</ul>

					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</div>
	</div>