<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM persona ORDER BY id DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM persona WHERE id LIKE :campo OR nombre LIKE :campo;'
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
	<title>Registro del usuario</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<!--Navegacion-->
	<div class="contenedor">
		<div class="container">
        <div class= "panel panel-default">
            <div class="panel-heading text-center">
            <header class="bg-primary text-white">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">LabQuimica</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="http://localhost/proy_01/index.php">Usuarios</a>
          </li>
          <li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="http://localhost/proy_01/inventarioR.php">Reactivos</a>
          </li>
          <li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="http://localhost/proy_01/inventarioMat.php">Materiales</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  </br>
		<h2>SISTEMA WEB DE RESGISTRO DE USUARIO AL LAB</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar id o nombre"
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>Id</td>
				<td>Nombre</td>
				<td>Apellido Paterno</td>
				<td>Apellido Materno</td>
				<td>Email Institucional</td>
				<td>Ocupacion</td>
      	<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['id']; ?></td>
					<td><?php echo $fila['nombre']; ?></td>
					<td><?php echo $fila['apellidoP']; ?></td>
					<td><?php echo $fila['apellidoM']; ?></td>
					<td><?php echo $fila['email']; ?></td>
					<td><?php echo $fila['ocupacion']; ?></td>

					<td><a href="update.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
</body>
</html>
