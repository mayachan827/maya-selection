<?php
session_start();

include "../classes/lodge-admin.php";

$lodge_admin = new LodgeAdmin;
$lodge_admin_list = $lodge_admin->getAllLodges($_SESSION['lodge_id']);
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

    <title>lodge-edit</title>
</head>
​
<body>
  <main class="container" style="padding-top: 80px">
    <h2 class="text-muted">Lodge List</h2>
      <table class="table table-hover">
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
              <td><?= $lodge_admin_details['category']?></td>
              <td><?= $lodge_admin_details['lodge_site_photo']?></td>
              <td><?= $lodge_admin_details['lodge_inside_photo']?></td>
              <td>
              <a href="edit-lodge.php?lodge_id=<?= $lodge_admin_details['lodge_id']?>" class="btn btn-outline-warning"><i class="fas fa-pencil-alt"></i></a>             
              <a href="delete-lodge.php?lodge_id=<?= $lodge_admin_details['lodge_id']?>" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
            </td>
            </tr>


            <?php
          }
          ?>
        </tbody>
      </table>


  </main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
​
</html>