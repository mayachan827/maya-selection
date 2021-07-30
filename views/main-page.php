<?php
session_start();

include "../classes/lodge-admin.php";
$lodge = new LodgeAdmin;
$lodge_north_list = $lodge->getNorthernLodge();
$lodge_south_list = $lodge->getSouthernLodge();
$lodge_tateyama_list = $lodge->getTateyamaLodge();
?>

<!doctype html>
<html lang="en">
​
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>main-page</title>
    <link rel="stylesheet" href="../assets/css/main-page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

  <header class="banner mb-5">
    <!-- <a href="../assets/images/nouthern_alps.jpg"></a> -->
  </header>

  <main>
    <div class="container text-center">
      <h2>Northern Alps</h2>
      <div class="row mt-5">
      <?php foreach($lodge_north_list as $lodge_north_details){
           $l_id = $lodge_north_details['lodge_id'];
      ?>
      <div class="col-4">          
          <img src="../assets/images/<?= $lodge_north_details['lodge_site_photo']?>" alt="山小屋写真" >
          <h3><a class="text-decoration-none" href="lodge-details.php?lodge_id=<?= $l_id ?>"><?= $lodge_north_details['lodge_name']?></a></h3>
          <p><?= substr($lodge_north_details['lodge_desc'],0,90)?>...</p>
        </div>
        <?php
        }
        ?>     
        

    <div class="container text-center">
      <h2 class="mt-5">Southern Alps</h2>
      <div class="row mt-5">
        <?php
          foreach($lodge_south_list as $lodge_south_details){ 
            $l_id = $lodge_south_details['lodge_id'];
        ?>       
        <div class="col-4 mx-auto">                
          <img src="../assets/images/<?= $lodge_south_details['lodge_site_photo']?>" alt="山小屋写真" >        
          <h3><a class="text-decoration-none" href="lodge-details.php?lodge_id=<?= $l_id ?>"><?= $lodge_south_details['lodge_name']?></a></h3>
          <p><?= substr($lodge_south_details['lodge_desc'],0,90) ?>...</p>
        </div>
        <?php
        }
        ?>


    <div class="container text-center">
      <h2 class="mt-5">Tateyama Mountain Range</h2>       
        <div class="row mt-5">
        <?php
          foreach($lodge_tateyama_list as $lodge_tateyama_details){
            $l_id = $lodge_tateyama_details['lodge_id'];
        ?>       
        <div class="col-4 mx-auto">                
          <img src="../assets/images/<?= $lodge_tateyama_details['lodge_site_photo']?>" alt="山小屋写真" >        
          <h3><a class="text-decoration-none" href="lodge-details.php?lodge_id=<?= $l_id ?>"><?= $lodge_tateyama_details['lodge_name']?></a></h3>
          <p><?= substr($lodge_tateyama_details['lodge_desc'],0,90)?></p>
        </div>
        <?php
        }
        ?>

    <div class="container text-center mb-5 " style= "margin-top: 100px">
      <h2 class="border-bottom w-50 mx-auto pb-3 ">Our Professional Guide</h2>
      <div class="row mt-5">
        <div class="col-4">
          <img src="../assets/images/guide4.jpg" alt="guide4" class="w-100">
          <h3>Ogino</h3>
          <h6>Years of Experience: 10years</h6>
          <h6>Favorite Mountain: Yatsugatake</h6>
        </div>
        <div class="col-4">
          <img src="../assets/images/guide2.jpg" alt="guide2" class="w-100">
          <h3>Takahashi</h3>
          <h6>Years of Experience: 15years</h6>
          <h6>Favorite Mountain:  Tsubakuro mountain</h6>
        </div>
        <div class="col-4">
          <img src="../assets/images/guide3.jpg" alt="guide3" class="w-100">
          <h3>Kondo</h3>
          <h6>Years of Experience:  20years</h6>
          <h6>Favorite Mountain:  Shiroumadake</h6>
        </div>
      </div>
    </div>
  </main>

  <footer class="navbar navbar-expand navbar-dark bg-success" style="margin-bottom: -24px">
    <div class="ms-3">
      <ul class="navbar-nav">
        <li class="nav-item"><a href="contact.php" class="nav-link">Contact Us</a></li>
        <li class="nav-item"><a href="company.php" class="nav-link">Our Company</a></li>
        <li class="nav-item"><a href="login-admin.php" class="nav-link">Admin</a></li>       
      </ul>
    </div>

    <div class= "ms-auto me-3">
      <ul class="navbar-nav h3">
        <li class="nav-item"><a href="https://www.facebook.com/" class="nav-link"><i class="fab fa-facebook-square"></i></a></li>
        <li class="nav-item"><a href="https://www.instagram.com/" class="nav-link"><i class="fab fa-instagram"></i></a></li>
        <li class="nav-item"><a href="https://www.twitter.com/" class="nav-link"><i class="fab fa-twitter-square"></i></a></li>
      </ul>
    </div>

</footer>

  


​
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
​
</html>