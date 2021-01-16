<?php
session_start();
if (isset($_SESSION['email'])) {
    header('location: index.php');
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
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!---fonts-->
    <!--script-->
    <link rel="stylesheet" href="css/swipebox.css">
    <script src="js/jquery.swipebox.min.js"></script>
    <script type="text/javascript">
        jQuery(function($) {
            $(".swipebox").swipebox();
        });
    </script>
    <!--script-->
</head>

<body>
    <!---header--->
    <?php include './header.php';

    ?>
    <!---header--->
    <!---login--->
    <form method='post' action='./signup_data.php'>
        <div class="content">
            <div class="main-1">
                <div class="container">
                    <div class="login-page">
                        <div class="account_grid">
                            <div class="col-md-6 login-left">
                                <h3>new customers</h3>
                                <p>By creating an account with our store, you will be able to move through the checkout
                                    process faster, store multiple shipping addresses, view and track your orders in
                                    your account and more.</p>
                                <a class="acount-btn" href="account.php">Create an Account</a>
                            </div>
                            <div class="col-md-6 login-right">
                                <h3>registered</h3>
                                <p>If you have an account with us, please log in.</p>
                                <form>
                                    <div>
                                        <span>Email Address<label>*</label></span>
                                        <input name='email' type="text" pattern="[a-zA-Z0-9.!#$%&amp;’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)+" title="valid@email.com" placeholder="valid@mail.com" required>
                                    </div>
                                    <div>
                                        <span>Password<label>*</label></span>
                                        <input type="password" name='password' required>
                                    </div>
                                    <br>
                                    <input type="submit" name='login' value="Login">
                                </form>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- login -->
    <!---footer--->
    <?php include './footer.php'; ?>
    <!---footer--->
</body>

</html>