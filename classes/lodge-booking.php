<?php

require_once "database.php";

class LodgeBook extends Database{

  public function calculateLodge($room_id,$adult,$child,$night){
    $adult_price = $adult * $this->getAdultPrice($room_id);
    $child_price =$child * $this->getChildPrice($room_id);
    $lodge_total_price = ($adult_price + $child_price)* $night;

    return $lodge_total_price;
  }  

  public function calculateDiscount($night,$lodge_total_price){
    if($night >= 2){
      return $lodge_total_price * 0.2;        
    }else{
      return 0;
    }  
  }

  public function calculateLunch($lunchbox){
    return $lunchbox * 1000;
  }

  public function calculateGuide($guide_date){
    if(!empty($guide_date)){
      return 15000;
    }else{
      return 0;
      }
  }

  public function getGuideDate($guide_date){
    if(empty($guide_date)){
      return NULL;
    }
    return $guide_date;
  }

  public function getSubTotal($lodge_total_price,$lodge_discount,$lodge_lunch,$lodge_guide){
    $lodge_subtotal_price = $lodge_total_price - $lodge_discount + $lodge_lunch + $lodge_guide;
    return $lodge_subtotal_price;
  }

  public function calculateTax($lodge_subtotal_price){
    return $lodge_subtotal_price * 0.1;
  }

  public function calculateTotalPrice($lodge_subtotal_price, $lodge_tax){
    return $lodge_subtotal_price + $lodge_tax;
  }
 

  public function createBooking($customer_id,$lodge_id,$room_id,$s_date,$night,$guide_date,$adult,$child,$lunchbox,$total_price){
    // $adult_price = $adult * $this->getAdultPrice($room_id);
    // $child_price =$child * $this->getChildPrice($room_id);
    // $lodge_total_price = ($adult_price + $child_price)* $night;
    // if($night >= 2){
    //   $lodge_total_price *= 0.8;        
    // }

    // $lunch_total = $lunchbox * 1000;
    // $lodge_total_price += $lunch_total;      
    
    // if(!empty($guide_date)){
    //   $lodge_total_price += 15000;
    // }else{
    //   $guide_date = NULL;
    //   }

    

    $sql = "INSERT INTO `bookings`(`customer_id`,`lodge_id`,`room_id`,`checkin_date`,`stay_night`,`guide_date`,`lunchbox`,`adult`,`child`,`total_price`)
    VALUES('$customer_id','$lodge_id','$room_id','$s_date','$night','$guide_date','$lunchbox','$adult','$child','$total_price')";

    if($this->conn->query($sql)){
      header("location: ../views/booking-complete.php");
      exit;
    }else{
      die("Error booking: "  .$this->conn->error);
    }
  }

  public function getAdultPrice($room_id){
    $sql = "SELECT `adult_price` FROM `room_types` WHERE `room_id` = $room_id";
    
    if($result = $this->conn->query($sql)){
      $room_type = $result->fetch_assoc();
      return $room_type['adult_price'];
    }else{
      die("Error getting adult price");
    }

    }
  
   public function getChildPrice($room_id){
    $sql = "SELECT `child_price` FROM `room_types` WHERE `room_id` = $room_id";
    
    if($result = $this->conn->query($sql)){
      $room_type = $result->fetch_assoc();
      return $room_type['child_price'];
    }else{
      die("Error getting child price");
    }
  }

  public function getPrice($custome_id){
    $sql = "SELECT `total_price` FROM `bookings` WHERE `customer_id` = $customer_id";

    if($result = $this->conn->query($sql)){
      $book_price = $result->fetch_assoc();
      return $book_price['total_price'];
    }else{
      die("Error.");
    }
  }

  // public function getBook($book_id){
  //   $sql = "SELECT `book_id` FROM `bookings` WHERE `book_id` = $book_id";

  //   if($result = $this->conn->query($sql)){
  //     return $result->fetch_assoc();
  //   }else{
  //     die("Error" .$this->conn->error);
  //   }
  // }

    
}