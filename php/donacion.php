<?php
	function donadores(){
		include 'conexion.php';
		$sql="select * from donador";

		$resultado=$base->prepare($sql);
		$resultado->execute();
		echo '<div class="form-group">
							<select class="custom-select" required id="donador">
								<option value="0">Selecciona un donador</option>';
		while ($row=$resultado->fetch(PDO::FETCH_ASSOC)) {
			echo '
				
				<option value="'.$row['donador_id'].'">'.$row['nombre'].'</option>
							
			';
		}
		echo '</select>
				<div class="invalid-feedback">Selecciona un donador</div>
			</div>';
	}

	function beneficiario(){
		include 'conexion.php';
		$sql="select * from beneficiarios";

		$resultado=$base->prepare($sql);
		$resultado->execute();
		echo '<div class="form-group">
							<select class="custom-select" required id="beneficiario">
								<option value="0">Selecciona un beneficiario</option>';
		while ($row=$resultado->fetch(PDO::FETCH_ASSOC)) {
			echo '
				
				<option value="'.$row['beneficiarios_id'].'">'.$row['nombre'].'</option>
							
			';
		}
		echo '</select>
				<div class="invalid-feedback">Selecciona un donador</div>
			</div>';
	}
?>