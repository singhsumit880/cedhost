<?php
session_start();
$temp=$_SESSION['datas'];


?>

<!DOCTYPE HTML>
<html>
<head>
  <title>Planet Hosting a Hosting Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Planet Hosting Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
  Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/bootstrap.js"></<div class="showdata">
  <link href='//fonts.googleapis.com/css?family=Voltaire' restate_listl='stylesheet' type='text/css'>
  <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="js/modernizr.custom.97074.js"></script>
  <script src="js/jquery.chocolat.js"></script>
  <link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">

<script type="text/javascript" src="js/jquery.hoverdir.js"></script>  
<script type="text/javascript">
  $(function() {

    $(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );

  });
</script>          


</head>
<body>
  <?php include 'header.php'; ?>
  <!---banner--->
  <div class="container">
    <div class="row">
      <div class="col-lg-5">
        <form>
          <h2>Billing Address</h2><br>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name">
          </div>
     
          <div class="form-group">
            <label for="ciname">City</label>
            <input type="text" class="form-control" id="city" placeholder="Enter city">
          </div>
          <div class="form-group">
            <label for="sname">State</label>
            <select name="state" id="state" class="form-control">
            <option value="Andhra Pradesh">Andhra Pradesh</option>
            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
            <option value="Assam">Assam</option>
            <option value="Bihar">Bihar</option>
            <option value="Chandigarh">Chandigarh</option>
            <option value="Chhattisgarh">Chhattisgarh</option>
            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
            <option value="Daman and Diu">Daman and Diu</option>
            <option value="Delhi">Delhi</option>
            <option value="Lakshadweep">Lakshadweep</option>
            <option value="Puducherry">Puducherry</option>
            <option value="Goa">Goa</option>
            <option value="Gujarat">Gujarat</option>
            <option value="Haryana">Haryana</option>
            <option value="Himachal Pradesh">Himachal Pradesh</option>
            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
            <option value="Jharkhand">Jharkhand</option>
            <option value="Karnataka">Karnataka</option>
            <option value="Kerala">Kerala</option>
            <option value="Madhya Pradesh">Madhya Pradesh</option>
            <option value<script src="https://www.paypal.com/sdk/js?client-id=sb"></script>="Maharashtra">Maharashtra</option>
            <option value="Manipur">Manipur</option>
            <option value="Meghalaya">Meghalaya</option>
            <option value="Mizoram">Mizoram</option>
            <option value="Nagaland">Nagaland</option>
            <option value="Odisha">Odisha</option>
            <option value="Punjab">Punjab</option>
            <option value="Rajasthan">Rajasthan</option>
            <option value="Sikkim">Sikkim</option>
            <option value="Tamil Nadu">Tamil Nadu</option>
            <option value="Telangana">Telangana</option>
            <option value="Tripura">Tripura</option>
            <option value="Uttar Pradesh">Uttar Pradesh</option>
            <option value="Uttarakhand">Uttarakhand</option>
            <option value="West Bengal">West Bengal</option>
            </select>
          </div>
          <div class="form-group">
            <label for="cname">Country</label>
            <input type="text" class="form-control" value="India" readonly id="name" placeholder="Enter country name">
          </div>
          <div class="form-group">
            <label for="pname">Pincode</label>
            <input type="text" class="form-control" id="pincode" placeholder="Enter pincode">
            <button type="submit" id="cod" class="btn btn-lg btn-danger">COD</button><br>
            <script src="https://www.paypal.com/sdk/js?client-id=ARjb-fAxVFnAiX7oTqjOFdHEwLLDt9LSw_8zfQ2DZVHQ2IkbexFjnfnoIY_hbu9tRiJ281zFDO5itDAW"></script>
            <div id="paypal-button"></div>
          </div>
         
          
 
        </form>

      </div>
      <div class="col-lg-5">
        <h2>Product Details</h2>
        <?php
        foreach ($temp as $key => $value) {
                echo "<br><h4>Product Name: $value[product_name]<br>
                Price : Monthly :: ₹ $value[monthly_price], 
                Annual :: ₹ $value[annual_price]<br>
                Product Id : $value[productid]</h4><br>";
            }
            ?>

      </div>
    
    </div>
  </div>
  <script>
  paypal.Buttons({
 createOrder: function(data, actions){
   return actions.order.create({
     purchase_units:[{
       amount:{
         value:'100'
       }
     }]
   });

 },
 onApprove: function(data, actions){
   return actions.order.capture().then(function(details){
     alert("Payment Successfull");
     
     console.log(details);
   })
 },
 onCancel: function(data)
 {
   console.log(data);
   alert("Payment Failed");
 }
}).render('#paypal-button');
  </script>
  </body>
  </html>

