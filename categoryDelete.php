<?php
include("db.php");
$id = $_GET['id'];
$sql = "DELETE FROM category WHERE id='$id'";
$pdo->exec($sql);
$sql = "DELETE FROM product WHERE category='$id'";
$pdo->exec($sql);
header("location:manageCategory.php");

?>