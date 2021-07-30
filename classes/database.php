<?php

class Database{
  private $server_name = "localhost";
  private $username = "root";
  private $password = "";
  private $db_name = "mayas_mountain_lodge";
  protected $conn;

  public function __construct(){
    $this->conn = new mysqli($this->server_name,
    $this->username,$this->password,$this->db_name);

    if($this->conn->connect_error){
      die("unable to connect to database" .
      $this->db_name. ":" .$this->conn->connect_error);
    }
  }
}
?>