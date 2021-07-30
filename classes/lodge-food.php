<?php

require_once "database.php";

class LodgeFood extends Database{
  public function getFoodTypes(){
    $sql = "SELECT * FROM food_types";

    if($result = $this->conn->query($sql)){
      return $result;
    }else{
      die("Error; " .$this->conn->error);
    }
  }
}