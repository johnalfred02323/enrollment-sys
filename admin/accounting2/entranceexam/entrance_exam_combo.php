<?php

include('../../../config/config.php');
error_reporting(0);

// Transaction Modal //
function exam($conn){
  $output = '';
  $query = "SELECT * FROM entrance_exam_permit";

  $result = mysqli_query($conn, $query);

  while($row = mysqli_fetch_array($result)){
    $output .='<option id="'.$row["ee_id"].'" value="'.$row["price"].'">'.$row["description"].'</option>';
  }

  return $output;
}


?>
