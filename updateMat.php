<?php
	include_once 'conexionR.php';

	if(isset($_GET['id_material'])){
		$id_material=(int) $_GET['id_material'];

		$buscar_id_material=$con->prepare('SELECT * FROM inventario_material WHERE id_material=:id_material LIMIT 1');
		$buscar_id_material->execute(array(
			':id_material'=>$id_material
		));
		$resultado=$buscar_id_material->fetch();
	}else{
		header('Location: inventarioMat.php');
	}

	if(isset($_POST['guardar'])){
		$id_material=$_POST['id_material'];
		$Nombre_material=$_POST['Nombre_material'];
		$cantidad=$_POST['cantidad'];
		$Matricula_Alumno=$_POST['Matricula_Alumno'];
		$Tramite=$_POST['Tramite'];
		$Estado=$_POST['Estado'];
  	$id_material=(int) $_GET['id_material'];

		if(!empty($id_material) && !empty($Nombre_material) && !empty($cantidad) && !empty($Matricula_Alumno) && !empty($Tramite)&& !empty($Estado)){

			if(!filter_var($id_material,FILTER_VALIDATE_ID)){
				echo "<script> alert('Id no valido');</script>";
			}else{
					$consulta_updateMat=$con->prepare(' UPDATE inventarioMat SET

					id_material=:id_material,
					Nombre_material=:Nombre_material,
					cantidad=:cantidad,
					Matricula_Alumno=:Matricula_Alumno,
					Tramite=:Tramite,
                    estado=:estado
                    
          WHERE id_material=:id_material;'
				);
				$consulta_updateMat->execute(array(

				':id_material' =>$id_material,
					':Nombre_material' =>$Nombre_material,
					':cantidad' =>$cantidad,
					':Matricula_Alumno' =>$Matricula_Alumno,
					':Tramite' =>$Tramite,
					':Estado' =>$Estado
				));
				header('Location: inventarioMat.php');
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
	<title>Editar inventario de Material</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>Editar Inventario de Material</h2>
		<form action="" method="post">
			<div class="form-group">
               
				<input type="text" name="id_material" value="<?php if($resultado) echo $resultado['id_material']; ?>" class="input__text">
			 <input type="text" name="Nombre_material" value="<?php if($resultado) echo $resultado['Nombre_material']; ?>" class="input__text">
				<input type="text" name="cantidad" value="<?php if($resultado) echo $resultado['cantidad']; ?>" class="input__text">
				<input type="text" name="Matricula_Alumno" value="<?php if($resultado) echo $resultado['Matricula_Alumno']; ?>" class="input__text">
			</div>
			<div class="form-group">
            
				<input type="text" name="Tramite" value="<?php if($resultado) echo $resultado['Tramite']; ?>" class="input__text">
                <input type="text" name="Estado" value="<?php if($resultado) echo $resultado['Estado']; ?>" class="input__text">
				
			</div>
		<div class="btn__group">
				<a href="inventarioMat.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
