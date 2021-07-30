<?php
session_start();
include "../classes/lodge-admin.php";
include "../classes/lodge-booking.php";
include "../classes/lodge-customer.php";
// include "../classes/lodge-food.php";

$lodge = new LodgeAdmin;
$lodge_info = $lodge->getLodge($_GET['lodge_id']);

$lodge_book = new LodgeBook;
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$address = $_POST['address'];
$con_number = $_POST['con_number'];
$email = $_POST['email'];

$lodge_id = $_GET['lodge_id'];

$s_date = $_POST['s_date'];
$night = $_POST['night'];
$adult = $_POST['adult_n'];
$child = $_POST['child_n'];
$room_id = $_POST['room_id'];
$guide_date = $_POST['guide_date'];
$lunchbox = $_POST['lunchbox'];
  


$lodge_total_price = $lodge_book->calculateLodge($_POST['room_id'],$_POST['adult_n'],$_POST['child_n'],$_POST['night']); 

$lodge_discount = $lodge_book->calculateDiscount($_POST['night'],$lodge_total_price);

$lodge_lunch = $lodge_book->calculateLunch($_POST['lunchbox']);

$lodge_guide = $lodge_book->calculateGuide($_POST['guide_date']);

$lodge_subtotal_price = $lodge_book->getSubTotal($lodge_total_price,$lodge_discount,$lodge_lunch,$lodge_guide);

$lodge_tax = $lodge_book->calculateTax($lodge_subtotal_price);

$total_price = $lodge_book->calculateTotalPrice($lodge_subtotal_price, $lodge_tax); 

if(isset($_POST['confirm'])){

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $con_number = $_POST['con_number'];
    $email = $_POST['email'];

    $lodge_id = $_GET['lodge_id'];

    $s_date = $_POST['s_date'];
    $night = $_POST['night'];
    $adult = $_POST['adult_n'];
    $child = $_POST['child_n'];
    $room_id = $_POST['room_id'];
    $guide_date = $_POST['guide_date'];
    $lunchbox = $_POST['lunchbox'];
    $total_price = $_POST['total_price'];

  $lodge_customers = new LodgeCustomers;

  $customer_id = $lodge_customers->createCustomer($first_name,$last_name,$address,$con_number,$email);

  $lodge_book = new LodgeBook;

  $guide_date = $lodge_book->getGuideDate($guide_date);

  $lodge_book->createBooking($customer_id,$lodge_id,$room_id,$s_date,$night,$guide_date,$adult,$child,$lunchbox,$total_price);
}
          
      

?>

<!doctype html>
<html lang="en">
​
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Confirm</title>
</head>
​
<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark" style="margin-top: -24px">
    <a class="navbar-brand" href="main-page.php"><h1 class="h3 ms-2">Maya's Mountain Lodge Selection</h1></a>
    <div class="ms-auto me-2">
        <ul class="navbar-nav">
        <li class="nav-item"><a href="main-page.php" class="nav-link">Reservation</a></li>
        <li class="nav-item ms-2">
          <input type="text" name="search" placeholder="search" id="search" class="form-control">
        </li>
      </ul>
    </div>
 </nav>

