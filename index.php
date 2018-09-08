<?php
include ('database.php');
session_start();
$query = "SELECT * FROM admin";		
	$result = $mysqli->query($query) or die();
	
	
		if(isset($_POST['submit'])){
		$user = $_POST['user'];
		$password = $_POST['password'];
		
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					if($user == $row['user'] && $password == $row['password']){
						//echo "Logare corecta ";
						header ('Location: http://localhost/clienti/page-client.php');
					}else{
						//header ('Location: http://localhost/clienti');
						$error_log = '<p class="warning">Incorect numele sau parola</p>';
					}
				}		
			}
			
			//echo $user;
			$_SESSION['user'] = $user;
	}else{
		//header ('Location: http://localhost/clienti');
	}
	


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Panou logare</title>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" >
<link href="style.css" rel="stylesheet" >
<style>

</style>
</head>

<body>
<div class="container">
	<div class="header">
		<h1 class="text-primary">Clients System Bucket</h1>
	</div>
</div>

<div class="bar-title">
	<p></p>
</div><br>
<div class="container">

	<form action="" method="post" class="form-signin">
		<h2 class="form-signin-heading">Autentificare</h2>		
		<p><input type="text" name="user" class="form-control" placeholder="User name" required autofocus></p>
		<p><input type="password" name="password" class="form-control" placeholder="Password" required> </p>
		<p><input type="submit" name="submit" value="Log In" class="btn btn-lg btn-primary btn-block"></p>
		<?php if(isset($error_log)){ echo $error_log;} ?>
	</form>		

</div>
</body>
</html>