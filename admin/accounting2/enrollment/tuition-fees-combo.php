<?php

function fees($conn){
  $output = '';
  $query = "SELECT * FROM tuition_fees";

  $result = mysqli_query($conn, $query);

  while($row = mysqli_fetch_array($result)){
    $output .='<option value="'.$row["tuition_fees"].'">'.$row["tuition_fees"].'</option>';
  }

  return $output;
}


?>