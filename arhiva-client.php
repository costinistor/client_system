<?php
include ('database.php');
session_start();



$user = $_SESSION['user'];
if($user != "Costi"){
	header ('Location: http://localhost/clienti');
}

if(isset($_POST['sub_search'])){
	$search = $mysqli->real_escape_string($_POST['search']);	
	$query_s = "SELECT * FROM arhiva_clienti WHERE CONCAT(nume,tel,plecare,dest,data,ora) LIKE '%".$search."%'";
	$result = $mysqli->query($query_s) or die();
}else{
	$query = "SELECT * FROM arhiva_clienti";		
	$result = $mysqli->query($query) or die();
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
              <a class="nav-link " href="page-client.php">Clienti<span class="sr-only">(current)</span></a>
            </li>
			 <li class="nav-item">
              <a class="nav-link active" href="arhiva-client.php">Arhiva</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="add-client.php">Adauga</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/clienti">Logout</a>
            </li>
          </ul>
        </nav>
        <h2 class="text-primary"><b>Clients Bucket</b></h2>
      </div>

     <!-- <div class="jumbotron">
   
      </div>-->
	  <div class="jumb">
		<h4 class="title-list">Lista Clienti</h4>
	  </div>
	  <div class="row search-section">
	  		<div class="col-md-4">
				<a href="page-client.php" class="btn btn-warning btn-sm show-btn">Show All</a>
			</div>
			<!-- search -->
			<div class="search-box col-md-8">		
				<form class="search pull-right" method="post" action="page-client.php">
					<input class="search-input" type="text" name="search" placeholder="Cauta.">
					<input class="search-submit" name="sub_search" type="submit" value="Search" >
				</form>		
			</div>	
			<!-- /search -->

		</div>
      <div class="row marketing">
        <div class="col-lg-12">
          
			<table class="table table-striped">
				<tr>
					<th>Nr</th>
					<th>Nume Client</th>
					<th>Telefon</th>
					<th>Plecare</th>
					<th>Destinatie</th>
					<th>Data</th>
					<th>Ora</th>
					<th>Pret</th>
					<th></th>
				</tr>
			<?php
				for($i = 0; $i < $result->num_rows; $i++){
					$row = $result->fetch_array();
						echo "<tr>";
						echo	"<td>".($i + 1)."</td>";
						echo	"<td>".$row['nume']."</td>";
						echo	"<td>".$row['tel']."</td>";
						echo	"<td>".$row['plecare']."</td>";
						echo	"<td>".$row['dest']."</td>";
						echo	"<td>".$row['data']."</td>";
						echo	"<td>".$row['ora']."</td>";
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