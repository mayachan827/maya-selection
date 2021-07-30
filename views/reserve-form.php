<?php
session_start();
include "../classes/lodge-customer.php";
include "../classes/lodge-booking.php";
include "../classes/lodge-admin.php";
include "../classes/lodge-price.php";
include "../classes/lodge-food.php";

$lodge = new LodgeAdmin;
$lodge_info = $lodge->getLodge($_GET['lodge_id']);

$lodge_price = new LodgePrice;
$room_types = $lodge_price->getRoomTypes();

$lodge_food = new LodgeFood;
$food_types = $lodge_food->getFoodTypes();

?>

<!doctype html>
<html lang="en">
​
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Reservation</title>
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

  <div class="container">
      <div class="row mt-5">
          <h2 class="h3">■Hotel</h2>
      </div>
      <div class="row">
          <h4><?= $lodge_info['lodge_name']?></h4>
      </div>

      <form action="confirm.php?lodge_id=<?= $_GET['lodge_id'];?>" method="post">
        <h2 class="h3 mt-3">■Name</h2>
          <div class="row">
             <div class="col-6">
                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First-name">            
            </div>
            <div class="col-6">
                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last-name">            
            </div>
          </div>

        <h2 class="h3 mt-3">■Address</h2>
            <div class="col">
              <input type="text" name="address" id="address" class="form-control" placeholder="Address">
            </div>

        <h2 class="h3 mt-3">
          <div class="row">
            <div class="col-6">
              ■Contact number
            </div>
            <div class="col-6">
              ■E-mail address
            </div>
          </div>
        </h2>
          <div class="row">
            <div class="col-6">
              <input type="number" name="con_number" id="con_number" class="form-control" placeholder="Contact Number">
            </div>
            <div class="col-6">
              <input type="email" name="email" id="email" class="form-control" placeholder="E-mail">
            </div>
          </div>
           
        <h2 class="h3 mt-3">■Date</h2>
          <div class="row">
            <div class="col-4">
                <input type="date" name="s_date" id="s_date" class="form-control">            
            </div>
            <div class="col-2">
                <span class="fs-4">～</span>
            </div>
            <div class="col-4">
                <input type="number" name="night" id="night" class="form-control">   
            </div>
            <div class="col-2">
              <span class="fs-4">night(s)</span>
            </div>


          <h2 class="h3 mt-3">■How many people</h2>
              <div class="mb-1">
                <label for="adult">Adult</label>
                <input type="number" name="adult_n" id="adult_n" value="0">
              </div>
              <div class="mb-1">
                <label for="child">Child</label>
                <input type="number" name="child_n" id="child_n" value="0">
              </div>
                      
          <h2 class="h3 mt-3">■Price</h2>
          <table class="table table-striped w-50">
            <thead class="table-dark">
              <th>Select</th>
              <th>Room type</th>
              <th>Food</th>
              <th>Adult</th>
              <th>child</th>
            </thead>
            <tbody>
              <?php
              while($room_type_details = $room_types->fetch_assoc())
              {
              ?>        
                <tr class="table-color">
                  <td><input type="radio" name="room_id" id="room_id" value="<?=$room_type_details['room_id']?>"></td>         
                  <td><?= $room_type_details['room_name']?></td>
                  <td><?= $room_type_details['room_food']?></td>
                  <td><?= $room_type_details['adult_price']."yen"?></td>
                  <td><?= $room_type_details['child_price']."yen"?></td>
              </tr>
            
              <?php
              }
              ?>
            </tbody>
          </table>

          

            <h2 class="h3 mt-3">■Option</h2>
            <div class="row mb-1">           
                <div class="col-6">
                  <label for="guide_date" class="h4">Guide ¥15,000/day</label>    
                </div>
                <div class="col-6">
                  <input type="date" name="guide_date" id="guide_date" class="form-control w-50">
                </div>
             </div>
             <div class="row">
                <div class="col-6">
                  <label for="lunchbox" class="h4">Lunch box ¥1,000/per pax</label>
             </div>
                <div class="col-6">
                  <input type="number" name="lunchbox" id="lunchbox" class="form-control  w-50" placeholder="how many" value="0">
              </div>
             </div>
          
          
          

          <button type="submit" class="w-25 d-block mx-auto mt-5 btn btn-success">Confirm</button>
      </form>
  </div>


​
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
​
</html>