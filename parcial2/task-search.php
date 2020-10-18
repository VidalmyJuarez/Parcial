<?php 

require_once "conexion.php";
	$conexion=conexion();

	//el ID SEARCH que estamos recibiendo del Script lo almacenamos en una variable llamada $search
	$search =$_POST['search'];

	//validamos la variable que recibimos del Script
	if(!empty($search)){
		//PUESTO es el nombre de la TABLA donde haremos la busqueda, CODPUESTO el nombre del campo
		// $search validamos la busqueda y el % todos los datos relacionados
		//$query es una consulta de datos
		$sql= "SELECT * FROM estudiantes WHERE alumnoid LIKE '$search%' OR nombre like '$search%' ";
		//verificamos conexion con la variable antes echa en CONEXION.PHP
		$result=mysqli_query($conexion,$sql);

		if(!$result){
			//verifica si hay coincidencia de datos o no
				die('Error de Conexion'.mysqli_error($conexion));
		}

		$json=array();
		while ($row=mysqli_fetch_array($result)) {
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


		//resgresa los datos en forma de arreglo 
		$jsonstring=json_encode($json);
		echo $jsonstring;
	}
 ?>