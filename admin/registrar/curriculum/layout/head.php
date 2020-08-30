<?php

session_start();

if (isset($_SESSION['usertype']) && ($_SESSION['department']))
{
    if ( $_SESSION['usertype'] == 'Super Admin' && $_SESSION['department'] == 'Registrar')
        {
            //code
        }

    else if ( $_SESSION['usertype'] == 'Staff' && $_SESSION['department'] == 'Registrar')
        {
            //code
        }
    else if ( $_SESSION['usertype'] != 'Super Admin' && $_SESSION['department'] != 'Registrar' )
        {
            header('Location: ../../401');
        }
    else if ( $_SESSION['usertype'] != 'Staff' && $_SESSION['department'] != 'Registrar' )
        {
            header('Location: ../../401');
        }                 
    else 
        {
            header('Location: ../../../login/');
        }                       
}

else
{
    header('Location: ../../../login/');
}   

?>
<!-- insert code here -->
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

  <!-- Custom styles for this template -->
  <link href="../../../src/css/admin.css" rel="stylesheet">

  <link href="../../../src/fontawesome-free/css/all.min.css" rel="stylesheet">  

  <!-- My CSS -->
  <link href="../../../src/css/main.css" rel="stylesheet">

