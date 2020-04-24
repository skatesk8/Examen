<?php

require_once "backend/models/conexion.php";

class MensajesModel{

	#REGISTRO MENSAJES
	#-----------------------------------------------------------

	public function registroMensajesModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (empresa, nombre, email, tel, apell, cuartos, personas, entrada, dia, salida, mes, evento) VALUES (:empresa, :nombre, :email, :tel, :apell, :cuartos, :personas, :entrada, :dia, :salida, :mes, :evento)");

		$stmt -> bindParam(":empresa", $datos["empresa"], PDO::PARAM_STR);
		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":tel", $datos["tel"], PDO::PARAM_STR);
		$stmt -> bindParam(":apell", $datos["apell"], PDO::PARAM_STR);
		$stmt -> bindParam(":cuartos", $datos["cuartos"], PDO::PARAM_STR);
		$stmt -> bindParam(":personas", $datos["personas"], PDO::PARAM_STR);
		$stmt -> bindParam(":entrada", $datos["entrada"], PDO::PARAM_STR);
		$stmt -> bindParam(":dia", $datos["dia"], PDO::PARAM_STR);
		$stmt -> bindParam(":salida", $datos["salida"], PDO::PARAM_STR);
		$stmt -> bindParam(":mes", $datos["mes"], PDO::PARAM_STR);
		$stmt -> bindParam(":evento", $datos["evento"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";
		}
		else{

			return "error";
		}

		$stmt->close();

	}

	#REGISTRO SUSCRIPTORES
	#-----------------------------------------------------------

	public function registroSuscriptoresModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, email) VALUES (:nombre, :email)");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";
		}
		else{

			return "error";
		}

		$stmt->close();

	}

	#VALIDAR SUSCRIPTOR EXISTENTE
	#-------------------------------------
	public function revisarSuscriptorModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT email FROM $tabla WHERE email = :email");
		
		$stmt->bindParam(":email", $datosModel, PDO::PARAM_STR);
		
		$stmt->execute();
		
		return $stmt->fetch();
		
		$stmt->close();

	}

}