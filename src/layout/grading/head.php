<?php
include_once('../../config/config.php');
include_once('../../login/functions.php');

if(!func::checkLoginState($pdo_conn)) {
  header('Location: ../../login/');
}

if ( ($_COOKIE['userrole'] != 'Super Admin' || $_COOKIE['userrole'] != 'Staff') && $_COOKIE['userdept'] != 'Registrar')
{
  header('Location: ../../401');
}     
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

   <!-- Favicon -->
  <link rel="icon" href="../../src/img/logo.png" type="image/gif" sizes="32x32">

  <!-- Font Roboto -->
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../src/css/admin.css" rel="stylesheet">

  <!-- My CSS -->
  <link href="../../src/css/main.css" rel="stylesheet">


  <link href="../../src/fontawesome-free/css/all.min.css" rel="stylesheet"> 
  <script src="../../src/fontawesome-free/js/all.min.js"></script>
