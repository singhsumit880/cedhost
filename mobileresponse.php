<?php 
include_once './class/User.php';
    $check=new User();
      if(isset($_POST['phone'])){
        $mobile=$_POST['phone'];
        $otp=$_POST['otp'];
        //echo $mobile;
        //echo $_SESSION['otp'];
        if($_POST['otp']==$_SESSION['otp']){
            $check->update_mobile($mobile);
            echo "Verified";
        }
    }
?>