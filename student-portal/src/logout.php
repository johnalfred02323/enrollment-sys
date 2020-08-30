<?php
include_once('../../login/functions.php');

func::deleteCookie();
setcookie('sn', '', time() - 1, '/');
setcookie('userrole', '', time() - 1, '/');
setcookie('name', '', time() - 1, '/');

header("Location: ../../?=logout-successful");
exit;