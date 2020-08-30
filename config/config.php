<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'root';
$password = '';
$db = 'grc_db';
$server = 'localhost';

$conn = mysqli_connect($server,$username,$password,$db) or die(mysqli_error($conn));

$pdo_conn = new PDO("mysql:host=localhost;dbname=grc_db","root","");

$dbDetails = array(
'host' => 'localhost',
'user' => 'root',
'pass' => '',
'db'   => 'grc_db'
);