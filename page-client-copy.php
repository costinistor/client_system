<?php
include ('database.php');
session_start();

$query = "SELECT * FROM clienti";		
	$result = $mysqli->query($query) or die();

$user = $_SESSION['user'];
if($user != "Costi"){
	header ('Location: http://localhost/clienti');
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Panou lista clienti</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" ></script>
<link href="style.css" rel="stylesheet" >

</head>

<body>
<div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills float-xs-right">
            <li class="nav-item">
              <a class="nav-link active" href="page-client.php">Clienti<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="add-client.php">Adauga</a>
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
		<!-- search -->
		<div class="search-box" title="Cauta in site transport persoane">		
			<form class="search" method="get" action="search-client.php" role="search">
				<input class="search-input" type="search" name="search" placeholder="Cauta.">
				<input class="search-submit " type="submit" name="sub_search" value="Search" >
			</form>		
		</div>	
		<!-- /search -->
      <div class="row marketing">
        <div class="col-lg-12">
          <h4>Lista Clienti</h4>
			<table class="table table-striped">
				<tr>
					<th>Nr</th>
					<th>Nume Client</th>
					<th>Telefon</th>
					<th>Plecare Oras</th>
					<th>Data si Ora</th>
					<th>Destinatie Oras</th>
					<th>Pret</th>
					<th></th>
				</tr>
			<?php
				for($i = 0; $i < $result->num_rows; $i++){
					$row = $result->fetch_assoc();
					echo "<tr>";
					echo	"<td>".($i + 1)."</td>";
					echo	"<td>".$row['nume']."</td>";
					echo	"<td>".$row['tel']."</td>";
					echo	"<td>".$row['plecare']."</td>";
					echo	"<td>".$row['ora']."</td>";
					echo	"<td>".$row['dest']."</td>";
					echo	"<td>".$row['pret']."</td>";
					echo	'<td> <a href="edit-customs.php?id='.$row['id'].'" class="btn btn-default">Edit</a> </td>';					
					echo "</tr>";
				}
			?>

			</table>
        </div>

      </div>
<div class="bar-title"></div>
      <footer class="footer">
        <p>&copy; Company Novatur 2016</p>
      </footer>

</div> <!-- /container -->
</body>
</html>