<div class="container w-75 mx-auto" style="padding-top: 80px">
  <div class="card border-0">
    <div class="card-header bg-success border-0">
      <h2 class="text-center text-white">Confirmation</h2>
    </div>
  
    <div class="card-body"> 
        <div class="row  border-bottom">
          <div class="col-6">
            <h4>Full name</h4>
          </div>
          <div class="col-6">
            <h3><?= $_POST['first_name']." ".$_POST['last_name']?></h3>
          </div>
        </div>
        <div class="row border-bottom">
          <div class="col-6">
            <h4>Address</h4>
          </div>
          <div class="col-6">
            <h3><?= $_POST['address']?></h3>
          </div>
        </div>
        <div class="row border-bottom">
          <div class="col-6">
            <h4>Contact number</h4>
          </div>
          <div class="col-6">
            <h3><?=  $_POST['con_number']?></h3>
          </div>
        </div>
        <div class="row border-bottom mb-5">
          <div class="col-6">
            <h4>Email</h4>
          </div>
          <div class="col-6">
            <h3><?=$_POST['email']?></h3>
          </div>
        </div>

       
        <h3 class="text-center border-bottom w-50 mx-auto mb-5 fb-3">Reservation Details</h3>

        <table class="table table-striped">
          <thead class="table-light">
            <th>Lodge</th>
            <th>Date</th>
            <th>Night(s)</th>
            <th>Adult</th>
            <th>Child</th>
            <th>Lunchbox</th>
            <th>Guide</th>
          </thead>
          <tbody>
            <tr class="table-color">
              <td><?= $lodge_info['lodge_name']?></td>
              <td><?= $_POST['s_date']?></td>
              <td><?= $_POST['night']?></td>
              <td><?= $_POST['adult_n']?></td>
              <td><?= $_POST['child_n']?></td>
              <td><?= $_POST['lunchbox']?></td>
              <td><?= $_POST['guide_date']?></td>
            </tr>
          </tbody>
        </table>

        <h3 class="text-center border-bottom w-25 mx-auto my-5 fb-3">PRICE</h3>

        

       
        <table class="w-75 border-bottom h5 mx-auto">
            <tr>
              <th class="">Room and Food</th>
              <td class="text-end">￥<?= $lodge_total_price ?></td>            
            </tr>
            <tr>
              <th>Discount</th>
              <td class="text-end">▲　￥<?= $lodge_discount ?></td>           
            </tr>
            <tr>
              <th>Lunch</th>
              <td class="text-end">￥<?= $lodge_lunch ?></td>              
            </tr>
            <tr>
              <th>Guide</th>
              <td class="text-end">￥<?= $lodge_guide ?></td>
            </tr>
            <tr class="border-bottom">
              <th>Sub Total</th>
              <td class="text-end">￥<?= $lodge_subtotal_price ?></td>
            </tr>
           <tr>
              <th>Tax</th>
              <td class="text-end">￥<?= $lodge_tax ?></td>
           </tr> 
           <tr class="h4">
              <th>Total</th>
              <td class="text-end">￥<?= $total_price ?></td>
           </tr>  
        </table>

        <form action="" method="post">
          <div class="row mt-5">                   
                <input type="hidden" name="first_name" value="<?= $first_name ?>">
                <input type="hidden" name="last_name" value="<?= $last_name ?>">
                <input type="hidden" name="address" value="<?= $address ?>">
                <input type="hidden" name="con_number" value="<?= $con_number ?>">
                <input type="hidden" name="email" value="<?= $email ?>">
                <input type="hidden" name="s_date" value="<?= $s_date ?>">
                <input type="hidden" name="night" value="<?= $night ?>">
                <input type="hidden" name="s_date" value="<?= $s_date ?>">
                <input type="hidden" name="adult_n" value="<?= $adult ?>">
                <input type="hidden" name="child_n" value="<?= $child ?>">
                <input type="hidden" name="night" value="<?= $night ?>">
                <input type="hidden" name="room_id" value="<?= $room_id ?>">
                <input type="hidden" name="guide_date" value="<?= $guide_date ?>">
                <input type="hidden" name="lunchbox" value="<?= $lunchbox ?>">
                <input type="hidden" name="total_price" value="<?= $total_price?>">

              <div class="col-6 text-end"> 
                <button type="submit" name="confirm" class="btn btn-success w-50">Submit</a>
              </div>           
                          
              <div class="col-6 text-start"> 
                <button onclick="history.go(-1);" class="btn btn-danger  w-50">Cancel</button>
              </div>
          </div>        
        </form>             
      </div>
  </div>


</div>
​
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
​
</html>