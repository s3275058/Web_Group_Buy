<?php
include("db.php");
$id = $_GET['id'];
$sql = "UPDATE product SET `status` = 'inactive' WHERE id='$id'";
$pdo->exec($sql);
header("location:postList.php");
?>