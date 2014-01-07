<?php

//Fail use JQuerry to submit image
include("db.php");
$title = $_POST['title'];
$quantity = $_POST['quantity'];
$category = $_POST['category'];
$describe = $_POST['describe'];
$strdate = $_POST['strdate'];
$price = $_POST['price'];
$oldprice = $_POST['oldprice'];
$save = 100-(($price*100)/$oldprice);
$status = 'active';



//check if price > old price
if($price>= $oldprice){
echo 'group buy price must be greater than old price.<br/>';
}
//check if number is >=0
else if($price<=0||$oldprice<=0||$quantity <=0){
echo 'invalid number, must be greater than 0.<br/>';
}
/** date validate from    "http://www.smartwebby.com/PHP/datevalidation.asp#explanation" **/
//Check the length of the entered Date value 
else if((strlen($strdate)<10)OR(strlen($strdate)>10)){
echo("Enter the date in 'dd/mm/yyyy' format.<br/>");
}
else{

//The entered value is checked for proper Date format 
if((substr_count($strdate,"/"))<>2){
echo("Enter the date in 'dd/mm/yyyy' format.<br/>");
}
else{
$pos=strpos($strdate,"/");
$date=substr($strdate,0,($pos));
$result=ereg("^[0-9]+$",$date,$trashed);
$month=substr($strdate,($pos+1),($pos));
$result=ereg("^[0-9]+$",$month,$trashed);
$year=substr($strdate,($pos+4),strlen($strdate));
$result=ereg("^[0-9]+$",$year,$trashed);

if(!($result)){echo "Enter a Valid Date.<br/>";}
else if(($date<=0)||($date>31)){echo "Enter a Valid Date.<br/>";}


else if(($month<=0)||($month>12)){echo "Enter a Valid Month.<br/>";}


else if(!($result)){echo "Enter a Valid Month.<br/>";}


else if(!($result)){echo "Enter a Valid Year.<br/>";}

else if(($year<1900)||($year>2200)){echo "Enter a year between 1900-2200.<br/>";

}else{
/*******images upload*********/
		$filename =$_FILES['file']['name'];
		$tmpname=$_FILES['file']['tmp_name'];
		$pic = $filename;
		$randomname = rand(0,100000000000000);
		//ext to get the last
		$ext = pathinfo($name, PATHINFO_EXTENSION);
		
		move_uploaded_file($tmpname,"upload/".$randomname.".".$ext);
		
		


$sql = "INSERT INTO product(`title`,`category`,`quantity`,`price`,`oldprice`,`save`,`status`,`describe`,`date`,`pic`) VALUES (:title,:category,:quantity,:price,:oldprice,:save,:status,:describe,:date,:pic)";

$statement = $pdo->prepare($sql);
$statement->bindValue(":title",$title);
$statement->bindValue(":category",$category);
$statement->bindValue(":quantity",$quantity);
$statement->bindValue(":describe",$describe);
$statement->bindValue(":date",$strdate);
$statement->bindValue(":pic",$randomname);
$statement->bindValue(":price",$price);
$statement->bindValue(":oldprice",$oldprice);
$statement->bindValue(":save",$save);
$statement->bindValue(":status",$status);

$statement->execute();

/*$sql = "INSERT INTO product(`title`,`category`,`quantity`,`price`,`oldprice`,`save`,`status`,`describe`,`date`,`pic`) VALUES ('$title','$category',$quantity,$price,$oldprice,$save,'status','$describe','$strdate','$pic')";
$pdo->exec($sql);
*/
echo 'Successfully'.'</br>';
echo "<a href='index.php'>Go back to home page</a>";
}
}
}


?>