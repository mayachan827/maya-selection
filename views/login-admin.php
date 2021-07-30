<!doctype html>
<html lang="en">
​
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login admin</title>
</head>
​
<body>
<body class="bg-light">
    <div styles="height: 100vh">
     <div class="row w-100 m-0">
       <div class="card w-25 my-auto mx-auto">
         <div class="card-header bg-white border-0">
           <h1 class="text-center">ADMIN LOGIN</h1>
         </div>
         <div class="card-body">
             <form action="lodge-admin.php" method="post">
                 <input type="text" name="admin_name" placeholder="admin-name" class="form-control mb-2" required>
                 <input type="password" name="password" class="form-control mb-5" placeholder="password" required>
                 <button type="submit" class="btn btn-warning w-100">LOG IN</button>               
             </form>

             <div class="text-center mt-3"><a href="main-page.php">TOP</a></div>


           
         </div>
       </div>
     </div> 
</div>
  </body>



​
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
​
</html>

