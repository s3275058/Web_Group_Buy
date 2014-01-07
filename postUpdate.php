<?php
include("db.php");
$id = $_GET['postId'];
$title = $_GET['title'];
$quantity = $_GET['quantity'];
$category = $_GET['category'];
$describe = $_GET['describe'];
$strdate = $_GET['strdate'];
$price = $_GET['price'];
$oldprice = $_GET['oldprice'];
$save = 100-(($price*100)/$oldprice);

//check if price > old price
if($price>= $oldprice){
echo 'price must be greater than old price';
}
//check if number is >=0
else if($price<=0||$oldprice<=0||$quantity <=0){
echo 'invalid number, must be greater than 0';
}
/** date validate from    "http://www.smartwebby.com/PHP/datevalidation.asp#explanation" **/
//Check the length of the entered Date value 
else if((strlen($strdate)<10)OR(strlen($strdate)>10)){
echo("Enter the date in 'dd/mm/yyyy' format");
}


//The entered value is checked for proper Date format 
else if((substr_count($strdate,"/"))<>2){
echo("Enter the date in 'dd/mm/yyyy' format");
}
else{
$pos=strpos($strdate,"/");
$date=substr($strdate,0,($pos));
$result=ereg("^[0-9]+$",$date,$trashed);
$month=substr($strdate,($pos+1),($pos));
$result=ereg("^[0-9]+$",$month,$trashed);
$year=substr($strdate,($pos+4),strlen($strdate));
$result=ereg("^[0-9]+$",$year,$trashed);

if(!($result)){echo "Enter a Valid Date";}
else if(($date<=0)||($date>31)){echo "Enter a Valid Date";}


else if(($month<=0)||($month>12)){echo "Enter a Valid Month";}


else if(!($result)){echo "Enter a Valid Month";}


else if(!($result)){echo "Enter a Valid year";}

else if(($year<1900)||($year>2200)){

echo "Enter a year between 1900-2200";

}else{


$sql = "UPDATE `product` SET `title`='$title', `category`='$category', `quantity`='$quantity', `price`='$price', `oldprice`='$oldprice', `save`='$save', `describe`='$describe', `date`='$strdate'  WHERE `id`=$id";
$pdo->exec($sql);

echo 'Successfully, F5 to refresh';

}
}



?>