<?php
require_once "conexion.php";
       $conexion=conexion();

        //el campo NAME viene de la variable POSDATA del documento APP.JS
       
            //variables que almacenen los valores que vienen del POST mencionado antes
            //estas varibles se crearon desde cero y son exclusivas del documento TASK-ADD
            $alumnoid=$_POST['alumnoid'];
            $carnet=$_POST['carnet'];
            $nombre=$_POST['nombre'];
            $apellido=$_POST['apellido'];
            $grado=$_POST['grado'];
            $seccion=$_POST['seccion'];
            //PUESTO es el nombre de la tabla, CODPUESTO Y NOMBRE son los campos

            $sql = "INSERT INTO estudiantes (alumnoid, carnet, nombre, apellido, grado, seccion) VALUES ('$alumnoid', '$carnet', '$nombre', '$apellido', '$grado', '$seccion')";
            $result=mysqli_query($conexion, $sql);
            if(!$result){
                die('fallo la conexion');
            }
            echo 'dato agregado';
        
?>



