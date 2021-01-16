<?php
session_start();
foreach ($_SESSION['datas'] as $key => $value) {

    if ($_SESSION['datas'][$key]["productid"] == $_GET['id']) {
        unset($_SESSION['datas'][$key]);
    }
}
echo "<script>alert('Deleted Successfully');window.location.href='checkout.php'</script>";
