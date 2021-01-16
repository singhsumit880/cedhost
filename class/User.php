<?php
include_once 'Dbcon.php';
session_start();
class User
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

    public function check($email, $mobile)
    {
        $sql  = mysqli_query($this->conn, "SELECT * from tbl_user where `email`='$email' or `mobile`='$mobile'");
        $data = mysqli_num_rows($sql);
        return $data;
    }
    //Signup user
    public function signup($signupemail, $signupname, $mobile, $signpass1, $question, $answer)
    {
        $password = md5($signpass1);
        $sql      = mysqli_query($this->conn, "INSERT INTO `tbl_user`( `email`, `name`, `mobile`, `email_approved`, `phone_approved`, `active`, `is_admin`, `sign_up_date`, `password`, `security_question`, `security_answer`) VALUES ('$signupemail','$signupname','$mobile','0','0','0','0',now(),'$password','$question','$answer')");
        if ($sql) {
            return true;
        } else {
            return false;
        }
    }

    public function login($name, $password)
    {
        $password = md5($password);
        $sql      = mysqli_query($this->conn, "SELECT * from tbl_user");
        while ($data = mysqli_fetch_assoc($sql)) {
            if ($data['email'] == $name && $data['password'] == $password) {
                if ($data['is_admin'] == 1) {
                    $_SESSION['admin'] = $data['is_admin'];
                    header('location:./admin/index.php');
                } else {
                    if ($data['email_approved'] == 1 || $data['phone_approved'] == 1) {
                        $_SESSION['email'] = $data['email'];
                        header('location:./index.php');
                    } else {

                        return $data['email'];

                    }
                }
            }

        }
    }

    public function checks($datas)
    {
        $sql = mysqli_query($this->conn, "SELECT * from tbl_user");
        while ($data = mysqli_fetch_assoc($sql)) {
            if (md5($data['email']) == $datas) {
                $_SESSION['array'] = array($data['email'], $data['mobile']);
                return array($data['email'], $data['mobile']);
            }
        }
    }

    public function update_token($token, $email)
    {
        $sql = mysqli_query($this->conn, "UPDATE tbl_user SET token='$token' WHERE email='$email'");
    }

    public function verify($email, $token)
    {
        $sqls = mysqli_query($this->conn, "SELECT * from tbl_user");
        while ($data = mysqli_fetch_assoc($sqls)) {
            if (md5($data['email']) == $email) {
                $sql = mysqli_query($this->conn, "UPDATE tbl_user SET email_approved='1',active='1' WHERE token='$token'");
                echo "<script>alert('Successfully verified login Now');window.location.href='login.php'</script>";
            }
        }
    }

    public function update_mobile($mobile)
    {
        $sql = mysqli_query($this->conn, "UPDATE tbl_user SET phone_approved='1',active='1' WHERE mobile='$mobile'");

    }

}
