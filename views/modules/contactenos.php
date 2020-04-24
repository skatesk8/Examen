<footer>

	<hr>
	
	<h1 class="text-center text-info"><b>!RESERVA YA!</b></h1>

	<hr>

<form class="p-lg-5" style="background: #333; color: #fff;" method="post" onsubmit="return validarMensaje()">

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">EMPRESA</label>
      <input type="text" class="form-control" id="empresa" name="empresa">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">NOMBRE</label>
      <input type="text" class="form-control" id="nombre" name="nombre">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">EMAIL</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>
  </div>
   <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">TELEFONO</label>
      <input type="text" class="form-control" id="tel" name="tel" maxlength="8">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">APELLIDO</label>
      <input type="text" class="form-control" id="apell" name="apell">
    </div>
	<div class="form-group col-md-4">
      <label for="inputState">CANT.CUARTOS</label>
      <select id="cuartos" class="form-control" name="cuartos" required="">
        <option selected value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="input">CANT.PERSONAS</label>
      <input type="text" class="form-control" id="personas" name="personas">
    </div>
  </div>
  <h3>DATOS DE EVENTO</h3>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">HORA DE ENTRADA</label>
      <input type="time" class="form-control" id="entrada" name="entrada">
    </div>
    <div class="form-group col-md-4">
    <label for="inputState">DIA</label>
      <select id="dia" name="dia" class="form-control">
        <option selected value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
    </div>
	<div class="form-group col-md-4">
      <label for="inputState">AÑO</label>
      <select id="año" name="año" class="form-control">
        <option selected value="2020">2020</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
      </select>
    </div>
  </div>
    <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">HORA DE SALIDA</label>
      <input type="time" class="form-control" name="salida" id="salida">
    </div>
    <div class="form-group col-md-4">
    <label for="inputState">MES</label>
      <select id="mes" name="mes" class="form-control">
        <option selected value="Enero">Enero</option>
        <option value="Marzo">Marzo</option>
        <option value="Abril">Abril</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">TIPO DE EVENTO</label>
      <select id="evento" name="evento" class="form-control">
        <option selected value="Religioso">Religioso</option>
        <option value="Cultural">Cultural</option>
        <option value="Escolar">Escolar</option>
      </select>
    </div>
  </div>
  <input type="submit" class="btn btn-primary" value="Enviar">
</form>


		<?php

		$mensajes = new MensajesController();
		$mensajes -> registroMensajesController();

		?>


</footer>
