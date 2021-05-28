<?php  
	if (!isset($_GET['id'])) {
		exit();
	}

	
    
    include '../controller/conexion.php';
    //$objeto= new Conexion();
   // $conexion= $objeto->abrirConexion();
   $codigo = $_GET['id'];

	$sentencia = $conexion->prepare("DELETE FROM persona WHERE id = ?;");
	$resultado = $sentencia->execute([$codigo]);

	if ($resultado === TRUE) {
		header('Location: ../index.php');
	}else{
		echo "Error";
	}

?>