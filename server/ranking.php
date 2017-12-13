<?php

$db = new Mysqli('localhost', 'root', 'root', 'spaceshiprunner');

$result = $db->query("SELECT * FROM ranking ORDER BY score DESC, name ASC, `datetime` DESC");

$db->close();

$return = [];

while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
	$return[] = $row;
}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<title>Ranking Spaceship Runner</title>
</head>
<body>
	<div class="jumbotron text-center">
		<h2>Ranking Spaceship Runner</h2>
	</div>
	<div class="container">
	  	<div class="row">
	    	<div class="col-sm-12">
				<table class="table table-striped">
					<tr>
						<th>Posición</th>
						<th>Nombre</th>
						<th>Puntuación</th>
						<th>Fecha</th>
					</tr>
					<?php foreach($return as $k => $row) { ?>
					<tr>
						<td><?php echo $k + 1; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['score']; ?></td>
						<td><?php echo date( 'd-m-Y H:i:s', strtotime($row['datetime'])) ?></td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
