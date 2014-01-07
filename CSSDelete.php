<?php
include("db.php");
$id = $_GET['id'];
$file = $_GET['file'];
$sql = "DELETE FROM css WHERE id='$id'";
$pdo->exec($sql);
$myFile =$file.".css";
unlink($myFile);
header("location:manageCSS.php");

?>