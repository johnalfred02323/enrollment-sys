<?php
include('../config/config.php');
include('../login/functions.php');
// CHECK IF USER IS LOGGED IN
if (func::checkLoginState($pdo_conn)) {
    # redirect user to login page
    if($_COOKIE['userrole'] == 'Faculty') {
      header("Location: ../faculty/dashboard");
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

  <link href="../src/fontawesome-free/css/all.min.css" rel="stylesheet">
  <script src="../src/fontawesome-free/js/all.min.js"></script>
    <link href="src/css/admin.css" rel="stylesheet">

  <!-- My CSS -->
  <link rel="stylesheet" type="text/css" href="src/css/main-style.css"/>
