<?php
include('../../../config/config.php');

//for school year
if(isset($_POST['tabledata'])) {
  $count = 0;
$query = mysqli_query($conn, "SELECT DISTINCT school_year, semester FROM schedule ORDER BY school_year DESC") or die(mysqli_error($conn));
  if(mysqli_num_rows($query) > 0)
  {

    while($rows=mysqli_fetch_array($query))
    {
      $count++;
      $output = ' <tr>
              <td id="sy'.$count.'">'.$rows['school_year'].'</td>
              <td id="sem'.$count.'">'.$rows['semester'].'</td>
              <td><button id="'.$count.'" class="delete-user pull-xs-right print" ripple><i class="fas fa-print"></i> PRINT</button> <button id="'.$count.'" class="edit-user pull-xs-right excel" ripple><i class="far fa-file-excel"></i> EXCEL</button></td>
            </tr>';
      echo $output;
    } 
  }
  else
  {
    echo '<tr><th colspan="3"><center>No data available in table</center></th></tr>';
  }
  exit();
}
?>