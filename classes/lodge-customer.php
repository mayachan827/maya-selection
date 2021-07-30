<?php

require_once "database.php";

class LodgeCustomers extends Database{

  public function createCustomer($first_name,$last_name,$address,$con_number,$email){
    $sql = "INSERT INTO `customers`(`first_name`,`last_name`,`address`,`contact_number`,`email`)
            VALUES('$first_name','$last_name','$address','$con_number','$email')";
    if($this->conn->query($sql)){
      return $this->conn->insert_id; 
    }else{
      die("Error.");
    }
  }
}