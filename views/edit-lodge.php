<?php
include "../classes/lodge-admin.php";

$lodge = new LodgeAdmin;
$lodge_details = $lodge->getLodge($_GET['lodge_id']);

if(isset($_POST['save'])){
  $lodge_id = $_GET['lodge_id'];
  $lodge_name = $_POST['lodge_name'];
  $lodge_desc = $_POST['lodge_desc'];
  $lodge_address = $_POST['lodge_address'];
  $open_season = $_POST['open_season'];
  $category = $_POST['category'];
  $ls_photo = $_FILES['ls_photo']['name'];
  $ls_tmp = $_FILES['ls_photo']['tmp_name'];
  $li_photo = $_FILES['li_photo']['name'];
  $li_tmp = $_FILES['li_photo']['tmp_name'];      

  
  $lodge->updateLodge($lodge_id,$lodge_name,$lodge_desc,$lodge_address,$open_season,$category,$ls_photo,$ls_tmp,$li_photo,$li_tmp);
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
    <title>Edit Lodge</title>
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

  <main class="container" style="padding-top: 80px">
    <div class="card w-75 mx-auto border-0">
      <div class="card-header bg-white border-0">
        <h2 class="text-center">EDIT LODGE</h2>
      </div>

      <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
          <label for="lodge_name">Lodge Name</label>
          <input type="text" name="lodge_name" id="lodge_name" class="form-control mb-2" value="<?= $lodge_details['lodge_name']?>" required>

          <label for="lodge_desc">Lodge Description</label>
          <textarea name="lodge_desc" id="lodge_desc" cols="30" rows="10" class="form-control mb-2" required><?= $lodge_details['lodge_desc']?></textarea>

          <label for="lodge_address">Lodge Address</label>
          <input type="text" name="lodge_address" id="lodge_address" class="form-control mb-2" value="<?= $lodge_details['lodge_address']?>"required>

          <label for="open_season">Open Season</label>
          <input type="text" name="open_season" id="open_season" class="form-control mb-2" value="<?= $lodge_details['open_season']?>"required>

          <label for="category">Category</label>
          <select name="category" id="category" class="form-control mb-2" required>
            <option value="" hidden>Select Category</option>
            <option <?php if($lodge_details['category'] == "N_alps"){echo "selected";}?>  value="N_alps">Northern Alps</option>
            <option  <?php if($lodge_details['category'] == "S_alps"){echo "selected";}?>  value="S_alps">Southern Alps</option>
            <option <?php if($lodge_details['category'] == "T_range"){echo "selected";}?> value="T_range">Tateyama Mountain Range</option>
          </select>

          <label for="ls_photo" class="d-block">Lodge Site Photo</label>
          <img src="../assets/images/<?= $lodge_details['lodge_site_photo']?>" height="80px" alt="lodge-site-photo">
          <input type="file" name="ls_photo" id="ls_photo" class="form-control mb-2 mt-2" accept="image/*" required>

          <label for="li_photo" class="d-block">Lodge Insite Photo</label>
          <img src="../assets/images/<?= $lodge_details['lodge_inside_photo']?>" height="80px" alt="lodge-inside-photo">
          <input type="file" name="li_photo" id="li_photo" class="form-control mb-2 mt-2" accept="image/*" required>

          <div class="row mt-5">
            <div class="col-6">
              <input type="submit" name="save" value="Save" class="btn btn-warning form-control">          
            </div>
            <div class="col-6">
              <a href="lodge-admin.php" class="btn btn-secondary form-control">Cancel</a>          
            </div>
          </div>


        </form>
      </div>
    </div>  
  </main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
​
</html>

