<?php
session_start();
if (!isset($_SESSION['admin'])) {
 header('location:../login.php');
}
include './header.php';
include_once '../class/Product.php';
$category   = new Product();
$categories = $category->fetch_category();
if (isset($_GET['id'])) {
 foreach ($categories as $row) {
  if ($row['id'] == $_GET['id']) {
   $id           = $_GET['id'];
   $categoryname = $row['prod_name'];

   $prod_available = $row['prod_available'];
  }
 }
}
if (isset($_POST['submit'])) {
 $subcategory = $_POST['sub_category_name'];
 $category_id = $_POST['parent_category'];
 $available   = $_POST['availability'];
 $value       = $category->edit_sub_categories($category_id, $subcategory, $available, $id);
 if ($value == 1) {
  echo "<script>alert('Updated Successfully');window.location.href='createCategory.php'</script>";
 } else {
  echo "<script>alert('Already Exist');window.location.href='createCategory.php'</script>";
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
                    <h6 class="h2 text-white d-inline-block mb-0">create Category</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
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
                <div class="card-header bg-transparent">
                    <h3 class="mb-0">Add Category</h3>
                </div>
                <form class='mx-auto col-md-12 text-dark' method='POST'>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Parent Category</label>
                        <select class="form-control text-dark" name='parent_category' id="exampleFormControlSelect1"
                            required>

                            <?php
foreach ($categories as $key => $value) {
 if ($value['prod_parent_id'] == 0) {
  echo "<option value=" . $value['id'] . ">$value[prod_name]</option>";
 }
}
?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Sub Category Name</label>
                        <input type='text' class="form-control text-dark" placeholder='Enter category'
                             value='<?php echo $categoryname ?>'
                            name='sub_category_name' required>
                    </div>
                    <div class="form-group">
                        <select class="browser-default custom-select text-dark" name='availability'>

                            <?php
if ($prod_available == 0) {
 echo "<option value='0'>Unavailable</option>
                                            <option value='1'>Available</option>";
} else {
 echo " <option value='1'>Available</option>
                                     <option value='0'>Unavailable</option>";
}
?>
                        </select>
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
    $(function() {
        $('#subcat').DataTable({
            "sPaginationType": "full_numbers"
        });
    })
    $(document).ready(function() {
        $('.mdb-select').materialSelect();
    });
    </script>