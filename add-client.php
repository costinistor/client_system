<?php
include ('database.php');
session_start();

/* $query = "SELECT * FROM clienti";		
	$result = $mysqli->query($query) or die(); */

$user = $_SESSION['user'];
if($user != "Costi"){
	header ('Location: http://localhost/clienti');
}

if(isset($_POST['submit'])){
	
		$name = $mysqli->real_escape_string($_POST['nume']);
		$tel = $mysqli->real_escape_string($_POST['tel']);
		$plecare = $mysqli->real_escape_string($_POST['plecare']);
		$data = $mysqli->real_escape_string($_POST['data']);
		$ora = $mysqli->real_escape_string($_POST['ora']);
		$dest = $mysqli->real_escape_string($_POST['dest']);
		$pret = $mysqli->real_escape_string($_POST['pret']);
		
		$sql = "INSERT INTO clienti (nume, tel, plecare, data, ora, dest, pret) VALUES ('$name', '$tel', '$plecare', '$data', '$ora', '$dest', '$pret' )";
		$insert = $mysqli->query($sql);
		
		if($insert){
			$succes =  '<p class="succes-client text-primary">Ai adaugat cu succes un client!</p>';
		}else{
			die("Error: {$mysqli->errno} : {$mysqli->error}");
		}
}

/* $days = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
$months = array("Ian","Feb","Mar","Apr","Mai","Iun","Iul","Aug","Sep","Oct","Noi","Dec");
$hours = array(1,2,3,4,5,6,7,8,9,10,11,12);
$minuts = array('00','05','10','15','20','25','30','35','40','45','50','55'); */
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Editeaza clienti</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" ></script>
<link href="style.css" rel="stylesheet" >
</head>

<body>
<div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills float-xs-right">
            <li class="nav-item">
              <a class="nav-link " href="page-client.php">Clienti<span class="sr-only">(current)</span></a>
            </li>
			 <li class="nav-item">
              <a class="nav-link" href="arhiva-client.php">Arhiva</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="add-client.php">Adauga</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/clienti">Logout</a>
            </li>
          </ul>
        </nav>
        <h2 class="text-primary">Clients Bucket</h2>
      </div>

      <div class="jumbotron">
   
      </div>

      <div class="row marketing">
        <div class="col-lg-7">
          <h4>Adauga Clienti</h4>
			<form action="" method="post" class="">	
				<p><label>Numele</label><input type="text" name="nume" class="form-control" placeholder="Nume client" required autofocus></p>
				<p><label>Telefon</label><input type="text" name="tel" class="form-control" placeholder="Numar telefon" required> </p>
				<p><label>Plecare</label><input type="text" name="plecare" class="form-control" placeholder="ex Bucuresti" required></p>
				<p><label>Destinatia</label><input type="text" name="dest" class="form-control" placeholder="ex Londra" required></p>
				<div class="box-data row">
					<div class="col-md-7">
						<p><label>Data</label><input type="text" name="data" class="form-control" placeholder="ex 01 Jan 2016" required></p>
					</div>
					<div class="col-md-5">
						<p><label>Ora</label><input type="text" name="ora" class="form-control" placeholder="ex 11:30 AM" required></p>
					</div>
				</div>
								
				<div class="row">
					<div class="col-md-4"><p><label>Pret</label><input type="text" name="pret" class="form-control" placeholder="ex 90 E" required> </p></div>
				</div>
				<div class="row">
					<p class="col-md-3"><input type="submit" name="submit" value="Adauga" class="btn btn-primary"></p>
				</div>
			</form>
			<div class="box-succes">
				<?php if(isset($succes)){ echo $succes;} ?>
			</div>
        </div>

      </div>
	 
<div class="bar-title"></div>
      <footer class="footer">
        <p>&copy; Company Novatur 2016</p>
      </footer>

</div> <!-- /container -->
</body>
</html>