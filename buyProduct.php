<?php
// error when try to use JQuerry
include("db.php");
session_start();
$productId = $_POST['productId'];
if(!isset($_SESSION['email'])){
echo 'Please login first';
}else{

if(!isset($_POST['quantity'])||($_POST['quantity']<=0)){
echo "Please enter the number of product you wat to buy";
}else{


$quantity = $_POST['quantity'];

$price = $_POST['price'];
$totalPrice = $price*$quantity;
$email = $_SESSION['email'];


$sql = "INSERT INTO deal(productId,email,quantity,totalPrice) VALUES (:productId,:email,:quantity,:totalPrice)";
$statement = $pdo->prepare($sql);
$statement->bindValue(":productId", $productId);
$statement->bindValue(":email", $email);
$statement->bindValue(":quantity", $quantity);
$statement->bindValue(":totalPrice", $totalPrice);
$statement->execute();


echo 'Add deal to your cart successfully';

$sql = "UPDATE `product` SET `quantity`=quantity-:quantity WHERE `id`=$productId";
$statement = $pdo->prepare($sql);
$statement->bindValue(":quantity", $quantity);
$statement->execute();
}
}
echo "<a href='product.php?productId=$productId'>Back</a>";
?>