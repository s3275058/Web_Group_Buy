	<?php
	session_start();
	include("db.php");
	
	$email = $_SESSION['email'];
	$name = $_GET['name'];
	$pass = $_GET['pass2'];
	$repass = $_GET['repass'];
	$phone = $_GET['phone'];
	$address = $_GET['address'];
	
if(strlen($pass) < 6){
echo "Password is too short!";

}

else if(!($pass == $repass)){
echo "Passwords do not match"."<br/>";

}


else{
$sql = "UPDATE `account` SET `name` = '$name', `pass` = '$pass', `phone` = '$phone', `address` = '$address' WHERE `email` = '$email'";
$pdo->exec($sql);
echo 'Updated successfully'.'</br>';
}
	?>