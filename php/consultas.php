<?php
include 'conexion.php';
$pagina=$_POST['pagina'];

	switch ($pagina) {
    case 'index':
    	$date=date('Y-m-d');
        $iddonador=$_POST['iddonador'];
        $idbeneficiario=$_POST['idbeneficiario'];
        $donacion=$_POST['donacion'];
        if($donacion=='' || $idbeneficiario=='0' || $iddonador=='0' ){
        	echo 'No puedes dejar campos vacios';
        }else{
        	$sql='INSERT INTO donaciones (donaciones_id, beneficiario_id, donador_id, donacion, fecha) VALUES (null,'.$idbeneficiario.','.$iddonador.','.$donacion.',"'.$date.'")';
        	$base->prepare($sql)->execute();
        	echo 'Se realizo la donacion';
        }
        
        break;
    case 'registro':

    	$nombre=$_POST['nombre'];
		$email=$_POST['email'];
		$contra=$_POST['contra'];
		$contra2=$_POST['contra2'];
		if($nombre=='' || $email=='' || $contra=='' || $contra2==''){
			echo 'No puedes dejar campos vacios';
		}else{
			if($contra==$contra2){
				$sql='insert into beneficiarios values(null, "'.$nombre.'", "'.$email.'", "'.$contra.'")';
				echo $sql;
				$base->prepare($sql)->execute();
				echo 'Se realizo el registro, <a href="login.php">inicia sesion</a> para continuar ';
			}else{
				echo 'La contraseña no son iguales';
			}
		}
        break;
    case 'login':
        $email=$_POST['email'];
		$contra=$_POST['contra'];
		if($email=='' || $contra==''){
			echo 'No puedes dejar campos vacios';
		}else{
			$sql='select * from beneficiarios where email="'.$email.'" and password="'.$contra.'"';
			
			$usuario=$base->prepare($sql);
			$usuario->execute();
			$cuenta = $usuario->rowCount();

			if($cuenta){
				// echo 'datos correctos, guardo sesion y redirijo';
				session_start();
				while ($row=$usuario->fetch(PDO::FETCH_ASSOC)) {
				$username=$row['email'];
				}

				$_SESSION["usuario"]=$username;
				// echo $_SESSION["usuario"];
				echo '<script>window.location="panel.php"</script>';
				// header('Location: login.php');



			}else{
				echo 'correo o contraseña incorrectos';
			}
			// $cont=false;
			// while ($row=$usuario->fetch(PDO::FETCH_ASSOC)) {
			// 	$cont=true;
			// }
			// if($cuenta==0){
			// 	echo 
			// }else{
			// 	echo 'correo o contraseña incorrectos';
			// }


		}
        break;

    case 'panel':
        echo "panel";
        break;
}
?>