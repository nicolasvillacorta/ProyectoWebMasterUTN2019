<!DOCTYPE html>
<html>
<head>
	<title>Los Gallos - Parque Avellaneda</title>
	<link rel="icon" href="img/logos/LogoGallos.png">
	<meta charset="utf-8">
	<!-- Hacer responsive -->
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<?php include 'includes/linkeos.php' ?>
</head>

<body>
	<?php include 'includes/header&Nav.php' ?>
	<div class="container cuerpo mb-5 text-center pb-5"><br><br><br>


	<?php 
	//Desmembro el array en variables.
	$nombreContacto=$_POST['nombreYApellido'];
	$emailContacto=$_POST['email'];
	$msjContacto=$_POST['mensaje'];

	//Configuro el envio del mail.
	$destinatario="villacortav.nicolas@gmail.com";
	$asunto="Nueva consulta del sitio: LosGallos";
	$cuerpoMsj="Nuevo correo recibido de ".$nombreContacto.": ".PHP_EOL.$msjContacto.PHP_EOL."Email: ".$emailContacto;
	//Envio mediante la funcion mail.
	$envio=mail($destinatario, $asunto, $cuerpoMsj);

	//Aviso al usuario que se haya enviado bien el mensaje.
	if($envio==true){
		echo "El mensaje se ha enviado correctamente, te contestaremos via mail cuanto antes, por favor regrese a la página anterior si desea seguir navegando en nuestra web.";
	}else{
		echo "Ha habido un inconveniente, por favor intente reenviar el mensaje mas tarde.";
	}
//----------------------------------------------------------------------Fin del envio de mail.
//----------------------------------------------------------------------Comienzo Base de datos.

	//Establezco las variables para hacer la conexion.
	$servidor="localhost"; $nombreDeUsuario="root"; $password=""; $bd="losgallos";
	//Abro la conexion a base de datos.
	$conexion=mysqli_connect($servidor, $nombreDeUsuario, $password, $bd) or exit("No se pudo establecer la conexion con la base de datos.");
	//Asigno la consulta que se debe realizar, usando las variables que extraje del array anteriormente.
	$query="INSERT INTO contactos VALUES ('', '$nombreContacto', '$emailContacto', '$msjContacto')";
	//Realizo la consulta.
	$consulta=mysqli_query($conexion, $query) or die("Hubo un error realizando la consulta.");

	if($consulta){
		echo "<br>Contacto ha sido agregado a la base de datos.";
	}else{
		echo "<br>El contacto no pudo agregarse.";
	}

	mysqli_free_result($consulta);
	mysqli_close($conexion);

?>
</div>
	<?php include 'includes/footer.php' ?>
<!--Scripts de Bootstrap-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>