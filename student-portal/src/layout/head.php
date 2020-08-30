<?php
include_once('../../config/config.php');
include_once('../../login/functions.php');

if(!func::checkLoginState($pdo_conn)) {
  header('Location: ../../');
}

if ( $_COOKIE['userrole'] != 'student')
{
  header('Location: ../../401');
}     
?>
<!DOCTYPE html>
<html lang="en" class="scroll">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <link rel="icon" href="../../src/img/logo.png" sizes="16x16">

        <title>GRC | Student Portal | Grade Viewing</title>

        <link href="../src/css/styles.css" rel="stylesheet" />
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

        <link href="../vendor/css/main-style.css" rel="stylesheet" />

        <link href="../src/layout/admin-style.css" rel="stylesheet" />
        <link href="../src/css/main-style.css" rel="stylesheet" />

