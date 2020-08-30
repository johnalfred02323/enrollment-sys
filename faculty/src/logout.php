<?php
include_once('../../login/functions.php');

func::deleteCookie();
setcookie('userrole', '', time() - 1, '/');

header("Location: ../?=logout-success");
exit;