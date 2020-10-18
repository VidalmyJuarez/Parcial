<?php
require_once "conexion.php";
        $conexion=conexion();



        if(isset($_POST['id'])){
        // la variable POST priviene del documento APP.JS este selecciona el ID o llave primaria
        // de cada registro para eliminarlo en la consulta de abajo
            $id=$_POST['id'];

        //consulta para eliminar datos de la base de datos
         $sql= "DELETE FROM estudiantes WHERE alumnoid=$id";
         $result=mysqli_query($conexion, $sql);

            if(!$result){
                die('conexion fallida');
            }
            echo 'dato eliminados satisfactoriamente';
        }
        
?>
