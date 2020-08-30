<?php

include('../../../config/config.php');
error_reporting(0);

// Transaction Modal //
function transaction($conn){
  $output = '';
  $query = "SELECT * FROM other_fees";

  $result = mysqli_query($conn, $query);

  while($row = mysqli_fetch_array($result)){
    $output .='<option id="'.$row["ofs_id"].'" value="'.$row["price"].'">'.$row["description"].'</option>';
  }

  return $output;
}


?>
