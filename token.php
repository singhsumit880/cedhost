<?php 
    include_once './class/User.php';
    if(isset($_GET['id'])){
        $token=$_GET['id'];
        $email=$_GET['email'];
        $user=new User();
        $user->verify($email,$token);
    }
?>