
	<?php
	include("db.php");
	
    $email = $_GET['email'];
	$name = $_GET['name'];
	$pass = $_GET['pass'];
	$repass = $_GET['repass'];
	$phone = $_GET['phone'];
	$address = $_GET['address'];
	
//SQL standfor structured query language
$sql = "SELECT * from account WHERE email='$email'";

//check num row in database
$stm = $pdo->prepare($sql);
$stm->execute();

//some form validate
if(($stm->rowCount())  == 1){
echo "Sorry, this email is already taken!";

}

else if(!preg_match('/[@.]/',$email)){
echo "Invalid email!";

}

else if(strlen($pass) < 6){
echo "Password is too short!";

}

else if(!($pass == $repass)){
echo "Passwords do not match";

}

//insert
else{
$sql = "INSERT INTO account(name,email,pass,phone,address) VALUES (:name,:email,:pass,:phone,:address)";
$statement = $pdo->prepare($sql);
$statement->bindValue(":name", $name);
$statement->bindValue(":email", $email);
$statement->bindValue(":pass", $pass);
$statement->bindValue(":phone", $phone);
$statement->bindValue(":address", $address);
$statement->execute();
echo 'Registed successfully';

}

	?>
