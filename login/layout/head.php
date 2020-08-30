<?php
// session_start();
// if (isset($_SESSION['user'])){
//   $_SESSION['user'];
//   header("Location: ../admin/registrar");
// }
include('../config/config.php');
include('functions.php');
// CHECK IF USER IS LOGGED IN
if (func::checkLoginState($pdo_conn)) {
    # redirect user to login page
    if(($_COOKIE['userrole'] == 'Super Admin' || $_COOKIE['userrole'] == 'Staff') && $_COOKIE['userdept'] == 'Registrar') {
      header("Location: ../admin/registrar");
    }
    else if($_COOKIE['userrole'] == 'Admin' && $_COOKIE['userdept'] == 'Accounting') {
      header("Location: ../admin/accounting");
    }
    else if($_COOKIE['userrole'] == 'Cashier' && $_COOKIE['userdept'] == 'Accounting') {
      header("Location: ../admin/accounting/cashier-dashboard");
    }
    else if(($_COOKIE['userrole'] == 'Admin' || $_COOKIE['userrole'] == 'Staff') && $_COOKIE['userdept'] == 'Admission') {
      header("Location: ../admin/admission");
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

  <link rel="icon" href="img/logo.png" type="image/gif" sizes="16x16">

  <!-- Custom fonts for this template-->
  <link href="https://fonts.googleapis.com/css?family=Vibur" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


  <!-- Custom styles for this template-->
  <link href="css/login-style.min.css" rel="stylesheet">

  <link href="../src/fontawesome-free/css/all.min.css" rel="stylesheet"> 

  <!-- My CSS -->
  <link rel="stylesheet" type="text/css" href="css/main-login.css">