<?php 
session_start(); 
if(!isset( $_SESSION['admin'])){
  header('location:../login.php');
}
  include './header.php';
  include_once '../class/Product.php';
  $category=new Product();
  $categories=$category->fetch_category();

?>
<!-- Header -->
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">create Category</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Product</a></li>
                            <li class="breadcrumb-item active" aria-current="page">create Category</li>
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
                <div class="row">
                    <div class="col">
                        <div class="card bg-default shadow">
                            <div class="card-header bg-transparent border-0">
                                <h3 class="text-white mb-0">Sub Category table</h3>
                            </div>
                            <div class="table-responsive text-dark">
                                <table class="table align-items-center table-dark table-flush text-center" id="subcat">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Product Name</th>
                                            <th>Available/Unavailable</th>
                                            <th>Monthly Price</th>
                                            <th>Annual Price</th>
                                            <th>Web Space</th>
                                            <th>Band Width</th>
                                            <th>Free Domain</th>
                                            <th>Language / Technology Support</th>
                                            <th>Mail Box</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 

                                    $fetch_all_category=$category->view_table();
                                    foreach ($fetch_all_category as $key=>$value) {
                                        $data=json_decode($value['description']);
                                        $fetch_category=$category->fetch_table_category($value['prod_parent_id']);
                                        if ($value['prod_available']==1) {
                                            echo "<tr class='text-dark'><td>$fetch_category</td><td>$value[prod_name]</td><td>Available</td><td>₹$value[mon_price]</td><td>₹$value[annual_price]</td><td>$data->Web_Space GB</td><td>$data->Band_Width GB</td><td>$data->Free_Domain</td><td>$data->Language_Technology</td><td>$data->Mail_Box</td><td><a type='button' class='btn btn-success' href='edit_new_product.php?id=".$value['id']."&&data=".$value['id']."'>edit</a><a onClick='javascript: return confirm('Please confirm deletion');' type='button' class='btn btn-danger' href='delete.php?id=".$value['prod_id']."&&data=delete_product_subproduct'>Delete</a></td></tr>";
                                        } else {
                                            echo "<tr class='text-dark'><td>$fetch_category</td><td>$value[prod_name]</td><td>Unavailable</td><td>₹$value[mon_price]</td><td>₹$value[annual_price]</td><td>$data->Web_Space GB</td><td>$data->Band_Width GB</td><td>$data->Free_Domain</td><td>$data->Language_Technology</td><td>$data->Mail_Box</td><td><a type='button' class='btn btn-warning' href='edit_new_product.php?id=".$value['id']."&&data=".$value['id']."'>edit</a><a onClick='javascript: return confirm('Please confirm deletion');' type='button' class='btn btn-danger' href='delete.php?id=".$value['prod_id']."&&data=delete_product_subproduct'>Delete</a></td></tr>";

                                        }
                                    }

                                ?>

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './footer.php'; ?>
 <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="./assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="./assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="./assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="./assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="./assets/js/argon.js?v=1.2.0"></script>
   <link rel='stylesheet' href="./assets/css/datatable.css">
  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
    <script>
   $(function() {
        $('#subcat').DataTable({
            "sPaginationType": "full_numbers"
        });
    })
</script>