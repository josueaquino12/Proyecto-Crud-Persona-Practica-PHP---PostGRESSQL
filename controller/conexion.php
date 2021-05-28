<?php
/*class Conexion{


function abrirConexion(){*/

    
     try{

        include_once 'config.php';

        $conexion = new PDO('pgsql:host='.SERVER_NAME.';port= '.PUERTO.'; dbname='.BASE_DE_DATOS, NOMBRE_USUARIO, PASSWORD);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       //return $conexion;
        
     }
     catch(Exception $ex){
               echo "ERROR". $ex->getMessage(). "<br>";

     }

   /* }


} */?>

