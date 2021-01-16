<?php

class Dbcon
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
}
?>