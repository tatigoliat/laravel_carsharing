<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="whidth=device-whidth, user-scalable=no, initial-scale=1.0, minimun-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
	<title>Listado de Usuarios - Carsharing</title>
</head>
<body>
	<h1>Usuarios</h1>

	<ul>
		<?php foreach ($users as $user): ?>
			<li><?php echo $user ?></li>
		<?php endforeach ?>		
	</ul>

</body>
</html>