<?php
include_once './class/User.php';
$signup = new User();
if (isset($_POST['signup'])) {
  $signupname = $_POST['signupname'];

  $signupemail = $_POST['signupemail'];
  $signpass1   = $_POST['signuppassword'];
  $signpass2   = $_POST['signuppassword2'];
  $question    = $_POST['question'];
  $mobile      = $_POST['mobile'];
  $answer      = $_POST['answer'];
  if ($signpass1 != $signpass2) {
    echo "<script>alert('Password did not match Please Try Again');window.location.href='account.php';</script>";
  }
  $check = $signup->check($signupemail, $mobile);
  if ($check == 0) {
    $signin = $signup->signup($signupemail, $signupname, $mobile, $signpass1, $question, $answer);
    if ($signin == 1) {
      $email_Data = md5($signupemail);
      echo "<script>alert('Signed Up successfull');window.location.href='verify.php?data=$email_Data';</script>";
    } else {
      echo "<script>alert('Somethig went Wrong')<script>";
    }
  } elseif ($check > 0) {
    echo "<script>alert('Already exist');window.location.href='account.php';</script>";
  }
}

if ((isset($_POST['login']))) {
  $name     = $_POST['email'];
  $password = $_POST['password'];
  $login = $signup->login($name, $password);
  if ($login) {
    $login = md5($login);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Verify First');
    window.location.href='verify.php?data=$login';
    </script>");
  } else {
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Wrong Credential');
    window.location.href='login.php';
    </script>");
  }
}
