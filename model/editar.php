<?php  
	
	if (!isset($_GET['id'])) {
		header('Location: ../index.php');
	}
        include '../controller/conexion.php';
        //$objeto= new Conexion();
        //$conexion= $objeto->abrirConexion();
        
        $id = $_GET['id'];

		$sentencia = $conexion->prepare("SELECT * FROM persona WHERE id = ?;");
		$sentencia->execute([$id]);
		//$persona = $sentencia->fetch(PDO::FETCH_OBJ);
		$persona = $sentencia->fetchObject();
		//print_r($persona);

?>


<!DOCTYPE html>
<html>
<html lang="en">
<head>
	<title>Editar Alumno</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
	<center>
		<h3>Editar alumno:</h3>
		<form method="POST" action="editarProceso.php">
			<table>
				<tr>
					<td>Nombre: </td>
					<td><input type="text" name="txt2Nombre" required value="<?php echo $persona->nombre; ?>"></td>
				</tr>
				<tr>
					<td>Apellido: </td>
					<td><input type="text" name="txt2Apellido" required value="<?php echo $persona->apellido; ?>"></td>
				</tr>
				<tr>
					<td>Edad: </td>
					<td><input type="number" name="txt2Edad" required value="<?php echo $persona->edad; ?>"></td>
				</tr>
				
					<input type="hidden" name="oculto">
					<input type="hidden" name="id2" value="<?php echo $persona->id; ?>">
					<td colspan="2"><button type="submit button" class="btn btn-success"> Editar Persona</button></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>