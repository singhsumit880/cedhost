<?php

include_once 'Dbcon.php';
class Product
{
 public $host = "localhost";
 public $user = "root";
 public $pass = "";
 public $db   = "CedHosting";
 public $conn;
 public function __construct()
 {
  $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
 }

 public function fetch_category()
 {
  $sql = mysqli_query($this->conn, "SELECT * From tbl_product");
  return $sql;
 }
 //function to add sub category in database
 public function add_sub_categories($category_id,$name)
 {
  $sql    = mysqli_query($this->conn, "SELECT * from tbl_product where prod_name='$name'");
  $result = $sql->num_rows;
  if ($result > 0) {
   return 0;
  } else {
   $sql = mysqli_query($this->conn, "INSERT INTO tbl_product (prod_parent_id,prod_name,prod_available,prod_launch_date) VALUES ('$category_id','$name','1',now())");
   return 1;
  }

 }

 public function fetch_all_category() 
 {
  $sql = mysqli_query($this->conn, "SELECT * from tbl_product where prod_parent_id='1'");
  return $sql;
 }

 public function fetch_table_category($id)
 {

  $sql = mysqli_query($this->conn, "SELECT * from tbl_product where id='$id'");
  while ($data = mysqli_fetch_assoc($sql)) {
   return $data['prod_name'];
  }
 }

 public function edit_sub_categories($category_id, $subcategory, $available, $id)
 {
  $sql    = mysqli_query($this->conn, "SELECT * FROM tbl_product where prod_name='$subcategory' and id!='$id'");
  $result = $sql->num_rows; 
  if ($result > 0) {
   return 0;
  } else {
   $sql = mysqli_query($this->conn, "UPDATE tbl_product set prod_parent_id='$category_id',prod_name='$subcategory',prod_available='$available' where id='$id'");
   return 1;
  }
 }
 
 public function delete_category($id)
 {
  $sql = mysqli_query($this->conn, "DELETE from tbl_product where id='$id'");
  return 1;
 }
 public function add_new_product($product_parent_id, $product_name,$monthly_price, $annual_price, $sku, $feature)
 {
  $enter_into_category = mysqli_query($this->conn, "INSERT INTO tbl_product (prod_parent_id,prod_name,prod_available,prod_launch_date) VALUES ('$product_parent_id','$product_name','1',now())");
  $id = $this->conn->insert_id;
  if ($enter_into_category) {
   $new_product = mysqli_query($this->conn, "INSERT INTO tbl_product_description (prod_id,description,mon_price,annual_price,sku) VALUES ('$id','$feature','$monthly_price','$annual_price','$sku')");
   return 1;
  }
 }

 public function view_table()
 {
  $sql = mysqli_query($this->conn, "SELECT tbl_product_description.id,prod_id,description,mon_price,annual_price,sku,tbl_product.id,prod_parent_id,prod_name,html,prod_available,prod_launch_date FROM tbl_product_description INNER JOIN tbl_product ON tbl_product_description.prod_id =tbl_product.id");
  return $sql;

 }
 public function delete_product($id)
 {
  $sql = mysqli_query($this->conn, "DELETE tbl_product, tbl_product_description FROM tbl_product INNER JOIN tbl_product_description ON tbl_product.id=tbl_product_description.prod_id WHERE tbl_product.id='$id'");
  return 1;
 }
 public function fetch_product($id)
 {
  $sql = mysqli_query($this->conn, "SELECT * from tbl_product_description where prod_id='$id'");
  return $sql;
 }
 public function edit_new_product($product_parent_id, $product_name, $monthly_price, $annual_price, $sku, $feature, $id, $available)
 {
  $sql=mysqli_query($this->conn,"SELECT * from tbl_product where prod_name='$product_name' and id!='$id'");
  $result=$sql->num_rows;
  if($result>0){
    return false;
  }else{
  $query = mysqli_query($this->conn, "UPDATE tbl_product_description INNER JOIN tbl_product ON tbl_product_description.prod_id = tbl_product.id SET tbl_product.prod_name = '$product_name', tbl_product.prod_parent_id ='$product_parent_id', tbl_product.html = NULL, tbl_product.prod_available = '$available',tbl_product_description.description = '$feature', tbl_product_description.mon_price ='$monthly_price', tbl_product_description.annual_price = '$annual_price', tbl_product_description.sku = '$sku' where tbl_product.id='$id'");
  return 1;
  }

 }

 public function fetch_new_products($id){
    $sql = mysqli_query($this->conn, "SELECT tbl_product_description.id,prod_id,description,mon_price,annual_price,sku,tbl_product.id,prod_parent_id,prod_name,html,prod_available,prod_launch_date FROM tbl_product_description INNER JOIN tbl_product ON tbl_product_description.prod_id =tbl_product.id where tbl_product.prod_parent_id='$id'");
  return $sql;
 }

 public function fetch_parent_node($id){
  $sql=mysqli_query($this->conn,"SELECT * from tbl_product where id='$id'");
  while($data=mysqli_fetch_assoc($sql)){
    return $data["prod_name"];
  }
 }
  public function fetch_parent_link($id){
  $sql=mysqli_query($this->conn,"SELECT * from tbl_product where id='$id'");
  while($data=mysqli_fetch_assoc($sql)){
    return $data["html"];
  }
 }

 public function availabilitys($id){
  $sql=mysqli_query($this->conn,"SELECT * from tbl_product where id='$id'");
  while($data=mysqli_fetch_assoc($sql)){
    return $data["prod_available"];
  }
 }

  public function fetch_cart_products($id,$name){
    $sql = mysqli_query($this->conn, "SELECT tbl_product_description.id,prod_id,description,mon_price,annual_price,sku,tbl_product.id,prod_parent_id,prod_name,html,prod_available,prod_launch_date FROM tbl_product_description INNER JOIN tbl_product ON tbl_product_description.prod_id =tbl_product.id where tbl_product.prod_parent_id='$id' and tbl_product.prod_name='$name'");
    return $sql;
 }

}
