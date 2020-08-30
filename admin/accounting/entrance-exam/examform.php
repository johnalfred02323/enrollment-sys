<?php
include('../../../config/config.php');
error_reporting(0);

if(isset($_POST['add'])){

  $ln = $_POST['ln'];
  $fn = $_POST['fn'];
  $mn = $_POST['mn'];
  $or = $_POST['or'];
  $sh = $_POST['sh'];
  $sm = $_POST['sm'];
  $price = $_POST['price'];
  $uc1 = $_POST['uc'];
  $ee1 = $_POST['ee'];

  $query = "SELECT * FROM entrance_exam WHERE official_receipt = $or";
  $result = mysqli_query($conn, $query);
   if(mysqli_num_rows($result) > 0)  
      {  
        echo '1';
          exit();
  
}
else
{

      // all transaction database
      $querytrans = "INSERT INTO transaction_all (`lastname`, `firstname`, `middlename`, `official_receipt`, `cash_rendered`, `amount`, schoolyr, semester, cashier, description, `date_paid`) VALUES ('$ln', '$fn', '$mn', '$or', '$price', '$price', '$sh', '$sm', '$uc1', '$ee1', CURRENT_DATE())";
      $resulttrans = mysqli_query($conn, $querytrans);

      // entrance exam database
      $stmt = $pdo_conn->prepare("INSERT INTO entrance_exam (lastname, firstname, middlename, official_receipt, school_yr, semester, price, cashier, `date_paid`) VALUES (?,?,?,?,?,?,?,?,CURRENT_DATE())");
      $stmt->bindParam(1, $ln);
      $stmt->bindParam(2, $fn);
      $stmt->bindParam(3, $mn);
      $stmt->bindParam(4, $or);
      $stmt->bindParam(5, $sh);
      $stmt->bindParam(6, $sm);
      $stmt->bindParam(7, $price);
      $stmt->bindParam(8, $uc1);

      if($stmt->execute())
      {
        echo "0";
      }
      
      exit();
          
}


}



?>