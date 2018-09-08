<?php
//require_once 'page-client.php';
session_start();
$user = $_SESSION['user']; 
if($user != "Costi"){
	header ('Location: http://localhost/clienti');
}
echo $user;
?>

<h1>Lista cu clienti</h1>
<a href="page-client.php">Next page</a>