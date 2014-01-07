<?php
include("db.php");
$id = $_GET['id'];
$sql = "UPDATE product SET `status` = 'active' WHERE id='$id'";
$pdo->exec($sql);
header("location:postList.php");
?>