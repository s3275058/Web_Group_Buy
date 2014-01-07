
	<?php
	include("db.php");
	//cannot use Jquerry to submit file
    $name= $_POST['name'];

$sql = "SELECT * FROM css WHERE name='$name'";
$stm = $pdo->prepare($sql);
$stm->execute();
if(($stm->rowCount())  >= 1){
echo "Sorry, this name was already taken!";

}else{
//upload file
		$filename =$_FILES['file']['name'];
		$tmpname=$_FILES['file']['tmp_name'];
		$randomname = rand(0,100000000000000);
		move_uploaded_file($tmpname,"style$randomname.css");
		
	$sql = "INSERT INTO css(name,file) VALUES (:name,:file)";
	$statement = $pdo->prepare($sql);
	$statement->bindValue(":name", $name);
	$statement->bindValue(":file",$randomname);

$statement->execute();

header("location:manageCSS.php");

}

	?>