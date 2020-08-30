<?php
include_once('../login/functions.php');

func::deleteCookie();
setcookie('userrole', '', time() - 1, '/');
setcookie('userdept', '', time() - 1, '/');

header("Location: ../login/?=logout-success");
exit;