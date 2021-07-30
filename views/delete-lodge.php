<?php

include "../classes/lodge-admin.php";

$lodge = new LodgeAdmin;
$lodge_details = $lodge->getLodge($_GET['lodge_id']);
$lodge_name = $lodge_details['lodge_name'];

if(isset($_POST['delete'])){
  $lodge->deleteLodge($_GET['lodge_id']);
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Delete Lodge</title>
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

  <main class="container" style="padding-top:80px">
    <div class="card w-50 mx-auto border-0">
      <div class="card-header bg-white border-0">
        <h2 class="text-center text-danger">DELETE LODGE</h2>
      </div>
  
      <div class="card-body">
        <div class="text-center mb-4">
          <i class="fas fa-exclamation-circle display-4 mb-2 text-warning"></i>
          <h4 class="mb-0">Are sure you want to delete "<?= $lodge_name?>"?</h4>
        </div>
        <div class="row">
          <div class="col text-end">
            <a href="lodge-admin.php" class="btn btn-secondary">Cancel</a>
          </div>
          <div class="col text-start">
            <form action="lodge-admin.php" method="post">
            <input type="submit" value="Delete" name="delete" class="btn btn-outline-danger ">
            </form>
          </div>
        </div>
      </div>
    </div>

  </main>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
​
</html>