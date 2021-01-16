<?php 
session_start(); 
if(!isset( $_SESSION['admin'])){
  header('location:../login.php');
}
  include './header.php';
  include_once '../class/Product.php';
  $category=new Product();
  if(isset($_GET['id'])){
  $id=$_GET['id'];
  $categories = $category->fetch_category();
   $product_name=$category->fetch_table_category($id);
    $product=$category->fetch_product($id);
    foreach($product as $key=>$value){
        $data=json_decode($value['description']);    
        $monthly_price=$value['mon_price'];
        $annual_price=$value['annual_price'];
        $sku=$value['sku'];
    }
    $available=$category->availabilitys($_GET['id']);
    

  }
  




  if(isset($_POST['submit'])){
    $product_parent_id=$_POST['parent_category'];
    $product_name=$_POST['product_name'];
    $product_url=$_POST['product_url'];
    $monthly_price=$_POST['monthly_price'];
    $annual_price=$_POST['annual_price'];
    $sku=$_POST['sku'];
    $web_space=$_POST['web_space'];
    $band_width=$_POST['band_width'];
    $free_domain=$_POST['free_domain'];
    $lang_tech=$_POST['lang_tech'];
    $mail_box=$_POST['mail_box'];
    $available=$_POST['availability'];
    $feature=array("Web_Space"=>$web_space,"Band_Width"=>$band_width,"Free_Domain"=>$free_domain,"Language_Technology"=>$lang_tech,"Mail_Box"=>$mail_box);
    $feature=json_encode($feature);
    $check=$category->edit_new_product($product_parent_id,$product_name,$monthly_price,$annual_price,$sku,$feature,$id,$available);
    if($check==1){
      echo "<script>alert('Updated Successfully');window.location.href='view_product.php'</script>"; 
    }if($check==0){
         echo "<script>alert('Product Name Already Exist');window.location.href='view_product.php'</script>"; 
    }
  }

