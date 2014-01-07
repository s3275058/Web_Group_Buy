
<?php
// when use JQuerry it do not go back to hame page--> inconvenience
include("db.php");
$email = $_POST['email'];
$pass = $_POST['pass'];
$sql = "SELECT * FROM account WHERE email='$email' AND pass='$pass'";
$result = $pdo->query($sql);



//check rows in database
$stm = $pdo -> prepare($sql);
$stm->execute();


if(($stm->rowCount()) == 1) {
   session_register("email"); //Create the session
   $_SESSION["email"] = $email;
   echo 'Wellcome!';
   header("location: index.php");// success page

} else {
   echo 'Wrong email or password!';//error
}
?>
