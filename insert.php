<?php
// database connect
 $db_connect = mysqli_connect('localhost', "root", "", "crudoperation");
 
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  // insert query
  $query = "INSERT INTO insert_data (name, email, password) VALUES ('$name', '$email', '$password')";
  // insert method
  $insert = mysqli_query($db_connect, $query);
  if($insert){
    echo "<script>alert('Data Inserted Successfully.')</script>";
  }
  else{
    echo "<script>alert('Data Not Inserted')</script>";
  }

}

?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Crud Operation - Insert Data</title>
</head>
<body>
  <!-- form start -->
 
  <div class="card shrink-0 w-full max-w-sm mx-auto mt-6 shadow-2xl bg-base-100">
  <h3 class="text-2xl font-bold text-center mt-6 text-yellow-600"> Insert Data</h3>
    <form class="card-body" method="POST">
      <div class="form-control">
        <label class="label">
          <span class="label-text">Name</span>
        </label>
        <input type="text" name="name" placeholder=" Name" class="input input-bordered" required />
      </div>
      <div class="form-control">
        <label class="label">
          <span class="label-text">Email</span>
        </label>
        <input type=" email" name="email" placeholder="email" class="input input-bordered" required />
      </div>
      <div class="form-control">
        <label class="label">
          <span class="label-text">Password</span>
        </label>
        <input type="password" name="password" placeholder="password" class="input input-bordered" required />
      </div>
      <div class="form-control mt-6">
        <button name="submit" class=" btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
  <!-- form end -->

<!-- Table -->
<div class="overflow-x-auto w-1/2 mx-auto ">
  <h3 class="text-2xl font-bold text-center mt-12 mb-8  text-purple-600">Get All Data</h3>
  <table class="table">
    <!-- head -->
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Delete</th>
        <th>Update</th>
      </tr>
    </thead>
    <tbody>

  <?php
  // get data query
  $get_data = "SELECT * FROM insert_data";
  $query =mysqli_query($db_connect,$get_data);
  
  while($row = mysqli_fetch_array($query)){ ?>
    <!-- row 1 -->
    <tr>
  <th><?php echo $row["id"] ?></th>
  <th><?php echo $row["name"] ?></th>
  <th><?php echo $row["email"] ?></th>
  <th><?php echo $row["password"] ?></th>
  <th>
  <a onclick="return confirm ('Are You Sure? You want delete it.') " href="delete.php ? idNo=<?php echo $row["id"] ?> ">
  <button class="btn btn-circle btn-sm text-red-500">
  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
</button>
</a>
  </th>
  <th><a href="update.php ? idNo=<?php echo $row["id"] ?> "><button class="btn btn-success btn-sm">Update</button></a></th>
</tr>

  <?php }
  ?>
      
    </tbody>
  </table>
</div>
<!-- Table end-->


</body>

</html>