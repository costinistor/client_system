<?php
include ('database.php');
session_start();

$id = $_GET['id'];

 $query = "SELECT * FROM clienti WHERE clienti.id = $id";		
	$result = $mysqli->query($query) or die(); 

if($result)	{
	while($row = $result->fetch_assoc()){
		$take_name = $row['nume'];
		$take_tel = $row['tel'];
		$take_plecare = $row['plecare'];
		$take_dest = $row['dest'];
		$take_data = $row['data'];
		$take_ora = $row['ora'];
		$take_pret = $row['pret'];
	}
}

$user = $_SESSION['user'];
if($user != "Costi"){
	header ('Location: http://localhost/clienti');
}

if(isset($_POST['submit'])){
	$id = $_GET['id'];
	
		$name = $mysqli->real_escape_string($_POST['nume']);
		$tel = $mysqli->real_escape_string($_POST['tel']);
		$plecare = $mysqli->real_escape_string($_POST['plecare']);
		$data = $mysqli->real_escape_string($_POST['data']);
		$ora = $mysqli->real_escape_string($_POST['ora']);
		$dest = $mysqli->real_escape_string($_POST['dest']);
		$pret = $mysqli->real_escape_string($_POST['pret']);
		
		$up_query = "UPDATE clienti SET nume = '$name', tel = '$tel', plecare = '$plecare', data = '$data', ora = '$ora', dest = '$dest', pret = '$pret' WHERE clienti.id = $id";
		$insert = $mysqli->query($up_query);
		
		if($insert){
			$succes =  '<p class="succes-client text-primary">Client update cu succes!</p>';
			header ('Location: http://localhost/clienti/page-client.php');
		}else{
			die("Error: {$mysqli->errno} : {$mysqli->error}");
		}
}

if(isset($_POST['delete'])){
	$id = $_GET['id'];
	$del_query = "DELETE FROM clienti WHERE clienti.id = $id";
	$delete = $mysqli->query($del_query);
	
	if($delete){
			$succes =  '<p class="succes-client text-primary">Client deleted cu succes!</p>';
			header ('Location: http://localhost/clienti/page-client.php');
		}else{
			die("Error: {$mysqli->errno} : {$mysqli->error}");
		}
}

if(isset($_POST['arhiva'])){
	
		$name = $mysqli->real_escape_string($_POST['nume']);
		$tel = $mysqli->real_escape_string($_POST['tel']);
		$plecare = $mysqli->real_escape_string($_POST['plecare']);
		$data = $mysqli->real_escape_string($_POST['data']);
		$ora = $mysqli->real_escape_string($_POST['ora']);
		$dest = $mysqli->real_escape_string($_POST['dest']);
		$pret = $mysqli->real_escape_string($_POST['pret']);
		
		$sql = "INSERT INTO arhiva_clienti (nume, tel, plecare, data, ora, dest, pret) VALUES ('$name', '$tel', '$plecare', '$data', '$ora', '$dest', '$pret' )";
		$insert = $mysqli->query($sql);
		
		if($insert){
			$succes =  '<p class="succes-client text-primary">Client adaugat in arhiva cu succes!</p>';
		}else{
			die("Error: {$mysqli->errno} : {$mysqli->error}");
		}
}

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
          <h4>Editeaza date client</h4>
			<form action="" method="post" class="">	
				<p><label>Numele</label><input type="text" name="nume" value="<?php echo $take_name; ?>" class="form-control" placeholder="Nume client" required autofocus></p>
				<p><label>Telefon</label><input type="text" name="tel" value="<?php echo $take_tel; ?>" class="form-control" placeholder="Numar telefon" required> </p>
				<p><label>Plecare</label><input type="text" name="plecare" value="<?php echo $take_plecare; ?>" class="form-control" placeholder="ex Bucuresti" required></p>
				<p><label>Destinatia</label><input type="text" name="dest" value="<?php echo $take_dest; ?>" class="form-control" placeholder="ex Londra" required></p>
				<div class="box-data row">
					<div class="col-md-7">
						<p><label>Data</label><input type="text" name="data" value="<?php echo $take_data; ?>" class="form-control" placeholder="ex 01 Jan 2016" required></p>
					</div>
					<div class="col-md-5">
						<p><label>Ora</label><input type="text" name="ora" value="<?php echo $take_ora; ?>" class="form-control" placeholder="ex 11:30 AM" required></p>
					</div>
				</div>
								
				<div class="row">
					<div class="col-md-4"><p><label>Pret</label><input type="text" name="pret" value="<?php echo $take_pret; ?>" class="form-control" placeholder="ex 90 E" required> </p></div>
				</div>
				<div class="row">
					<p class="col-md-2"><input type="submit" name="submit" value="Update" class="btn btn-primary"></p>
					<p class="col-md-2"><input type="submit" name="arhiva" value="Arhiva" class="btn btn-info"></p>
					<p class="col-md-2"><input type="submit" name="delete" value="Delete" class="btn btn-danger"></p>
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