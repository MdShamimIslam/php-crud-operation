
<?php
// database connect
 $db_connect = mysqli_connect('localhost', "root", "", "crudoperation");
 $id = $_GET['idNo'];
// delete query
$deleteQuery = "DELETE FROM insert_data WHERE id = $id ";
$delete =mysqli_query($db_connect,$deleteQuery);
if($delete){
    header('location:insert.php');
  }
 


?>