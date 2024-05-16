
<?php
// database connect
 $db_connect = mysqli_connect('localhost', "root", "", "crudoperation");
 $id = $_GET['idNo'];
 
if(isset($_POST['update'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  // update query
  $updateQuery = "UPDATE insert_data SET 
   name =  '$name', email = '$email', password = '$password' WHERE id = $id " ;
  // update method
  $update = mysqli_query($db_connect, $updateQuery);
  if($update){
    echo "<script>alert('Data Updated Successfully.')</script>";
    header("location:insert.php");
  }
  else{
    echo "<script>alert('Data Updated Failed')</script>";
  }
}
// after the get data by id  when updated
$get_data = "SELECT * FROM insert_data WHERE id = $id ";
$query =mysqli_query($db_connect,$get_data);
$row = mysqli_fetch_array($query)

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Update Data</title>
</head>
<body>
    
    <!-- form start -->
  <div class="card shrink-0 w-full max-w-sm mx-auto mt-24 shadow-2xl bg-base-100">
  <h3 class="text-2xl font-bold text-center mt-6 text-pink-400"> Update Data</h3>
    <form class="card-body" method="POST">
      <div class="form-control">
        <label class="label">
          <span class="label-text">Name</span>
        </label>
        <input value="<?php echo $row['name']?>" type="text" name="name" placeholder=" Name" class="input input-bordered" required />
      </div>
      <div class="form-control">
        <label class="label">
          <span class="label-text">Email</span>
        </label>
        <input value="<?php echo $row['email']?>" type=" email" name="email" placeholder="email" class="input input-bordered" required />
      </div>
      <div class="form-control">
        <label class="label">
          <span class="label-text">Password</span>
        </label>
        <input value="<?php echo $row['password']?>" type="password" name="password" placeholder="password" class="input input-bordered" required />
      </div>
      <div class="form-control mt-6">
        <button name="update" class=" btn btn-primary">Update</button>
      </div>
    </form>
    <div class="flex w-full justify-center mb-6">
    <a href="insert.php"><button class="btn  bg-black-500 text-white btn-sm">Go Back</button></a>
    </div>
  </div>
  <!-- form end -->
    
</body>
</html>