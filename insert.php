<?php
	include_once 'conexion.php';

	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$apellidoP=$_POST['apellidoP'];
		$apellidoM=$_POST['apellidoM'];
		$email=$_POST['email'];
		$ocupacion=$_POST['ocupacion'];


		if(!empty($nombre) && !empty(	$apellidoP)&& !empty(	$apellidoM) && !empty($email) && !empty($ocupacion) ){
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_insert=$con->prepare('INSERT INTO persona(nombre,apellidoP,apellidoM,email,ocupacion) VALUES(:nombre,:apellidoP,:apellidoM,:email,:ocupacion)');
				$consulta_insert->execute(array(
					':nombre' =>$nombre,
					':apellidoP' =>$apellidoP,
					':apellidoM' =>$apellidoM,
					':email' =>$email,
					':ocupacion' =>$ocupacion

				));
				header('Location: index.php');
			}
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo usuario</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2> sistema de registro</h2>
		<form action="" method="post">
			<div class="form-group">

				<input type="text" name="nombre" placeholder="Nombre" class="input__text">
				<input type="text" name="apellidoP" placeholder="apellido Paterno" class="input__text">
					<input type="text" name="apellidoM" placeholder="apellido Materno" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="email" placeholder="Correo electrónico" class="input__text">
				<input type="text" name="ocupacion" placeholder="ocupacion" class="input__text">
			</div>

			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
