<?php
include("db.php");
$id = $_GET['id'];
$sql = "DELETE FROM product WHERE id='$id'";
$pdo->exec($sql);
header("location:postList.php");

?>