<?php 
session_start(); 
if(!isset( $_SESSION['admin'])){
  header('location:../login.php');
}
  include './header.php';
  include_once '../class/Product.php';
  $category=new Product();
  $categories=$category->fetch_category();
  if(isset($_POST['submit'])){
    $subcategory=$_POST['sub_category_name'];
    $category_id=$_POST['parent_category'];
    $value=$category->add_sub_categories($category_id,$subcategory);
    if($value==1){
      echo "<script>alert('Subcategory Added Successfully')</script>";
    }else{
        echo "<script>alert('Subcategory Already Exist ! Try Another Name')</script>";
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
                <div class="card-header bg-transparent">
                    <h3 class="mb-0">Add Category</h3>
                </div>
                <form class='mx-auto col-md-12 text-dark' method='POST'>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Category</label>
                        <select class="form-control text-dark" name='parent_category' id="exampleFormControlSelect1"
                            required>
                            <?php 
        foreach($categories as $key=>$value)
          {
          if($value['prod_parent_id']==0)
            echo "<option value=".$value['id'].">$value[prod_name]</option>";
          }       
      ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Enter Category Name</label>
                        <input type='text' class="form-control text-dark" placeholder='Enter category'
                            id='sub_category_name' name='sub_category_name' required>
                    </div>
                    <div class="form-group">
                
                      <div class="form-group">
                          <textarea class="editor form-group link"  placeholder="HTML" name="editor" id="html"></textarea>
                      </div>
            

                   
                    <input type='submit' value='submit' id='submit' name='submit' class='btn btn-success mb-4'>
                  
                </form>

            </div>
        </div>
    </div>
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
                                <th>Subcategory Id</th>
                                <th>Name</th>
                                <th>Available/UnAvailable</th>
                                <th>Launch Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 

                                    $fetch_all_category=$category->fetch_all_category();
                                    foreach ($fetch_all_category as $key=>$value) {
                                        $fetch_category=$category->fetch_table_category($value['prod_parent_id']);
                                        if ($value['prod_available']==1) {
                                            echo "<tr class='text-dark'><td>$fetch_category</td><td>$value[id]</td><td>$value[prod_name]</td><td>Available</td><td>$value[prod_launch_date]</td><td><a type='button' class='btn btn-success' href='edit_category_product.php?id=".$value['id']."&&data=edit_category'>edit</a><a onClick='javascript: return confirm('Please confirm deletion');' type='button' class='btn btn-danger' href='delete.php?id=".$value['id']."&&data=delete_category''>Delete</a></td></tr>";
                                        } else {
                                            echo "<tr class='text-dark'><td>$fetch_category</td><td>$value[id]</td><td>$value[prod_name]</td><td>UnAvailable</td><td>$value[prod_launch_date]</td><td><a type='button' class='btn btn-warning' href='edit_category_product.php?id=".$value['id']."'>edit</a><a onClick='javascript: return confirm('Please confirm deletion');' type='button' class='btn btn-danger' href='delete.php?id=".$value['id']."&&data=delete_category'>Delete</a></td></tr>";
                                        }

                                    }

                                ?>

                        </tbody>

                    </table>
                </div>
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
         <script src="https://cdn.tiny.cloud/1/qof73m9jd92d8lehuaiw1tznav0911f2mmt7t0ya5epyks6h/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    
    $(function() {
        $('#subcat').DataTable({
            "sPaginationType": "full_numbers"
        });
    })
    </script>
    <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
   </script>



    </body>

    </html>