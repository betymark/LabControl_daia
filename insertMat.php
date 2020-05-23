<?php
	include_once 'conexionR.php';

	if(isset($_POST['guardar'])){
		$id_material=$_POST['id_material'];
		$Nombre_material=$_POST['Nombre_material'];
		$cantidad=$_POST['cantidad'];
		$Matricula_Alumno=$_POST['Matricula_Alumno'];
		$Tramite=$_POST['Tramite'];
		$Estado=$_POST['Estado'];
	

if(!empty($id_material) && !empty($Nombre_material) && !empty($cantidad) && !empty($Matricula_Alumno) && !empty($Tramite)&& !empty($Estado)){

			if(!filter_var($id_material,FILTER_VALIDATE_id_material)){
				echo "<script> alert('Id no válido');</script>";
			}else{
				$consulta_insertMat=$con->prepare('insert INTO inventario_material(id_material,Nombre_material,cantidad,Matricula_Alumno,Tramite,Estado) VALUES(:id_material,Nombre_material,cantidad,Matricula_Alumno,Tramite,Estado)');
				$consulta_insertMat->execute(array(

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
	<title> Nuevo Tramite de Material</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>Nuevo Tramite de Material</h2>
		<form action="" method="post">
			<div class="form-group">


				 <label for="id_material">ID</label>
				<input type="text" name="id_material" value="<?php if($resultado) echo $resultado['id_material']; ?>" class="input__text">
				
                <label for="Nombre_material">Nombre del material</label>
                <input type="text" name="Nombre_material" value="<?php if($resultado) echo $resultado['Nombre_material']; ?>" class="input__text">
				
                <label for="cantidad">Cantidad</label>
                <input type="text" name="cantidad" value="<?php if($resultado) echo $resultado['cantidad']; ?>" class="input__text">
				
                <label for="Matricula_Alumno">Matrícula del Alumno</label>
                <input type="text" name="Matricula_Alumno" value="<?php if($resultado) echo $resultado['Matricula_Alumno']; ?>" class="input__text">
			</div>
			<div class="form-group">
                <label for="Tramite">Tramite</label>
				<input type="text" name="Tramite" value="<?php if($resultado) echo $resultado['Tramite']; ?>" class="input__text">
				
                <label for="Estado">Estado</label>
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
