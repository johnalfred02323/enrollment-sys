<?php
include('../../config/config.php');

if(isset($_POST['update_seen'])) {
    $usertype = $_POST['usertype'];
    $stmt =  $pdo_conn->prepare("UPDATE notification SET seen = 1 WHERE seen = 0 AND message_for = :msg_for;");
    $stmt->bindparam(':msg_for', $usertype, PDO::PARAM_STR, 12);
    $stmt->execute();
}