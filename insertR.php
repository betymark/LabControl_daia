<?php
	include_once 'conexionR.php';

	if(isset($_POST['guardar'])){
		$matricula=$_POST['matricula'];
		$email=$_POST['email'];
		$material=$_POST['material'];
		$estado=$_POST['estado'];
		$marca=$_POST['marca'];
		$codigo=$_POST['codigo'];
		$cantidad=$_POST['cantidad'];
		$presdes=$_POST['presdes'];

if(!empty($matricula) && !empty($email) && !empty($material) && !empty($estado) && !empty($marca)&& !empty($codigo)&& !empty($cantidad)&& !empty($presdes) ){

			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_insertR=$con->prepare('insert INTO inventario2(matricula,email,material,estado,marca,codigo,cantidad,presdes) VALUES(:matricula,:email,:material,:estado,:marca,:codigo,:cantidad,:presdes)');
				$consulta_insertR->execute(array(

					':matricula' =>$matricula,
					':email' =>$email,
					':material' =>$material,
					':estado' =>$estado,
					':marca' =>$marca,
					':codigo' =>$codigo,
					':cantidad' =>$cantidad,
					':presdes' =>$presdes

				));
				header('Location: inventarioR.php');
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
	<title> Nuevo Prestamo de Reactivo/Material</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>Nuevo de prestamo  Reactivo/Material</h2>
		<form action="" method="post">
			<div class="form-group">


				<input type="text" name="matricula" placeholder="matricula" class="input__text">
				<input type="text" name="email" placeholder="email" class="input__text">
				<input type="text" name="material" placeholder="material" class="input__text">
				<input type="text" name="estado" placeholder="estado" class="input__text">
			</div>
			<div class="form-group">

				<input type="text" name="marca" placeholder="marca" class="input__text">
				<input type="text" name="codigo" placeholder="codigo" class="input__text">
				<input type="text" name="cantidad" placeholder="cantidad" class="input__text">
				<input type="text" name="presdev" placeholder="presdev" class="input__text">
			</div>

			<div class="btn__group">
				<a href="inventarioR.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
