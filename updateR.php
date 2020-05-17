<?php
	include_once 'conexionR.php';

	if(isset($_GET['idproducto'])){
		$idproducto=(int) $_GET['idproducto'];

		$buscar_idproducto=$con->prepare('SELECT * FROM inventario2 WHERE idproducto=:idproducto LIMIT 1');
		$buscar_idproducto->execute(array(
			':idproducto'=>$idproducto
		));
		$resultado=$buscar_idproducto->fetch();
	}else{
		header('Location: inventarioR.php');
	}

	if(isset($_POST['guardar'])){
    $matricula=$_POST['matricula'];
		$email=$_POST['email'];
		$material=$_POST['material'];
		$estado=$_POST['estado'];
		$marca=$_POST['marca'];
		$codigo=$_POST['codigo'];
		$cantidad=$_POST['cantidad'];
		$presdes=$_POST['presdes'];
  	$idproducto=(int) $_GET['idproducto'];

		if(!empty($matricula) && !empty($email) && !empty($material) && !empty($estado) && !empty($marca) && !empty($codigo) && !empty($cantidad) && !empty($presdes) ){
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
					$consulta_updateR=$con->prepare(' UPDATE inventario2 SET

					matricula=:matricula,
					email=:email,
					material=:material,
					estado=:estado,
					marca=:marca,
					codigo=:codigo,
					cantidad=:cantidad,
					presdes=:presdes
          WHERE idproducto=:idproducto;'
				);
				$consulta_updateR->execute(array(

					':matricula' =>$matricula,
					':email' =>$email,
					':material' =>$material,
				  ':estado' =>$estado,
					':marca' =>$marca,
					':codigo' =>$codigo,
					':cantidad' =>$cantidad,
					':presdes' =>$presdes,
					':idproducto' =>$idproducto
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
	<title>Editar inventario de Material/Reactivo</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>Editar Inventario de Material/Reactivo  </h2>
		<form action="" method="post">
			<div class="form-group">

				<input type="text" name="matricula" value="<?php if($resultado) echo $resultado['matricula']; ?>" class="input__text">
				<input type="text" name="email" value="<?php if($resultado) echo $resultado['email']; ?>" class="input__text">
				<input type="text" name="material" value="<?php if($resultado) echo $resultado['material']; ?>" class="input__text">
				<input type="text" name="estado" value="<?php if($resultado) echo $resultado['estado']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="marca" value="<?php if($resultado) echo $resultado['marca']; ?>" class="input__text">
				<input type="text" name="codigo" value="<?php if($resultado) echo $resultado['codigo']; ?>" class="input__text">
				<input type="text" name="cantidad" value="<?php if($resultado) echo $resultado['cantidad']; ?>" class="input__text">
				<input type="text" name="presdes" value="<?php if($resultado) echo $resultado['presdes']; ?>" class="input__text">
			</div>
		<div class="btn__group">
				<a href="inventarioR.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
