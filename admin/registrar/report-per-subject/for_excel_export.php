<?php 
$name = $_GET['data2'];
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$name.xls"); 
?>