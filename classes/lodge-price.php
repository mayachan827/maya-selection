<?php

require_once "database.php";

class LodgePrice extends Database{
  public function getRoomTypes(){
    $sql = "SELECT * FROM room_types";

    if($result = $this->conn->query($sql)){
      return $result;
    }else{
      die ( "Error: ".$this->conn->error);
    }
      
  }
}
