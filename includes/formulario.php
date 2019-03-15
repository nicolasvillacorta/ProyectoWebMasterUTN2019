		<form action="procesar_form.php" method="POST">
  			<div class="form-group">
    			<label>Nombre y Apellido.</label>
    			<input type="text" name="nombreYApellido" class="form-control" placeholder="Juan Gomez">
  			</div>
  			<div class="form-group">
   				<label>Dirección de correo electrónico.</label>
    			<input type="email" name="email" class="form-control" placeholder="nombre@mail.com">
 			</div>
   			<div class="form-group">
    			<label>Mensaje.</label>
    			<textarea class="form-control" name="mensaje" rows="3" placeholder="Escriba aqui su consulta.."></textarea>
  			</div>
        <div class="text-right form-group">
        <button type="submit" class="btn">Enviar</button>
        </div>
		</form>