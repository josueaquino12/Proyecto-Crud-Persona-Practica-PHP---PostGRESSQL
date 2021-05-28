<?php
//print_r($_POST);

if(!isset($_POST['oculto'])){
    exit();
}


//$id = $_POST['txtId'];

include '../controller/conexion.php';
//$objeto= new Conexion();
//$conexion= $objeto->abrirConexion();
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$edad = $_POST['txtEdad'];
$tipo = $_POST['select'];
$numero = $_POST['txtNumero'];


//$sentencia = $conexion->prepare("INSERT INTO persona(nombre,apellido,edad)
//VALUES ('".$nombre."','".$apellido."',".$edad.");");

echo "datos".$nombre.",".$apellido.",".$edad;

$sentencia = $conexion->prepare("INSERT INTO persona(nombre,apellido,edad) 
VALUES (?,?,?);");

//$resultado=$sentencia->execute();


$resultado =$sentencia->execute([$nombre,$apellido,$edad]);




//Insertar Documentacion



if($resultado === TRUE){
    echo "Datos ingresados con éxito";
    header('Location: ../index.php');
} else {
    echo "Error";
}

?>