<?php 
include_once 'controller/conexion.php'; 
/*$objeto= new Conexion();
$conexion= $objeto->abrirConexion();*/
$query="select * from persona order by id";
$resultado=$conexion->prepare($query);
$resultado->execute();
$personas = $resultado ->fetchAll(PDO::FETCH_OBJ);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
   <title>Proyecto</title>
   
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
</head>
<body>

<div class="container">
  <div class="row">

<div class="col-sm">
            <h4>Insertar Datos</h4>
            <form method="POST" action="model/insertar.php">
            <table>

           <tr> 
             <td>Nombre:</td>
              <td> <input type="text" name="txtNombre" required></td>
           </tr>

           <tr> 
            <td>Apellido</td>
          <td><input type="text"  name="txtApellido" required></td>
           </tr>

             <tr> 
             <td>Edad</td>
           <td><input type="number" name='txtEdad' required></td>
              </tr>

              
           <input type="hidden" name="oculto" value="1">

         <tr>
         <input type="reset" type="button" name=""  value="Limpiar" class="btn btn-primary">
          <button type="submit button" class="btn btn-danger">Ingresar Persona</button>
         </tr>
       </table>
     </form> 
    </div>






    <div class="col-sm">
      <h4>Listar Datos<h4>
       <br>
      <table id="table_id" class="table">
     
      <thead class="thead-dark">
       <tr><th scope="col">Nombre</th>
       <th scope="col">Apellido</th>
       <th scope="col">Edad</th></tr>
       </thead>
       <tbody>
       <?php
        foreach ($personas as $dato){
         ?>  
         <tr> 
<!--td></td-->
       <td class="bg-primary" scope="col"> <?php echo $dato->nombre; ?></td>
       <td class="bg-success" scope="col"> <?php echo $dato->apellido; ?></td>
       <td class="bg-warning" scope="col"> <?php echo $dato->edad; ?></td>
       <td scope="col"><a type="button" class="btn btn-success" 
        href="model/editar.php?id=<?php echo $dato->id; ?>">Editar</a></td>
       <td scope="col"><a type="button" class="btn btn-danger" 
       href="model/eliminar.php?id=<?php echo $dato->id; ?>">Eliminar</a></td>
       <td scope="col"><a type="button" class="btn btn-primary" 
       href="model/crudDNI.php?id=<?php echo $dato->id; ?>">Agregar Documentacion</a></td>

       </tr>
     <?php } ?>
     </tbody>
     </table>
     <br>
    </div> 
  </div>
</div>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

 <script>
   $(document).ready( function () {
    $('#table_id').DataTable();
    } );</script>

</body>
</html>



