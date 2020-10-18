//funcion para verificar el funcionamiento del JQUERY
$(document).ready(function () {
	// funcion para actualizar automaticamente la pagina
	fetchtask();
	//variable para editar datos EDIT
	let edit = false;
	console.log('JQUERY esta funcionando');
	//mostrara el cuadro de resulados de busqueda ID=TASK-RESULT
	$('#task-result').hide();
	
	// SEARCH es el nombre de la ID buscar en el formulario de html, keyup=se refiere cuando hagamos clik en buscar
	$('#search').keyup(function (e) {
		// revisar si el SEARCH esta vacio
		if ($('#search').val()) {
			//declaramos el ID search como una variable
			let search = $('#search').val();
			$.ajax({
				//documento que utilizaremos para traer los datos del servidor
				url: 'task-search.php',
				type: 'POST',
				data: { search },
				success: function (response) {
					//TASKS es la variable que jala todo el registro de una fila
					let tasks = JSON.parse(response);
					//la variable TEMPLATE servira para llenar una tabla con la busqueda de la variable TASKS
					let template = '';
					tasks.forEach(task => {
						template +=
						`<tr taskID="${task.alumnoid}"> 
						<td>${task.alumnoid}</td>
						<td> 	${task.carnet} </td>		
						<td>${task.nombre}</td>
						<td>${task.apellido}</td>
						<td>${task.grado}</td>
						<td>${task.seccion}</td>
						<td> 
						   <button type="button" class="task-edit btn btn-success">   
						   Editar 
                           </button> 
                        </td>
                         <td> 
							<button class="task-delete btn btn-danger">	
									Eliminar
								</button>
						</td>
					  </tr>`
					});
					$('#task').html(template);
					 e.preventDefault();
				}
			});
		}
	});

	$('#task-form').submit(function (e) {
		//datos que mandaremos por medio del servidor POSTDATA
		const postData = {
			//#name y #description son los ID de los controles del formulario en el index
			alumnoid: $('#alumnoid').val(),
			carnet: $('#carnet').val(),
			nombre: $('#nombre').val(),
			apellido: $('#apellido').val(),
			grado: $('#grado').val(),
			seccion: $('#seccion').val(),
		};

		let url = edit === false ? 'Guardar.php' : 'editar.php';

		$.post(url, postData, function (response) {
			//actualizar 
			fetchtask();
			//resetea los campos del formulario
			$('#task-form').trigger('reset');
		});
	
	});

	function fetchtask() {
		$.ajax({
			//enlace con el documento de php que lo hara funcionar
			url: 'task-list.php',
			type: 'GET',
			success: function (response) {
				let tasks = JSON.parse(response);
				let template = ''; 
				tasks.forEach(task => {
					//las variables utilizadas TASK.NAME Y TASk.DESCRIPTION Son las que traemos del JSON del documento TASK-LIST
					//
					template += ` 

					 <tr taskID="${task.alumnoid}">
						<td>${task.alumnoid}</td>
						<td>	${task.carnet}</td>
						<td>${task.nombre}</td>
						<td>${task.apellido}</td>
						<td>${task.grado}</td>
						<td>${task.seccion}</td>

						<td>
						<button class="task-edit btn btn-success">
						Editar
						</button>
						</td>
						<td>
						    <button class="task-delete btn btn-danger">
						Eliminar
						</button>
						</td>
						
					</tr>`

				});
				//esta variable es el ID de la tabla ubicada en HTML
				$('#task').html(template);
			}
		});
	}

	//TASKID, esta ubicada en los TD, y la utilizaremos como llave principal para eliminar registros

	//TASK-DELETE es la propiedad que utilizaremos para manipular el funcionamiento del boton eliminar
	// antes colocado en la variable TEMPLATE, todo esto al hacer click en eliminar
	$(document).on('click', '.task-delete', function () {
		if (confirm('Seguro que deseas eliminar este registro')) {
			//variable ELEMENT detecta el valor clickeado (registro)
			//PARELEMENT sirve para econtrar todo el registro de la tabla (fila)
			let element = $(this)[0].parentElement.parentElement;
			let id = $(element).attr('taskID');
			$.post('eliminar.php', { id }, function (response) {
				fetchtask();
			});
		}
	});

	$(document).on('click', '.task-edit', function () {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('taskID');
        $.post('task-single.php', { id }, function (response) {
            const task = JSON.parse(response);
            $('#alumnoid').val(task.alumnoid);
			$('#carnet').val(task.carnet);
			$('#nombre').val(task.nombre);
			$('#apellido').val(task.apellido);
			$('#grado').val(task.grado); 
			$('#seccion').val(task.seccion);
			
			edit= true;
		});
	});

});

