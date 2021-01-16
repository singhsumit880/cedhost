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
    <?php include './header.php' ?>
    <!---header--->
    <!---login--->
    <div class="content">
        <!-- registration -->
        <form method='post' action='./signup_data.php'>
            <div class="main-1">
                <div class="container">
                    <div class="register">
                        <form>
                            <div class="register-top-grid">
                                <h3>personal information</h3>
                                <div>
                                    <span>Full Name<label>*</label></span>
                                    <input type="text" name='signupname' maxlength="32" title="First name contain letter only whithout space and special character" pattern="^([A-Za-z]+ )+[A-Za-z]+$|^[A-Za-z]+$" id='fname' onblur="myfun(this.id)" placeholder="Firstname" required>
                                </div>
                                <div>
                                    <span>Phone Number<label>*</label></span>
                                    <input type="text" name='mobile' id='mobile' onblur="myfun(this.id)" pattern="^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$" title="if 0 then it will be 11 digit else 10 digit" placeholder="mobile Number must be 10 digit" required>
                                </div>
                                <div>
                                    <span>Email Address<label>*</label></span>
                                    <input type="text" name='signupemail' id='signupmail' onblur="myfun(this.id)" pattern="^(?!.*\.{2})[a-zA-Z0-9.]+@[a-zA-Z]+(?:\.[a-zA-Z]+)*$" title="valid@email.com" placeholder="example@mail.com" required>


                                </div>
                                <select name="question" style='margin-top:29px;padding:5px;' required>
                                    <option>Select Your Security Question</option>
                                    <option value="What Was The First Book You Ever Read">What is you nick name?
                                    </option>
                                    <option value="What is Your Best Friend Name">What is Your Pet name?</option>
                                    <option value="What is Your Dream Job">What is Your Best friend name?</option>
                                    <option value="Your Favorite Food">Your Favorite Book?</option>
                                    <option value="Your Favorite Movie">Your Favorite Movie?</option>
                                    <input type="text" name='answer' maxlength="32" pattern='^([A-Za-z0-9]+ )+[A-Za-z0-9]+$|^[A-Za-z0-9]+$' id='answer' onblur="myfun(this.id)" style='width:270px;margin:10px;' required>

                                </select>




                                <div class="clearfix"> </div>

                                <a class="news-letter" href="#">
                                    <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i>
                                        </i>Sign Up for Newsletter</label>
                                </a>
                            </div>
                            <div class="register-bottom-grid">
                                <h3>login information</h3>
                                <div>

                                    <span>Password<label>*</label></span>
                                    <input type="password" name='signuppassword' id='signuppassword' onblur="myfun(this.id)" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$" required>
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        Your password must be 8-20 characters long, contain letters and numbers, and
                                        must not contain spaces, special characters, or emoji.
                                    </small>
                                </div>
                                <div>
                                    <span>Confirm Password<label>*</label></span>
                                    <input type="password" name='signuppassword2' id='signuppassword2' onblur="myfun(this.id)" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$" required>
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        Your password must be 8-20 characters long, contain letters and numbers, and
                                        must not contain spaces, special characters, or emoji.
                                    </small>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix"> </div>
                        <div class="register-but">

                            <input type="submit" type='button' class='btn btn-warning' name='signup' id='submit' value="submit">
                            <div class="clearfix"> </div>
        </form>
    </div>
    </div>
    </div>
    </div>
    <!-- registration -->

    </div>
    <!-- login -->
    <!---footer--->
    <?php include './footer.php'; ?>
    <!---footer--->
    <script>
        function myfun(id) {
            data = document.getElementById(id).value;
            if (data == 0) {
                $("#" + id).css("border", "1px solid red");
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $("#fname").keyup(function() {
                name = $("#fname").val()
                var reg = new RegExp("^([A-Za-z]+ )+[A-Za-z]+$|^[A-Za-z]+$");
                if (reg.test(name)) {
                    $("#fname").css("border", "1px solid green");
                    $("#submit").removeAttr("disabled");
                } else {
                    $("#fname").css("border", "1px solid red");
                    $("#submit").prop("disabled", "true");
                }
            })

           
        })
    </script>

</body>

</html>