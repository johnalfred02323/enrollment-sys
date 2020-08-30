<?php
session_start();
if(isset($_SESSION['user'])){
$_SESSION['user'];
}else{
  header("Location: ../../login");
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
  <link rel="icon" href="../../../src/img/logo.png" type="image/gif" sizes="32x32">

  <!-- Font Roboto -->
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  
  <!-- Custom fonts for this template -->
  <!-- <link href="offline-icon/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
  <link href="https://fonts.googleapis.com/css?family=Vibur" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../../src/css/admin.css" rel="stylesheet">
  <link href="../../../src/css/dark-mode-admin.css" rel="stylesheet">

  <!-- My CSS -->
  <link href="../../../src/css/main.css" rel="stylesheet">
  <link href="../../../src/css/dark-mode-main.css" rel="stylesheet">


<link href="../../../src/fontawesome-free/css/all.min.css" rel="stylesheet">  