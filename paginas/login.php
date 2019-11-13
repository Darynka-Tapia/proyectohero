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
				<a class="navbar-brand" href="../index.php">SocialHero</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav">
						<li class="nav-item ">
							<a class="nav-link " href="registro.php">Registrar <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="login.php">Login</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>

		<div class="container-fluid contenido">
		<div class="container contenido">
			<div class="row">
				<div class="col-12 mt-2 mb-2">
					<center><h2>	Inicio de sesión		</h2></center>
				</div>
			</div>
			<div class="row justify-content-md-center">
				<div class="col-6">	
						<div class="form-group">
							<label for="email">Usuario/Email</label>
							<input type="text" class="form-control" id="email" placeholder="Usuario o correo electronico">
						</div>
						<div class="form-group">
							<label for="contra">Contraseña</label>
							<input type="password" class="form-control" id="contra" placeholder="Contraseña">
						</div>
						<div id="resultado" class="mt-2 mb-2"></div>
						<button type="submit" class="btn btn-primary  btn-block" onclick="loginBD()">Iniciar sesión</button>


				</div>
			</div>
		</div>
	</div>

		<script>
	function loginBD(){
		var email=document.getElementById('email').value;
		var contra=document.getElementById('contra').value;
		var parametros = {
	            "email":email, 
	            "contra": contra, 
	            "pagina": "login"

	        };

	        console.dir(parametros);

	        $.ajax({
	            data:  parametros, //datos que se envian a traves de ajax
	            url:   '../php/consultas.php', //archivo que recibe la peticion
	            type:  'post', //método de envio
	            beforeSend: function () {
	                $("#resultado").html("Procesando, espere por favor...");
	            },
	            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
	                $("#resultado").html(response);
	            }
	        });

		// console.log(iddonador+'--'+idbeneficiario+'--'+donacion);
	}
	</script>





	<script src="../js/jquery-3.4.1.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>