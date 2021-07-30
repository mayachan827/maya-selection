<?php

require_once "database.php";

class LodgeAdmin extends Database{

  public function createLodge($lodge_name,$lodge_desc,$lodge_address,$open_season,$category,$ls_photo,$ls_tmp,$li_photo,$li_tmp){
    $sql = "INSERT INTO `lodges`(`lodge_name`,`lodge_desc`,`lodge_address`,`open_season`,`category`,`lodge_site_photo`,`lodge_inside_photo`)
            VALUES('$lodge_name','$lodge_desc','$lodge_address','$open_season','$category','$ls_photo','$li_photo')";

    if($this->conn->query($sql)){
      $destination1 = "../assets/images/$ls_photo";
      if(move_uploaded_file($ls_tmp,$destination1)){
        $destination2 = "../assets/images/$li_photo";        
        if(move_uploaded_file($li_tmp,$destination2)){
          
          header("refresh: 0");
        }else{ 
          die("Error.");
        }        
      }else{
        die("Error.");
      }
    } else {
      die("Error creating lodge:" .$this->conn->error);
    }
  }  

  public function getNorthernLodge(){
        $sql = "SELECT * FROM lodges WHERE category = 'N_alps'";
        $result = $this->conn->query($sql);
        //used this code if 2 or more records return↓
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
  }

  public function getSouthernLodge(){
    $sql="SELECT `lodge_id`,`lodge_name`,`lodge_desc`,`lodge_site_photo` FROM lodges WHERE `category` = 'S_alps'";

    $result = $this->conn->query($sql);
    $rows = array();
    while($row = $result->fetch_assoc()){
      $rows[] = $row;
    }
    return $rows;
  }

  public function getTateyamaLodge(){
    $sql="SELECT `lodge_id`,`lodge_name`,`lodge_desc`,`lodge_site_photo` FROM lodges WHERE `category` = 'T_range'";

    $result = $this->conn->query($sql);
    $rows = array();
    while($row = $result->fetch_assoc()){
      $rows[] = $row;
    }
      return $rows;
  }

  public function getLodge($lodge_id){
    $sql="SELECT * FROM lodges WHERE `lodge_id` = $lodge_id";

    if($result = $this->conn->query($sql)){
      return $result->fetch_assoc();
    }else{
      die("Error" .$this->conn->error);
    }
  }

  public function getAllLodges(){
    $sql = "SELECT * FROM `lodges`";

    if($result = $this->conn->query($sql)){
      return $result;
    }else{
      die("Error retriving all lodges".$this->conn->error);
    }
  }

  public function deleteLodge($lodge_id){
    $sql = "DELETE FROM lodges WHERE `lodge_id` = $lodge_id";

    if($this->conn->query($sql)){
      header("location: ..views/lodge-admin.php");
      exit;
    }else{
      die("Error deleting user" .$this->conn->error);
    }
  }

  public function updateLodge($lodge_id,$lodge_name,$lodge_desc,$lodge_address,$open_season,$category,$ls_photo,$ls_tmp,$li_photo,$li_tmp){
    $sql = "UPDATE lodges SET lodge_name = '$lodge_name',lodge_desc = '$lodge_desc',lodge_address = '$lodge_address',open_season = '$open_season',category = '$category',lodge_site_photo = '$ls_photo',lodge_inside_photo = '$li_photo' WHERE lodge_id = '$lodge_id'";

    if($this->conn->query($sql)){
      $destination1 = "../assets/images/$ls_photo";
      if(move_uploaded_file($ls_tmp,$destination1)){
        $destination2 = "../assets/images/$li_photo";        
        if(move_uploaded_file($li_tmp,$destination2)){
          
          header("location: ../views/lodge-admin.php");
          exit;
        }else{ 
          die("Error.");
        }        
      }else{
        die("Error.");
      }
    } else {
      die("Error updating lodge:" .$this->conn->error);
    }
  }

} 
?>