<?php

	include_once 'conexionR.php';
	if(isset($_GET['id_material'])){
		$id_material=(int) $_GET['id_material'];
		$deleteMat=$con->prepare('DELETE FROM inventario_material WHERE id_material=:id_material');
		$deleteMat->execute(array(
			':id_material'=>$id_material
		));
		header('Location: inventarioMat.php');
	}else{
		header('Location: inventarioMat.php');
	}
 ?>