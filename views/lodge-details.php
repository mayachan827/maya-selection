<?php
session_start();

include "../classes/lodge-admin.php";
$lodge = new LodgeAdmin;
$info = $lodge->getLodge($_GET['lodge_id']);



?>

<!doctype html>
<html lang="en">
​
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/lodge-details.css">
    <title>Lodge Details</title>
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
    <div class="row text-center mx-auto mb-3">      
      <div class="col mt-5">
        <h2><?= $info['lodge_name']?></h2>
      </div>
    </div>

    <div class="row mb-3 mt-5">
      <div class="col-6">
        <img src="../assets/images/<?= $info['lodge_site_photo']?>"  alt="外観">               
      </div>
      <div class="col-6">
        <img src="../assets/images/<?= $info['lodge_inside_photo']?>"  alt="内観">
      </div>
    </div>

    <div class="row mb-3 w-75 mx-auto">
      <div class="col mt-2">
        <p><?= $info['lodge_desc']?></p>
      </div>
    </div>

    <div class="row mb-2 text-center">
       <h3 class="border-bottom w-25 d-block mx-auto pb-2">Adress</h3>        
    </div>

    <div class="row mb-5 text-center">
      <h4><?= $info['lodge_address']?></h4>
    </div>
    
    <div class="row mb-2 text-center">
       <h3 class="border-bottom w-25 d-block mx-auto pb-2">Open Season</h3>        
     </div>

     <div class="row mb-5 text-center">
       <h4><?= $info['open_season']?></h4>
     </div>

    <div class="row mb-2">
      <div class="col text-center">
        <h3 class="border-bottom w-25 d-block mx-auto pb-2">PRICE</h3>      
      </div>      
    </div>
    
     <h4 class="mb-3  text-center">Room Charge</h4>
      <table class="table table-striped w-50 mx-auto mb-3">
        <thead class="table-dark">
          <th>Room type</th>
          <th>Food</th>
          <th>Adult</th>
          <th>child</th>
        </thead>
        <tbody>
          <tr class="table-color">          
            <td>Dormitory</td>
            <td>Dinner and Breakfast</td>
            <td>7,500yen</td>
            <td>6,000yen</td>
          </tr>
          <tr class="table-color">
            <td>Dormitory</td>
            <td>Dinner</td>
            <td>7,000yen</td>
            <td>5,600yen</td>
          </tr>
          <tr class="table-color">
            <td>Private room</td>
            <td>Dinner and Breakfast</td>
            <td>12,000yen</td>
            <td>9,500yen</td>
          </tr>
          <tr class="table-color">
            <td>Private room</td>
            <td>Dinner</td>
            <td>11,000yen</td>
            <td>8,800yen</td>
          </tr>        
        </tbody>
      </table>

    <h4 class="mb-3 text-center">Others</h4>
      <table class="table table-striped w-50 mx-auto">
        <thead class="table-dark">
          <th>Option</th>
          <th>Price</th>
        </thead>
        <tbody>
          <tr class="table-color">
            <td>Guide</td>
            <td>15,000yen</td>
          </tr>
          <tr class="table-color">
            <td>Lunchbox</td>
            <td>1,000yen</td>
          </tr>        
        </tbody>
      </table>

      <h4 class="mt-3 text-center">*more 2night 20% Discount!</h4>

      <div class="row mt-5 ">
        <div class="col-6 text-end">
            <a href="reserve-form.php?lodge_id=<?= $_GET['lodge_id'];?>" class="btn btn-outline-warning w-50">BOOK</a>
        </div>
        <div class="col-6 text-start">
          <a href="main-page.php" class="btn btn-outline-info w-50 ">Back</a>
        </div>
      </div>

      
    
  

   
  ​</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
​
</html>