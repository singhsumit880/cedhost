<?php
include './header.php';
include './class/User.php';
$check = new User();
if (isset($_GET['data'])) {
    $checkemail = $check->checks($_GET['data']);
    $token = openssl_random_pseudo_bytes(16);

    //Convert the binary data into hexadecimal representation.
    $token = bin2hex($token);

    //Print it out for example purposes.

}

?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Planet Hosting a Hosting Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
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
    <script src="js/modernizr.custom.97074.js"></script>
    <script src="js/jquery.chocolat.js"></script>
    <link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
    <!--lightboxfiles-->

    <!--script-->
</head>

<body>
    <div class="content">
        <!-- registration -->

        <div class="main-1">
            <div class="container">
                <div class="register">
                    <form>
                        <div class="register-top-grid">
                            <h3>personal information</h3>
                            <div>
                                <span>Email<label>*</label></span>
                                <input type="text" name='signupname' maxlength="32" title="First name contain letter only whithout space and special character" pattern="^(?!.*\.{2})[a-zA-Z0-9.]+@[a-zA-Z]+(?:\.[a-zA-Z]+)*$" id='fname' placeholder="Verify Email" value='<?php echo $checkemail[0] ?>' required disabled>
                                <input type="submit" type='button' class='btn btn-success' id='signup' value="Verify" style='margin-top:10px;'>
                            </div>
                            <div>
                                <span>Phone Number<label>*</label></span>
                                <input type="text" id='mobile' name='numbers' pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" title="if 0 then it will be 11 digit else 10 digit" placeholder="Verify Password" value='<?php echo $checkemail[1] ?>' required disabled>
                                <input type='number' name='otp' id='number' placeholder="Enter otp" style='display:none'>
                                <input type="submit" type='button' class='btn btn-success' value='click to verify' name='verification' id='click_to_verify' style='display:none'>
                            </div>


                            <input type="submit" type='button' class='btn btn-success' id='mobiles' name='signup'>


                        </div>
                </div>
            </div>
        </div>
        <?php include './footer.php' ?>
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
        <script>
            $(document).ready(function(ev) {
                email = $("#fname").val()
                phone = $("#mobile").val()
                $("#signup").on("click", function(ev) {
                    ev.preventDefault();
                    $.ajax({
                        method: "POST",
                        url: "email.php",
                        data: {
                            email: email,
                            token: '<?php echo $token ?>',

                        },
                        success: function(result) {
                            alert('Mail Send Successfully');
                            $("#signup").val("re-send");
                        }
                    })
                });
                $("#mobiles").on("click", function(ev) {
                    ev.preventDefault();

                    $.ajax({
                        method: "POST",
                        url: "mobileverify.php",
                        data: {
                            phone: phone,

                        },
                        success: function(result) {
                            alert(result);
                            $("#number").css("display", "block");
                            $("#mobiles").css("display", "none");
                            $("#click_to_verify").css("display", "block");


                        }
                    })
                })
                $("#click_to_verify").on("click", function(ev) {
                    ev.preventDefault();
                    otp = $("#number").val()
                    $.ajax({
                        method: "POST",
                        url: "mobileresponse.php",
                        data: {
                            phone: phone,
                            otp: otp,
                        },
                        success: function(result) {
                            alert(result);
                            window.location.href = 'http://localhost/cedhost/login.php';
                            $("#number").css("display", "block");
                            $("#mobiles").css("display", "none");
                            $("#click_to_verify").css("display", "block");


                        }
                    })
                })

            })
        </script>

</body>

</html>