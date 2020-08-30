<?php
include('../../../config/config.php');
error_reporting(0);

if(isset($_POST['add'])){

  $items = json_decode($_POST['allitems']);
  $ln = $_POST['ln'];
  $fn = $_POST['fn'];
  $mn = $_POST['mn'];
  $or = $_POST['or'];
  $sh = $_POST['sh'];
  $sm = $_POST['sm'];
  $price = $_POST['price'];

  $query = "SELECT * FROM entrance_exam WHERE official_receipt = $or";
  $result = mysqli_query($conn, $query);
   if(mysqli_num_rows($result) > 0)  
      {  
        echo '1';
          exit();
  
}
else
{
      $stmt = $pdo_conn->prepare("INSERT INTO entrance_exam (lastname, firstname, middlename, official_receipt, school_yr, semester, price) VALUES (?,?,?,?,?,?)");
      $stmt->bindParam(1, $ln);
      $stmt->bindParam(2, $fn);
      $stmt->bindParam(3, $mn);
      $stmt->bindParam(4, $or);
      $stmt->bindParam(5, $sh);
      $stmt->bindParam(6, $sm);
      $stmt->bindParam(7, $price);

      if($stmt->execute())
      {
        echo "0";
      }
      
      exit();
          
}
}


?>