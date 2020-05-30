<?php
	include_once 'conexionR.php';

	$sentencia_select=$con->prepare('SELECT *FROM inventario_material ORDER BY id_material DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM inventario_material WHERE Matricula_Alumno LIKE :campo OR id_material LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css"></li>
    <script src="https://kit.fontawesome.com/7022004208.js" crossorigin="anonymous"></script>
	<title>Control de inventario Prestamos de Material </title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<div class="container">
				<div class= "panel panel-default">
						<div class="panel-heading text-center">
						<header class="bg-primary text-white">
						<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
		<div class="container">
			<a class="navbar-brand js-scroll-trigger" href="#page-top">LabControl</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="btn btn-dark" href="http://localhost/proy_01/index.php" role="button">Usuarios</a>
					</li>
					<li class="nav-item">
						<a class="btn btn-dark" href="http://localhost/proy_01/inventarioR.php" role="button">Reactivos</a>
					</li>
					<li class="nav-item">
						<a class="btn btn-dark" href="http://localhost/proy_01/inventarioMat.php">Materiales</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	</br>
		<h2> SISTEMA DE INVENTARIO  DE MATERIAL</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar matrícula o material"
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insertMat.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>Id Material</td>
                <td>Nombre del Material</td>
                <td>Cantidad</td>
				<td>Matrícula del Alumno</td>
				<td>Trámite</td>
				<td>Estado</td>
      <td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['id_material']; ?></td>
				  <td><?php echo $fila['Nombre_material']; ?></td>
				  <td><?php echo $fila ['cantidad']; ?></td>
					<td><?php echo $fila['Matricula_Alumno']; ?></td>
					<td><?php echo $fila['Tramite']; ?></td>
					<td><?php echo $fila['Estado']; ?></td>



					<td><a href="updateMat.php?id_material=<?php echo $fila['id_material']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="deleteMat.php?id_material=<?php echo $fila['id_material']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>
