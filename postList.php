
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
<title>List of post</title>
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
			<div id ='signin' class='signinform'>
			<?php
			if(!isset($_SESSION['email']))
			{
			?>
            <form id="form" name="form" method="post" action="log.php?action=login" >
             <h1> Sign In</h1>
            <label>Email </label> 
            <input type='text' name='email' /><br/>
            <label> Password</label>
            <input type='password' name='pass' /><br/>
            <button type="submit">Log In</button>
            <div class="spacer"></div>
            </form>
			<?php 
			}
			else
			{
				if($_SESSION['email']=='admin')
				{
			echo 'Welcome ' . $_SESSION['email'] . '<br/><a href="logout.php">Log out</a>
															<a class="sa" href="newPost.php">New Post</a> 
															<a class="sa" href="postList.php">Post-List</a>
															<a class="sa" href="manageCSS.php">CSS-Management</a> 
															<a class="sa" href="manageCategory.php">Category-Management</a> ';
				}
				else
				{
				echo 'Welcome ' . $_SESSION['email'] . '<br/><a href="logout.php">Log out</a> 
															<a href="accEdit.php">Edit</a>
															<a href="shopCart.php">Shopping Cart</a>
															';
				?>
			

					<?php
						$sql= 'SELECT * FROM css';
						$result = $pdo->query($sql);
						while($row = $result->fetch()){
						$id = $row['id'];	
						?>
						<a class='sp' href="javascript: setCookie('css', <?php $_SESSION['css']= $row['file'];
																				echo $row['file']; ?>); window.location.reload();">CSS: <?php  echo $row['name'];?></a>
			<?php
			}
			}
			}?>
			</div>
			
			
			
            <table id="postTable">

				<thead>
					<tr>
						<th>Id</th>
						<th>Title</th>
						<th>Status</th>
						<th>Due Date</th>
						<th>Quantity</th>
						<th>Action</th>
					</tr>
				</thead>
					<tbody>
					<?php
					$sql= "SELECT * FROM product";
					$result = $pdo->query($sql);
					while($row = $result->fetch()){
					$id = $row['id'];
					echo "<tr>";
						echo "<td>".$row['id']."</td>";
						echo "<td>".$row['title']."</td>";
						echo "<td>".$row['status']."</td>";
						echo "<td>".$row['date']."</td>";
						echo "<td>".$row['quantity']."</td>";
						
						//active and inactive
						if($row['status']=='active'){
						echo "<td><a href='postEdit.php?id=$id'>EDIT</a>
							<a href='postSelete.php?id=$id'>DELETE</a>	
							<a href='postInActive.php?id=$id'>INACTIVE</a>	
							</td>";
							}else{
						echo "<td><a href='postEdit.php?id=$id'>EDIT</a>
							<a href='postSelete.php?id=$id'>DELETE</a>	
							<a href='postActive.php?id=$id'>ACTIVE</a>	
							</td>";	
							}
					echo "</tr>";
					}
					?>
					</tbody>
				</table>
            </div>
    


</body>	
</html>