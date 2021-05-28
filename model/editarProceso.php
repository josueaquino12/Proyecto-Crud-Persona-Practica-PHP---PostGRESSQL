<?php 
	//print_r($_POST);
	if (!isset($_POST['oculto'])) {
		header('Location: ../index.php');
	}

    include '../controller/conexion.php';
    //$objeto= new Conexion();
    //$conexion= $objeto->abrirConexion();

	$id2 = $_POST['id2'];
	$nombre = $_POST['txt2Nombre'];
	$apellido = $_POST['txt2Apellido'];
	$edad = $_POST['txt2Edad'];
	
   //echo "datos " . $id2 . " " .$nombre. " ". $apellido . " " . $edad . ".";
	$sentencia = $conexion->prepare("UPDATE persona SET nombre = ?, apellido = ?, edad = ? 
                                         WHERE id = ?;");
                                        
	$resultado = $sentencia->execute([$nombre,$apellido,$edad,$id2]);

	if ($resultado === TRUE) {
		header('Location: ../index.php');
	}else{
		echo "Error" ;
	}
?>