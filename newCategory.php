
	<?php
	include("db.php");
	
    $name= $_GET['name'];
$sql = "SELECT * FROM category WHERE name='$name'";
$stm = $pdo->prepare($sql);
$stm->execute();
if(($stm->rowCount())  >= 1){
echo "Sorry, this name was already taken!";

}else{

$sql = "INSERT INTO category(name) VALUES (:name)";
$statement = $pdo->prepare($sql);
$statement->bindValue(":name", $name);

$statement->execute();

header("location:manageCSS.php");
}

	?>