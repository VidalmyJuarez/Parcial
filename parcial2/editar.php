

<?php

require_once "conexion.php";
        $conexion=conexion();
 
            $alumnoid=$_POST['alumnoid'];
            $carnet=$_POST['carnet'];
            $nombre=$_POST['nombre'];
            $apellido=$_POST['apellido'];
            $grado=$_POST['grado'];
            $seccion=$_POST['seccion'];

        $sql= "UPDATE estudiantes SET alumnoid=$alumnoid, carnet='$carnet', nombre='$nombre', apellido='$apellido', grado='$grado',seccion='$seccion'WHERE alumnoid='$alumnoid'";
 
        $result=mysqli_query($conexion,$sql);
 
        if(!$result){
            die('conexion fallida');
        }

        echo 'TAREA ACTUALIZADA';
?>
