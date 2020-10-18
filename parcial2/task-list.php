<?php
        require_once "conexion.php";
        $conexion=conexion();

        //conexion con la base de datos y la tabla
        $sql= "SELECT * FROM estudiantes";
        $result=mysqli_query($conexion, $sql);

        if(!$result){
            die('conexion fallida'. mysqli_error($conexion));
        }

        $json=array();
        while($row=mysqli_fetch_array($result)){
            $json[]=array(
				//name y description son los valores del Json
				//codpuesto y nombre son los nombres de los campos de la tabla
				'alumnoid' => $row['alumnoid'],
                'carnet' => $row['carnet'],
                'nombre' => $row['nombre'],
                'apellido' => $row['apellido'],
                'grado' => $row['grado'],
                'seccion' => $row['seccion'],

			);  
        }
        $jsonstring=json_encode($json);
        echo $jsonstring;
?>