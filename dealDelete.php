<?php
include("db.php");
$id = $_GET['id'];
$quantity = $_GET['quantity'];
$productId = $_GET['productId'];

$sql = "UPDATE `product` SET `quantity`=`quantity`+:quantity WHERE `id`=$productId";
$statement = $pdo->prepare($sql);
$statement->bindValue(":quantity", $quantity);
$statement->bindValue(":productId", $productId);
$statement->execute();



$sql = "DELETE FROM deal WHERE id='$id'";
$pdo->exec($sql);

header("location:shopCart.php");

?>