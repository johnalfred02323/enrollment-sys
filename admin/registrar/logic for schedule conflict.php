
<?php
$d1=mktime(10, 00, 00);
$d2=mktime(10, 01, 00);
$d3=mktime(11, 30, 00);
$date1 = DateTime::createFromFormat('H:i a', $d1);
$date2 = DateTime::createFromFormat('H:i a', $d2);
$date3 = DateTime::createFromFormat('H:i a', $d3);
if ($d1 < $d2 && $d3 > $d2)
{
   echo 'here';
}
else
{
  echo 'there';
}
 ?>