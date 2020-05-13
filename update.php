<?php
	include_once 'conexion.php';

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$con->prepare('SELECT * FROM persona WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: index.php');
	}


	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$apellidoP=$_POST['apellidoP'];
		$apellidoM=$_POST['apellidoM'];
		$email=$_POST['email'];
		$ocupacion=$_POST['ocupacion'];
  	$id=(int) $_GET['id'];

		if(!empty($nombre) && !empty($apellidoP) && !empty($apellidoM) && !empty($email) && !empty($ocupacion) ){
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_update=$con->prepare(' UPDATE persona SET
					nombre=:nombre,
					apellidoP=:apellidoP,
					apellidoM=:apellidoM,
					email=:email,
					ocupacion=:ocupacion
          WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':nombre' =>$nombre,
					':apellidoP' =>$apellidoP,
					':apellidoM' =>$apellidoM,
					':email' =>$email,
					':ocupacion' =>$ocupacion,
					':id' =>$id
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
	<title>Editar usuario</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>Editar Usuario del sistema  Web</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input__text">
				<input type="text" name="apellidoP" value="<?php if($resultado) echo $resultado['apellidoP']; ?>" class="input__text">
				<input type="text" name="apellidoM" value="<?php if($resultado) echo $resultado['apellidoM']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="email" value="<?php if($resultado) echo $resultado['email']; ?>" class="input__text">
				<input type="text" name="ocupacion" value="<?php if($resultado) echo $resultado['ocupacion']; ?>" class="input__text">
			</div>
		<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
