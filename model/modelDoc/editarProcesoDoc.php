<?php 
	//print_r($_POST);
	if (!isset($_POST['oculto'])) {
		header('Location: ../crudDNI.php');
	}

    include '../../controller/conexion.php';
    //$objeto= new Conexion();
    //$conexion= $objeto->abrirConexion();

	$id = $_POST['id2'];
	$numero = $_POST['txtNumero'];
	
   //echo "datos " . $id2 . " " .$nombre. " ". $apellido . " " . $edad . ".";
	$sentencia = $conexion->prepare("UPDATE identificacion SET numero = ?
                                         WHERE id = ?;");
                                        
	$resultado = $sentencia->execute([$numero,$id]);

	if ($resultado === TRUE) {
		header('Location: ../crudDNI.php');
	}else{
		echo "Error" ;
	}
?>