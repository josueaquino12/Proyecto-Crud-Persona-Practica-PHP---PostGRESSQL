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
		$persona = $sentencia->fetchObject();
        //print_r($persona);
        
      
        $sentencia2=$conexion->prepare("select * from persona inner join 
        identificacion on persona.id = identificacion.personaID 
        where persona.id=".$persona->id."");
        $sentencia2->execute();
        $documentacion = $sentencia2 ->fetchAll(PDO::FETCH_OBJ);


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
		<h3>Agregar Documentación a <?php echo $persona->nombre; ?></h3>
		<form method="POST" action="modelDoc/insertarDoc.php">
			<table>
				
				<tr>
					<td>Identificación: </td>
					        <td><select name="select" required>
                       <option value="CUIL">CUIL</option>
                       <option value="DNI" selected>DNI</option>
                        <option value="DU">DU</option>
                      </select></td>
				    	<td><input type="number" name="txtNumero" required ></td>
				</tr>
				
					<input type="hidden" name="oculto">
					<input type="hidden" name="id2" value="<?php echo $persona->id; ?>">
					<td colspan="2"><button type="submit button" class="btn btn-success"> Insertar Documento</button></td>
				</tr>
			</table>
		</form>
      <br>
      <table  class="table">
     
         <thead class="thead-dark">
          <tr><th scope="col">Nombre</th>
          <th scope="col">DNI</th>
          <th scope="col">Numero</th></tr>
      </thead>
      <tbody>
      <?php
       foreach ($documentacion as $dato1){
        ?>  
        <tr> 
<!--td></td-->
      <td class="bg-primary" scope="col"> <?php echo $dato1->nombre; ?></td>
      <td class="bg-success" scope="col"> <?php echo $dato1->tipo; ?></td>
      <td class="bg-warning" scope="col"> <?php echo $dato1->numero; ?></td>
      <td scope="col"><a type="button" class="btn btn-success" 
       href="modelDoc/editarDoc.php?id=<?php echo $dato1->id; ?>">Editar</a></td>
      <!--td scope="col"><a type="button" class="btn btn-danger" 
      href="model/eliminar.php?id=">Eliminar</a></td>
      
      </tr-->
    <?php } ?>
    </tbody>

    </table>


	</center>
</body>
</html>