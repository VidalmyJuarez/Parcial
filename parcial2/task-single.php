<?php
        require_once "conexion.php";
        $conexion=conexion();
if(isset($_POST['alumnoid'])){
        $alumnoid=$_POST['alumnoid'];
        $sql= "SELECT * FROM estudiantes WHERE alumnoid=$alumnoid";
        $result=mysqli_query($conexion, $sql);

        if(!$result){
            die('conexion fallida');
        }


        $json=array();
        while ($row= mysqli_fetch_array($result)){
            $json[]= array(
                //los valores de las varibles ROW provienen de la base de datos 
                'alumnoid' => $row['alumnoid'],
                'carnet' => $row['carnet'],
                'nombre' => $row['nombre'],
                'apellido' => $row['apellido'],
                'grado' => $row['grado'],
                'seccion' => $row['seccion']
            );
        }

        $jasonstring=json_encode($json[0]);
        echo $jasonstring;
}
?>
