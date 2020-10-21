<?php
	$servidor="b8e4mlr9bqsybaethi8m-mysql.services.clever-cloud.com";
	$usuario="uyowtqqpcjuwppgu";
	$clave="8nwv725oEoIJ1dCzwTz0";
	$baseDeDatos="b8e4mlr9bqsybaethi8m";

	$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

	if(!$enlace){
		echo"Error en la conexion con el servidor";
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"> 
        <title>Formulario De Registro</title>
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    <body>
	<div class="contenedor">
		<form action="#" class="formulario" id="formulario" name="formulario" method="POST">
			<div class="contenedor-inputs">
				<input type="text" name="nombre" placeholder="Nombre">
				<input type="text" name="correo" placeholder="Correo">
				<div class="terminos">
					<input type="checkbox" name="terminos" id="terminos">
					<label for="terminos">Acepto Terminos y Condiciones</label>
				</div>

				<ul class="error" id="error"></ul>
			</div>

			<input type="submit" class="btn" name="registrarse" value="Registrate">
		</form>
		<div class="tabla">
			<table>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Sexo</th>
				</tr>
					<?php
						$consulta = "SELECT * FROM Tabla2";
						$ejecutarConsulta = mysqli_query($enlace, $consulta);
						$verFilas = mysqli_num_rows($ejecutarConsulta);
						$fila = mysqli_fetch_array($ejecutarConsulta);

						if(!$ejecutarConsulta){
							echo"Error en la consulta";
						}else{
							if($verFilas<1){
								echo"<tr><td>Sin registros</td></tr>";
							}else{
								for($i=0; $i<=$fila; $i++){
									echo'
										<tr>
											<td>'.$fila[3].'</td>
											<td>'.$fila[0].'</td>
											<td>'.$fila[1].'</td>
											<td>'.$fila[2].'</td>
										</tr>
									';
									$fila = mysqli_fetch_array($ejecutarConsulta);

								}

							}
						}


					?>
						
						
				
				
			</table>
		</div>
	</div>
	<script src="formulario.js"></script>
</body>
</html>
<?php
	if(isset($_POST['registrarse'])){
		$nombre =$_POST["nombre"];
		//$correo=$_POST["correo"];
		$correo=$_POST["correo"];
		$sexo=$_POST["sexo"];
		$id= rand(1,99);

		//$insertarDatos = "INSERT INTO Tabla2 VALUES('$nombre',
													//'$correo',
													//'1')";
 $insertarDatos = "INSERT INTO Tabla2(Usuario) VALUES ('$nombre')";
		$ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

		if(!$ejecutarInsertar){
			echo"Error En la linea de sql";
		}
	}
?>
