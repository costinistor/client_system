<?php
	//include "functions.php";
	//include "arrays.php";
	//include "table-work.php";
	//$client = include ('page-client.php');
/* 	if(include ('page-client.php')){
		$error = "User name or Password incorect";
	} */
	//print_r($client);
	session_start();
		if(isset($_POST['submit'])){
		$user = $_POST['user'];
		$password = $_POST['password'];
 			if($user == "Costi" && $password == "kardon"){
				echo "Logare corecta ";
				header ('Location: http://localhost/clienti/page-client.php');
			}else{
				header ('Location: http://localhost/clienti');
			} 
			echo $user;
			$_SESSION['user'] = $user;
	}else{
		//header ('Location: http://localhost/clienti');
	}
	


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
	table tr td, table th{
		border: 1px solid #000;	
	}
</style>
</head>

<body>
<form action="" method="post">
<p><input type="text" name="user"> User name</p>
<p><input type="password" name="password"> Password</p>
<p><input type="submit" name="submit" value="Login"></p>
</form>
<p><?php //echo $error; ?></p>
<form action="" method="post">
<p><input type="text" name="use"> User name</p>
<p><input type="password" name="passwor"> Password</p>
<p><input type="submit" name="" value="Login"></p>
</form>
</body>
</html>