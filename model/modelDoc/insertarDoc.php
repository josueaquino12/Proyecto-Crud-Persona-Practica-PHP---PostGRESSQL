<?php 
if(!isset($_POST['oculto'])){
    exit();
}

include '../../controller/conexion.php';

$tipo = $_POST['select'];
$numero = $_POST['txtNumero'];
$id = $_POST['id2'];

//echo "DNI: ". $tipo. " ".$numero . " ".$id ." . <br>";

$sentencia2=$conexion->prepare("select * from identificacion 
where personaID = ".$id."");
$sentencia2->execute();
$identificacion = $sentencia2->fetchAll(PDO::FETCH_OBJ);


$verdad = TRUE;
foreach ($identificacion as $dato) {
    $tipoFound = $dato->tipo;
   
    if ($tipo==$tipoFound){
      $verdad = FALSE;
      break;
    } else {
        continue;
    }
  
}

//echo "Valor " .$persona->tipo . " <br>";

if($verdad!==FALSE){

$sentencia = $conexion->prepare("INSERT into 
identificacion(tipo,numero,personaID) values (?,?,?)");
$resultado=$sentencia->execute([$tipo,$numero,$id]);
//echo "Resultado ". $resultado ;
    if($resultado === TRUE){
          echo "Datos ingresados con éxito";
          header('Location: ../crudDNI.php?id='.$id);
      } else {
         echo "Error";
       }

} else {

    echo "Ya existe la documentacion en la base";

}

?>