?>
<!-- Header -->
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Update Category</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item">Product<a href="#"></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update Category</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="#" class="btn btn-sm btn-neutral">New</a>
                    <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row justify-content-center">
        <div class=" col ">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h3 class="mb-0">Add New Product</h3>
                </div>
                <form class='mx-auto col-md-12 text-dark' method='POST'>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Product Category</label>
                        <select class="form-control text-dark" name='parent_category' id="exampleFormControlSelect1"
                            required>
                            <?php 
        foreach($categories as $key=>$value)
          {
          if($value['prod_parent_id']==1)
            echo "<option value=".$value['id'].">$value[prod_name]</option>";
          }       
      ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Product Name</label>
                        <input type='text' class="form-control text-dark" id='product_name' onblur="myfun(this.id)"
                            pattern='/(^([A-z]+\-[0-9]+)$)|(^([A-z])+$)/' value='<?php echo $product_name ?>'
                            name='product_name' required>
                        <small id='product_name1'></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Page Url</label>
                        <input type='text' class="form-control text-dark" name='product_url' id='product_url'
                            onblur="myfun(this.id)">
                        <small id='product_url1'></small>
                    </div>


                    <hr class='text-light bg-dark'>



                    <h2 class='pb-0 mb-0'>Product Description</h2>
                    <h4 class='pb-0 mb-0'>Enter Product Description Below</h4>
                    <hr class='pt-0 mt-3'>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Enter Monthley Price</label>
                        <input type='text' class="form-control text-dark" pattern='([0-9]+(\.[0-9]+)?)'
                            placeholder="ex:23" id='monthly_price' value='<?php echo $monthly_price ?>'
                            onblur="myfun(this.id)" name='monthly_price' required>
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            This Would be monthly plane
                        </small>
                        <small id='monthly_price1'></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Enter Annual Price</label>
                        <input type='text' class="form-control text-dark" id='annual_price' onblur="myfun(this.id)"
                            placeholder="ex:23" name='annual_price' pattern='([0-9]+(\.[0-9]+)?)'
                            value='<?php echo $annual_price ?>' required>
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            This Would be annual plane
                        </small>
                        <small id='annual_price1'></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">SKU</label>
                        <input type='text' class="form-control text-dark"
                            pattern="^[a-zA-Z0-9#](?:[a-zA-Z0-9_-]*[a-zA-Z0-9])?$" value='<?php echo $sku ?>' id='sku'
                            onblur="myfun(this.id)" name='sku' required>
                    </div>
                    <small id='sku1'></small>



                    <hr>



                    <h2 class='pb-0 mb-0'>Features</h2>
                    <hr class='pt-0 mt-3'>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Web Space (in GB)*</label>
                        <input type='text' class="form-control text-dark" pattern='([0-9]+(\.[0-9]+)?)'
                            value='<?php echo $data->Web_Space ?>' id='web_space' onblur="myfun(this.id)"
                            name='web_space' required>
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            Enter 0.5 to 512 mb
                        </small>
                        <small id='web_space1'></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Availability</label>
                        <select class="browser-default custom-select text-dark" name='availability'>

                            <?php 
                                if($available==0){
                                    echo "<option value='0'>Unavailable</option>
                                            <option value='1'>Available</option>";
                                }else{
                                     echo " <option value='1'>Available</option>
                                     <option value='0'>Unavailable</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Band Width (in GB)*</label>
                        <input type='text' class="form-control text-dark" pattern='([0-9]+(\.[0-9]+)?)'
                            value='<?php echo $data->Band_Width ?>' name='band_width' id='band_width'
                            onblur="myfun(this.id)" required>
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            Enter 0.5 to 512 mb
                        </small>
                        <small id='band_width1'></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Free Domain</label>
                        <input type='text' class="form-control text-dark" id='free_domain' onblur="myfun(this.id)"
                            pattern="((^[0-9]*$)|(^[A-Za-z]+$))" value='<?php echo $data->Free_Domain ?>'
                            name='free_domain' required>
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            Enter 0 if no domain available in this service
                        </small>
                        <small id='free_domain1'></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Language / Technology Support</label>
                        <input type='text' class="form-control text-dark"
                            value='<?php echo $data->Language_Technology ?>' name='lang_tech' id='lang_tech'
                            pattern='^[a-zA-Z0-9]*[a-zA-Z]+[0-9]*(,?([a-zA-Z0-9]*[a-zA-Z]+[0-9]*)+)*$'
                            onblur="myfun(this.id)" required>
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            Separate by (,) Ex: PHP, MySQL, MongoDB
                        </small>
                        <small id='lang_tech1'></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Mailbox</label>
                        <input type='text' class="form-control text-dark" name='mail_box' id='mail_box'
                            value='<?php echo $data->Mail_Box ?>' onblur="myfun(this.id)"
                            pattern='((^[0-9]*$)|(^[A-Za-z]+$))' required>
                        <small id='mail_box1'></small>
                    </div>


                    <input type='submit' value='submit' name='submit' class='btn btn-success mb-4'>
                </form>

            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include './footer.php'; ?>

    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="./assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="./assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="./assets/vendor/clipboard/dist/clipboard.min.js"></script>
    <!-- Argon JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link rel='stylesheet' href="./assets/css/datatable.css">
    <script src="./assets/js/argon.js?v=1.2.0"></script>
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js">
    </script>
    <script type="text/javascript" charset="utf8"
        src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

    <script>
    function myfun(id) {
        var value = document.getElementById(id).value;
        values = id + 1;
        if (value == 0) {

            document.getElementById(id).style.border = '2px solid red';
            document.getElementById(values).style.color = 'red';
            document.getElementById(values).innerHTML = 'Enter Value';


        }
    }

    $(document).ready(function() {
        flag = 0;
        $("#mail_box").keyup(function() {
            var v = $(this).val();
            var reg = new RegExp('((^[0-9]*$)|(^[A-Za-z]+$))');
            if (reg.test(v)) {
                $("#mail_box1").html("");
                $("#mail_box").css("border", "1px solid green");
                flag = flag + 1;

            } else {
                $("#mail_box1").css("color", "red");
                $("#mail_box1").html("invalid");
                $("#mail_box").css("border", "1px solid red");

            }

        });
        $("#sku").keyup(function() {
            var v = $(this).val();
            var reg = new RegExp('^[a-zA-Z0-9#](?:[a-zA-Z0-9_-]*[a-zA-Z0-9])?$');
            if (reg.test(v)) {
                $("#sku1").html("");
                $("#sku").css("border", "1px solid green");
                flag = flag + 1;

            } else {
                $("#sku1").css("color", "red");
                $("#sku1").html("only '#' is allowed in starting, '-' special char allowed");
                $("#sku").css("border", "1px solid red");

            }

        });

        $("#lang_tech").keyup(function() {
            var v = $(this).val();
            var reg = new RegExp('^[a-zA-Z0-9]*[a-zA-Z]+[0-9]*(,?([a-zA-Z0-9]*[a-zA-Z]+[0-9]*)+)*$');
            if (reg.test(v)) {
                $("#lang_tech1").html("");
                $("#lang_tech").css("border", "1px solid green");
                flag = flag + 1;

            } else {
                $("#lang_tech1").css("color", "red");
                $("#lang_tech1").html(
                    "Only ',' allowed as special char Only alphabetic/ alpha-numeric");
                $("#lang_tech").css("border", "1px solid red");

            }

        });
        $("#free_domain").keyup(function() {
            var v = $(this).val();
            var reg = new RegExp("((^[0-9]*$)|(^[A-Za-z]+$))");
            if (reg.test(v)) {
                $("#free_domain1").html("");
                $("#free_domain").css("border", "1px solid green");
                flag = flag + 1;

            } else {
                $("#free_domain1").css("color", "red");
                $("#free_domain1").html("Only numeric/ only alphabetic");
                $("#free_domain").css("border", "1px solid red");

            }

        });
        $("#product_name").keyup(function() {
            var v = $(this).val();
            var reg = new RegExp(
                /^[a-zA-Z]*[-\s]?[a-zA-Z]+[-\s]?[0-9]*(([a-zA-Z0-9]*[-\s]?[a-zA-Z]+[-\s]?[0-9]*)+)*$/
                );
            if (reg.test(v)) {
                $("#product_name1").html("");
                $("#product_name").css("border", "1px solid green");

            } else {
                $("#product_name1").css("color", "red");
                $("#product_name1").html("Alpha numeric/ alphabetic");
                $("#product_name").css("border", "1px solid red");

            }

        });

        $("#monthly_price").on('keyup', function() {
            var v = $(this).val();
            var reg = new RegExp('([0-9]+(\.[0-9]+)?)');
            if ($.isNumeric(v)) {
                $("#monthly_price1").html("");
                $("#monthly_price").css("border", "1px solid green");
                flag = flag + 1;

            } else {
                $("#monthly_price1").css("color", "red");
                $("#monthly_price1").html("invalid");
                $("#monthly_price").css("border", "1px solid red");

            }

        })
        $("#annual_price").keyup(function() {
            var v = $(this).val();
            var reg = new RegExp('([0-9]+(\.[0-9]+)?)');
            if ($.isNumeric(v)) {
                $("#annual_price1").html("");
                $("#annual_price").css("border", "1px solid green");
                flag = flag + 1;

            } else {
                $("#annual_price1").css("color", "red");
                $("#annual_price").css("border", "1px solid red");
                $("#annual_price1").html("invalid");

            }

        })

        $("#web_space").keyup(function() {
            var v = $(this).val();
            var reg = new RegExp('([0-9]+(\.[0-9]+)?)');
            if ($.isNumeric(v)) {
                $("#web_space1").html("");
                $("#web_space").css("border", "1px solid green");
                flag = flag + 1;

            } else {
                $("#web_space1").css("color", "red");
                $("#web_space1").html("invalid");
                $("#web_space").css("border", "1px solid red");

            }

        })
        $("#band_width").keyup(function() {
            var v = $(this).val();
            var reg = new RegExp('([0-9]+(\.[0-9]+)?)');
            if ($.isNumeric(v)) {
                $("#band_width1").html("");
                $("#band_width").css("border", "1px solid green");
                flag = flag + 1;

            } else {
                $("#band_width").css("border", "1px solid red");
                $("#band_width1").css("color", "red");
                $("#band_width1").html("invalid");

            }

        })
        if (flag < 9) {
            $("#submit").css("display", "disabled")
        }


    })
    </script>

    </body>

    </html>