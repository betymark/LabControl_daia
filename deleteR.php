<?php

	include_once 'conexionR.php';
	if(isset($_GET['idproducto'])){
		$idproducto=(int) $_GET['idproducto'];
		$deleteR=$con->prepare('DELETE FROM inventario2 WHERE idproducto=:idproducto');
		$deleteR->execute(array(
			':idproducto'=>$idproducto
		));
		header('Location: inventarioR.php');
	}else{
		header('Location: inventarioR.php');
	}
 ?>
