<?php
require "database.php";

class Admin extends Database{

  public function login($admin_name,$password){
    $sql = "SELECT `admin_id`,`admin_name`,`password` FROM admins WHERE admin_name = '$admin_name'";

    $result = $this->conn->query($sql){
    $admin_details = $result->fetch_assoc();
    if(password_verify($password,$admin_details['password'])){
      session_start(){
        $_SESSION['admin_id'] = $admin_details['admin_id'];
        $_SESSION['admin_name'] = $admin_details['admin_name'];

        header("location: ../views/login-admin.php");
        exit;
      }else{
        die("Password is inncorect" .$this->conn->error);
      }
    }
  }

  // public function createAdmin(){
  //   $admin_name = "admin";
  //   $password = password_hash("1234",PASSWORD_DEFAULT);

  //   $sql = "INSERT INTO `admins`(`admin_name`,`password`) VALUES ('$admin_name','$password')";

  //   $this->conn->query($sql);
  //     header("location: ../views/login-admin.php");
  //     exit;
    

  // }

}
  // $admin = new Admin;
  // $admin->createAdmin();

?>
