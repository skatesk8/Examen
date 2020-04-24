<?php

class MensajesController{

	#MOSTRAR MENSAJES EN LA VISTA
	#------------------------------------------------------------
	public function mostrarMensajesController(){

		$respuesta = MensajesModel::mostrarMensajesModel("mensajes");

		foreach ($respuesta as $row => $item){

			echo '<div class="well well-sm" id="'.$item["id"].'">
		
					<a href="index.php?action=mensajes&idBorrar='.$item["id"].'"><span class="fa fa-times pull-right"></span></a>
					<p>'.$item["fecha"].'</p>
					<h3>De: '.$item["nombre"].'</h3>
					<h5>Email: '.$item["email"].'</h5>
				  	<span>Empresa</span><input type="text" class="form-control" value="'.$item["empresa"].'" readonly>
				  	<span>Telefono</span><input type="text" class="form-control" value="'.$item["tel"].'" readonly>
				  	<span>Apellidos</span><input type="text" class="form-control" value="'.$item["apell"].'" readonly>
				  	<span>No.Cuartos</span><input type="text" class="form-control" value="'.$item["cuartos"].'" readonly>
				  	<span>No.personas</span><input type="text" class="form-control" value="'.$item["personas"].'" readonly>
				  	<span>Hora de entrada</span><input type="text" class="form-control" value="'.$item["entrada"].'" readonly>
				  	<span>Mes de la reserva</span><input type="text" class="form-control" value="'.$item["mes"].'" readonly>
				  	<span>Tipo de envento</span><input type="text" class="form-control" value="'.$item["evento"].'" readonly>
				  	<br>
				  	<button class="btn btn-info btn-sm leerMensaje">Leer</button>

				  </div>';

		}

	}

	#BORRAR MENSAJES
	#------------------------------------------------------------

	public function borrarMensajesController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];

			$respuesta = MensajesModel::borrarMensajesModel($datosController, "mensajes");

			if($respuesta == "ok"){

					echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡El mesaje se ha borrado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "mensajes";
							  } 
					});


				</script>';

			}

		}

	}

	#RESPONDER MENSAJES
	#------------------------------------------------------------
	public function responderMensajesController(){

		if(isset($_POST['enviarEmail'])){

			$email = $_POST['enviarEmail'];
			$nombre = $_POST['enviarNombre'];
			$titulo = $_POST['enviarTitulo'];
			$mensaje =$_POST['enviarMensaje'];

			$para = $email . ', ';
			$para .= 'cursos@tutorialesatualcance.com';

			$título = 'Respuesta a su mensaje';

			$mensaje ='<html>
							<head>
								<title>Respuesta a su Mensaje</title>
							</head>

							<body>
								<h1>Hola '.$nombre.'</h1>
								<p>'.$mensaje.'</p>
								<hr>
								
							</body>

					   </html>';

		   $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		   $cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		   $cabeceras .= 'From: <cursos@tutorialesatualcance.com>' . "\r\n";

		   $envio = mail($para, $título, $mensaje, $cabeceras);

		   if($envio){

		   		echo'<script>

						swal({
							  title: "¡OK!",
							  text: "¡El mensaje ha sido enviado correctamente!",
							  type: "success",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
						},

						function(isConfirm){
								 if (isConfirm) {	   
								    window.location = "mensajes";
								  } 
						});


				</script>';

		   }

		}

	}

	#ENVIAR MENSAJES MASIVOS
	#------------------------------------------------------------
	public function mensajesMasivosController(){

		if(isset($_POST["tituloMasivo"])){

			$respuesta = MensajesModel::seleccionarEmailSuscriptores("suscriptores");

			foreach ($respuesta as $row => $item) {

				$titulo = $_POST['tituloMasivo'];
				$mensaje =$_POST['mensajeMasivo'];

				$título = 'Mensaje para todos';

				$para = $item["email"]; 

				$mensaje ='<html>
								<head>
									<title>Respuesta a su Mensaje</title>
								</head>

								<body>
									<h1>Hola '.$item["nombre"].'</h1>
									<p>'.$mensaje.'</p>
									<hr> 
									<br>
								</body>

						   </html>';

			   $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
			   $cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
			   $cabeceras .= 'From: <cursos@tutorialesatualcance.com>' . "\r\n";

			   $envio = mail($para, $título, $mensaje, $cabeceras);

			   if($envio){

			   		echo'<script>

							swal({
								  title: "¡OK!",
								  text: "¡El mensaje ha sido enviado correctamente!",
								  type: "success",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	   
									    window.location = "mensajes";
									  } 
							});


					</script>';

			   }

			}

		}

	}

	#MENSAJES SIN REVISAR
	#------------------------------------------------------------
	public function mensajesSinRevisarController(){

		$respuesta = MensajesModel::mensajesSinRevisarModel("mensajes");

		$sumaRevision = 0;

		foreach ($respuesta as $row => $item) {

			if($item["revision"] == 0){

				++$sumaRevision;

				echo '<span>'.$sumaRevision.'</span>';
			
			}

		}

	}

	#MENSAJES REVISADOS
	#------------------------------------------------------------
	public function mensajesRevisadosController($datos){

		$datosController = $datos;

		$respuesta = MensajesModel::mensajesRevisadosModel($datosController, "mensajes");

		echo $respuesta;

	}


}