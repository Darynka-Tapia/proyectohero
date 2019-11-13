<?php
session_start();
include '../php/conexion.php';


	if($_SESSION["usuario"]==''){
		echo '<script>window.location="login.php"</script>';
	}else{
		
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Social Hero</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
	<div class="container-fluid navMenu">
		<div class="container navMenu">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="">SocialHero</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav">
						<li class="nav-item ">
							<a class="nav-link active" href="cerrar.php">Cerrar sesion <span class="sr-only">(current)</span></a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
<?php
	$sql='select * from beneficiarios where email="'.$_SESSION['usuario'].'"';
			$usuario=$base->prepare($sql);
			$usuario->execute();
				while ($row=$usuario->fetch(PDO::FETCH_ASSOC)) {
				$nombre=$row['nombre'];
				$id=$row['beneficiarios_id'];
				}

	$sql2="select  SUM(donacion) suma from donaciones where beneficiario_id=".$id;
	$beneficiario=$base->prepare($sql2);
	$beneficiario->execute();
	while ($row=$beneficiario->fetch(PDO::FETCH_ASSOC)) {
		$suma=$row['suma'];
	}

?>
		<div class="container-fluid contenido">
		<div class="container contenido">
			<div class="row">
				<div class="col-12 mt-2 mb-2">
					<center><h2>Hola  <?=$nombre?></h2></center>
					<center><h4 class="mb-5">Has conseguido <b>$<?=$suma?></b> para tu proyecto</h4></center>
					<center><h5>Tu tabla de beneficios en el siguiente</h5></center>

				</div>
			</div>
			<div class="row justify-content-md-center">
				<div class="col-md-6 col-sm-12">	
					<table class="table">
						<thead class="thead-dark">
							<tr>
								<th scope="col">#</th>
								<th scope="col">Donador</th>
								<th scope="col">Cantidad</th>
								<th scope="col">Fecha</th>
							</tr>
						</thead>
						<tbody>

							<?php
							$sql2="select * from donaciones dd inner JOIN donador d ON dd.donador_id=d.donador_id where beneficiario_id=".$id;
							$beneficiario=$base->prepare($sql2);
							$beneficiario->execute();
							$contador=1;
							while ($row=$beneficiario->fetch(PDO::FETCH_ASSOC)) {
								echo '
								<tr>
								<th scope="row">'.$contador++.'</th>
								<td>'.$row['nombre'].'</td>
								<td>'.$row['donacion'].'</td>
								<td>'.$row['fecha'].'</td>
								</tr>
								';
								
							}
							?>
							
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>





	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>