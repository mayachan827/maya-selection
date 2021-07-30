<?php
 
 include "../classes/lodge-admin.php";
 
 $lodge = new LodgeAdmin;
 $lodge_admin_list = $lodge->getAllLodges();
  
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Admin Lodge</title>
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
    
    <table class="table table-hover mt-5">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th>Lodge Name</th>
            <th>Lodge Description</th>
            <th>Lodge Address</th>
            <th>Lodge Season</th>
            <th>Lodge Category</th>
            <th>Lodge Outside Photo</th>
            <th>Lodge Inside Photo</th>
            <th></th>
            <th></th>
            
          </tr>
        </thead>
        <tbody>
          <?php
          while($lodge_admin_details = $lodge_admin_list->fetch_assoc()){
            ?>
            <tr>
              <td><?= $lodge_admin_details['lodge_id']?></td>
              <td><?= $lodge_admin_details['lodge_name']?></td>
              <td><?= $lodge_admin_details['lodge_desc']?></td>
              <td><?= $lodge_admin_details['lodge_address']?></td>
              <td><?= $lodge_admin_details['open_season']?></td>
              <td><?php if($lodge_admin_details['category'] == "N_alps"){
                echo "Northern Alps";}elseif($lodge_admin_details['category'] == "S_alps"){
                  echo "Southern Alps";}elseif($lodge_admin_details['category'] == "T_range"){
                    echo "Tateyama Range";}?></td>
              <td><img src="../assets/images/<?= $lodge_admin_details['lodge_site_photo']?>" alt="lodge_site_photo" height="80px">
              <p class="small"><?= $lodge_admin_details['lodge_site_photo']?></p></td>
              <td><img src="../assets/images/<?= $lodge_admin_details['lodge_inside_photo']?>" alt="lodge_inside_photo" height="80px">
              <p class="small"><?= $lodge_admin_details['lodge_inside_photo']?></p></td>
              <td>
                <a href="edit-lodge.php?lodge_id=<?= $lodge_admin_details['lodge_id']?>" class="btn  btn-outline-warning"><i class="fas fa-pencil-alt"></i></a> 
              </td>            
              <td>
                <a href="delete-lodge.php?lodge_id=<?= $lodge_admin_details['lodge_id']?>" class="btn  btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
              </td>
            </tr>


            <?php
          }
          ?>
        </tbody>
      </table>


    
  </div>



​
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
​
</html>









