<?php 
    include_once '../class/Product.php';
    $delete=new Product();
    if(isset($_GET['data'])){
        echo "<script>confirm('Are you want To delete ?')</script>";
        if($_GET['data']=='delete_category'){
            $id=$_GET['id'];
            
            $delete_category=$delete->delete_category($id);
            if($delete_category==1){
                echo "<script>alert('Deleted Successfully');window.location.href='createCategory.php'</script>";
            }
        }
        if($_GET['data']=="delete_product_subproduct"){
            $id=$_GET['id'];
            
            $delete_product=$delete->delete_product($id);
            echo $delete_product;
            if($delete_product==1){
                echo "<script>alert('Successfully deleted');window.location.href='./view_product.php'</script>";
            }
        }
    }
?>