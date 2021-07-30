<?php
 
 include "../classes/lodge-admin.php";
 
 $lodge = new LodgeAdmin;
 
  
  if(isset($_POST['submit'])){
    $lodge_name = $_POST['lodge_name'];
    $lodge_desc = $_POST['lodge_desc'];
    $lodge_address = $_POST['lodge_address'];
    $open_season = $_POST['open_season'];
    $category = $_POST['category'];
    $ls_photo = $_FILES['ls_photo']['name'];
    $ls_tmp = $_FILES['ls_photo']['tmp_name'];
    $li_photo = $_FILES['li_photo']['name'];
    $li_tmp = $_FILES['li_photo']['tmp_name'];      

    
    $lodge->createLodge($lodge_name,$lodge_desc,$lodge_address,$open_season,$category,$ls_photo,$ls_tmp,$li_photo,$li_tmp);
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
    <title>New Register</title>
</head>
​
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark" style="margin-top: -24px">
  <a class="navbar-brand" href="lodge-admin.php"><h1 class="h3 ms-2">Admin Lodge</h1></a>
    <div class="ms-2">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="lodge-admin.php" class="nav-link">Lodge List</a>
        </li>
        <li class="nav-item">
          <a href="new-register.php" class="nav-link">New Register</a>
        </li>
      </ul>
    </div>
    <div class="ms-auto me-2">
      <ul class="navbar-nav">
        <li class="nav-item "><a href="login-admin.php" class="nav-link">Logout</a></li>        
      </ul>
    </div>
  </nav>

  <div class="container">
  <div class="card w-75 my-auto mx-auto border border-0">
      <div class="card-body">
        <div class="h2 mt-5 text-center">New Register</div>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="row mt-3" >      
            <label for="lodge_name">Lodge Name</label>        
            <input type="text" name="lodge_name" id="lodge_name" class="form-control mb-2" required>
            
            <label for="lodge_desc">Lodge Description</label>
            <textarea name="lodge_desc" id="lodge_desc" cols="30" rows="10" class="form-control mb-2" required></textarea>

            <label for="lodge_address">Lodge Address</label>
            <input type="text" name="lodge_address" id="lodge_address" class="form-control mb-2" required>

            <label for="open_season">Open Season</label>
            <input type="text" name="open_season" id="open_season" class="form-control mb-2" required>

            <label for="category">Category</label>
            <select name="category" id="category" class="form-control mb-2" required>
              <option value="" hidden>Select Category</option>
              <option value="N_alps">Northern Alps</option>
              <option value="S_alps">Southern Alps</option>
              <option value="T_range">Tateyama Mountain Range</option>
            </select>

            <label for="ls_photo">Lodge Site Photo</label>
            <input type="file" name="ls_photo" id="ls_photo" class="form-control mb-2" accept="image/*" required>

            <label for="li_photo">Lodge Insite Photo</label>
            <input type="file" name="li_photo" id="li_photo" class="form-control mb-2" accept="image/*" required>

            <button type="submit" name="submit" class="btn btn-outline-primary mt-3 d-block w-50 mx-auto">ADD</button>


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