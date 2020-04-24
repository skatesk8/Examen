<?php

class MensajesController{

	public function registroMensajesController(){

		if(isset($_POST["nombre"])){

			if(preg_match('/^[a-zA-Z\s]+$/', $_POST["nombre"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["email"]) &&
			   preg_match('/^[a-zA-Z0-9\s\.,]+$/', $_POST["empresa"])){


			   	$datosController = array("nombre"=>$_POST["nombre"],
										 "email"=>$_POST["email"],
										 "empresa"=>$_POST["empresa"],
										 "tel"=>$_POST["tel"],
										 "apell"=>$_POST["apell"],
										 "cuartos"=>$_POST["cuartos"],
										 "personas"=>$_POST["personas"],
										 "entrada"=>$_POST["entrada"],
										 "dia"=>$_POST["dia"],
										 "salida"=>$_POST["salida"],
										 "mes"=>$_POST["mes"],
										 "evento"=>$_POST["evento"],);

			   	#ALMACENAR EN BASE DE DATOS EL SUSCRIPTOR
			   	#-------------------------------------------------------

			   	$datosSuscriptor = $_POST["email"];

			   	$revisarSuscriptor = MensajesModel::revisarSuscriptorModel($datosSuscriptor, "suscriptores");

			   	if(count($revisarSuscriptor["email"]) == 0){

			   		MensajesModel::registroSuscriptoresModel($datosController, "suscriptores");

			   	}
 
			   	#ALMACENAR EN BASE DE DATOS EL MENSAJE
			   	#-------------------------------------------------------  

			   $respuesta = MensajesModel::registroMensajesModel($datosController, "mensajes");	

			   if($respuesta == "ok"){

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
								    window.location = "index.php";
								  } 
						});

					</script>';

				}


			}

			else{

				echo '<div class="alert alert-danger">¡No se puedo enviar el mensaje, no se permiten caracteres especiales!</div>';

			}


		}

	}
}