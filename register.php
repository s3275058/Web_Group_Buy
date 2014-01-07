<?php
include("db.php");
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script>
	function setCookie(key, value) {
   var expires = new Date();
   expires.setTime(expires.getTime() + 31536000000); //1 year
   document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
   }

	function getCookie(key) {
   var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
   return keyValue ? keyValue[2] : null;
   }
	</script>
	
	
	<script>
	
	var styleId =  getCookie("css") ;
	if(styleId==null){
	document.writeln('<link rel="stylesheet" type="text/css" href="style.css">');
	}else{
	document.writeln('<link rel="stylesheet" type="text/css" href="style'+styleId +'.css">');
//<link rel="stylesheet" type="text/css" href="style.css">
}	
	</script>
<title>Register</title>
</head>

<body>
	
    <div id="header">
	           		<a href="index.php" id="logo"><img src="images/logo.jpg" width="310" height="114" alt="" title=""></a>
					<ul class="navigation">
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="index.php">New deal</a></li>
						<li><a href="#">Category</a>
                            <ul>  
							<?php
					$sql= "SELECT * FROM category";
					$result = $pdo->query($sql);
					while($row = $result->fetch()){
					$id = $row['id'];
					echo "<li><a href='category.php?categoryId=$id'>".$row['name']."</a></li>";
							}
							?>
							
                            </ul>  
                    	</li>
						<li><a href="register.php">Register</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="contact.php">Contact us</a></li>
					</ul>
			</div>
            <div id='body'>
            <div id="stylized" class="myform">
			
        <form id="form" >
            <h1>Sign-up</h1>
            
            <label>Name
            <span class="small">Add your name</span>
            </label>
            <input type="text" name="name" id="name"/>
            
            <label>Email
            <span class="small">Add a valid address</span>
            </label>
            <input type="text" name="email" id="email"/>
            
            <label>Password
            <span class="small">Min. size 6 chars</span>
            </label>
            <input type="password" name="pass" id="pass"/>
			
			<label>Retype password:
            <span class="small">Min. size 6 chars</span>
            </label>
            <input type="password" name="repass" id="repass"/>
			
            <label>Phone No
            <span class="small">Add your phone number</span>
            </label>
            <input type="number" name="phone" id="phone"/>
            
            <label>Address
            <span class="small">Add your address</span>
            </label>
            <input type='text' name="address" id="address"/>
            
            <button type="button" id="butn">Sign-up</button>
            <div class="spacer"></div>
            
            </form>
			
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js">
			// this is for install JQuery
			</script>
			
		<script>
			$('#butn').click(function(){
			
				$.ajax({
					url: 'registed.php',
					data: $('#form').serialize(),
					success: function(msg){
												alert(msg);
												}
						});
			});
		</script>
			</div>
             
            </div>
    


</body>	
</html>