<?php
session_start();
if (isset($_SESSION['usertype'])){
  if($_SESSION['usertype'] == "Faculty"){
    header("Location: ../faculty/dashboard");
  }
  else{
    header("Location: ../faculty/");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="icon" href="src/img/logo.png" type="image/gif" sizes="16x16">

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"/>
  

  <!-- My CSS -->
  <link rel="stylesheet" type="text/css" href="src/css/main-style.css"/>