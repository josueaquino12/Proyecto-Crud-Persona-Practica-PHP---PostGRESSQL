<?php  
	
	if (!isset($_GET['id'])) {
		header('Location: ../crudDNI.php');
	}
        include '../../controller/conexion.php';
        //$objeto= new Conexion();
        //$conexion= $objeto->abrirConexion();
        
        $id = $_GET['id'];

		$sentencia = $conexion->prepare("SELECT * FROM 
        identificacion WHERE id = ?;");
		$sentencia->execute([$id]);
		$identificacion = $sentencia->fetchObject();
      

?>



<!DOCTYPE html>
<html lang="en">
<head>
<title>Editar Documento</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>

<center>
		<h3>Editar Documentación:</h3>
		<form method="POST" action="editarProcesoDoc.php">
			<table>
				
				<tr>
					<td>DNI: </td>
					<td><input type="number" name="txtNumero" 
                    required value="<?php echo $identificacion->numero; ?>"></td>
				</tr>
				
					<input type="hidden" name="oculto">
					<input type="hidden" name="id2" value="<?php echo $identificacion->id; ?>">
					<td colspan="2"><button type="submit button" class="btn btn-success"> Editar Documento</button></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>